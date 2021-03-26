<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work
namespace App\Services\Data;

use App\Models\UserModel;
use App\Models\CredentialModel;
use PDOException;
use App\Services\Utility\DatabaseException;
use App\Services\Utility\RealityCheckLogger;

//Database interacts with the data from the User class
class UserDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to add user to database
    public function createUser(UserModel $user) {
        RealityCheckLogger::info("Entering UserDataService.createUser()");

        try{
            //select variables and see if the row exists
            $username = $user->getUsername();
            $password = $user->getPassword();
            $email = $user->getEmail();

            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `User` (`Username`, `Email`, `Password`) VALUES (:username, :email, :password)");
            //binds parameters
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            /*see if user existed and return true if found
            else return false if not found*/
            if ($stmt->execute() >= 1) {
                RealityCheckLogger::info("Leaving UserDataService.createUser() with true");
                return true;
            }

            else {
                RealityCheckLogger::info("Leaving UserDataService.createUser() with false");
                return false;
            }
        }

        catch(PDOException $e) {
            RealityCheckLogger::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Finds user in database in order to log in
     * @param UserModel $user
     * @return NULL
     */
    public function findByUser(CredentialModel $user) {
        RealityCheckLogger::info("Entering UserDataService.findByUser()");

        try{
            //select username and password and see if the row exists
            $username = $user->getUsername();
            $password = $user->getPassword();

            $stmt = $this->conn->prepare('SELECT * FROM `User` WHERE BINARY `Username` = :username AND `Password` = :password');
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);

            $stmt->execute();

            /*see if user existed and return true if found
                else return false if not found*/
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                RealityCheckLogger::info("Leaving UserDataService.findByUser() with user ID");
                return $user['ID'];
            }


            else {
                RealityCheckLogger::info("Leaving UserDataService.findByUser() with false");
                return false;
            }
        }

        catch (PDOException $e){
            RealityCheckLogger::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
