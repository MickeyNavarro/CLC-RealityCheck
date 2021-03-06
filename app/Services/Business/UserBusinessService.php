<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

/*Handles user business logic and connections to database*/
namespace App\Services\Business;

use \PDO;
use App\Models\UserModel;
use App\Models\CredentialModel;
use App\Services\Data\UserDataService;
use App\Services\Utility\RealityCheckLogger;

class UserBusinessService {
/**
     * Create User
     * @param UserModel $user
     * @return boolean
     */
    public function create(UserModel $user) {
        RealityCheckLogger::info("Entering UserBusinessService.create()");

        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a user service dao with this connection and try to create user
        $service = new UserDataService($conn);
        $flag = $service->createUser($user);

        //return the finder results
        RealityCheckLogger::info("Exit UserBusinessService.create() with " . $flag);
        return $flag;
    }

    /**
     * User login
     * @param CredentialModel $user
     * @return NULL
     */
    public function login(CredentialModel $user) {
        RealityCheckLogger::info("Entering UserBusinessService.login()");

        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a user service dao with this connection and try to find the username and password in user
        $service = new UserDataService($conn);
        $flag = $service->findByUser($user);

        //return the finder results
        RealityCheckLogger::info("Exit UserBusinessService.login() with " . $flag);
        return $flag;
    }
}
