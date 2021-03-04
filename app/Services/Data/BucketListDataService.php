<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 11, 2021
//I used source code from the following website: https://www.geeksforgeeks.org/multidimensional-arrays-in-php/
namespace App\Services\Data;

use App\Models\ListItemModel;
use PDOException;
use App\Services\Utility\DatabaseException;

//Database interacts with the data from the bucketlist class and the list item class
class BucketListDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    //Method to create a bucket list in the database
    public function createBucketList(int $userID) {
        try{
            //use the user ID to create a new bucketlist
            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `BucketList` (`User_ID`) VALUES (:userid)");
            $stmt->bindParam(':userid', $userID);

            /*see if bucket list existed and return true if found
            else return false if not found*/
            if ($stmt->execute()) {
                return true;
            }

            else {
                return false;
            }
        }

        catch (PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // Method to get the bucket list from database using the user ID
    public function findListByUserID($userID) {
        try{
            //check if row exists by using the $userID
            //prepared statements is created
            $stmt = $this->conn->prepare("SELECT * FROM BucketList WHERE BucketList.User_ID = :userid LIMIT 1");
            $stmt->bindParam(':userid', $userID);
            $stmt->execute();

            /*see if bucket list existed and return bucket list ID if found
            else return null if not found*/
            if ($stmt->rowCount() == 1) {
                $bucketList = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $bucketList['ID'];
            }

            else {
                return null;
            }
        }

        catch(PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // Method to add list item to database
    public function createListItem(ListItemModel $item) {
        try{
            //select variables and see if the row exists
            $description = $item->getDescription();
            $bucketListID = $item->getBucketListID();

            //prepared statements is created
            $stmt = $this->conn->prepare("INSERT INTO `ListItem` (`Description`, `BucketList_ID`) VALUES (:description, :bucketlistid)");
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':bucketlistid', $bucketListID);

            /*see if list item existed and return true if found
            else return false if not found*/
            if ($stmt->execute()) {
                return true;
            }

            else {
                return false;
            }
        }

        catch(PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }

    // Method to get the bucket list items from database using the bucket list id
    public function findListItems(int $bucketListID) {
       try {
            //check if row exists by using the $userID
            //prepared statements is created
            $stmt = $this->conn->prepare("SELECT * FROM ListItem WHERE BucketList_ID = :bucketlistid ");
            $stmt->bindParam(':bucketlistid', $bucketListID);

            //array is created and statement is executed
            $list = array();
            $stmt->execute();

            //loops through table  using stmt->fetch
            for ($i = 0; $row = $stmt->fetch(); $i++) {
                //list item model is created
                $listItem = new ListItemModel($row['ID'], $row['Description'], $bucketListID);
                //inserts variables into end of array
                array_push($list, $listItem);
            }
            return $list;
        }

       catch(PDOException $e) {
           throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
       }
    }

    //Method to get all the lists from database
    public function findAllLists() {
        try {
            //prepared statement is created to display all bucket lists and their list items
            $stmt = $this->conn->prepare("SELECT BucketList.ID as BucketList_ID, BucketList.User_ID, ListItem.ID as ListItem_ID, ListItem.Description, User.Username FROM BucketList INNER JOIN ListItem ON BucketList.ID = ListItem.BucketList_ID Inner Join User ON User.ID = BucketList.User_ID ORDER BY BucketList.User_ID ASC");

            //executes prepared query
            $stmt->execute();

            //bucket list multidimensional array is created
            $bucketListsArray = array();

            //loops through table using stmt->fetch
            for ($i = 0; $row = $stmt->fetch(); $i++) {

                //add the single list item to the array with its username and description
                $singleListArray = array(
                    "$i" => array(
                        "Username" => $row['Username'],
                        "List Item" => $row['Description'],
                    )
                );

                //add the single list array to the master array
                $bucketListsArray = $bucketListsArray + $singleListArray;
            }

            /* Test output
            echo "Display Bucket Lists Array in DataService: \n";

            print_r($bucketListsArray);
            */

            //return bucket list array
            return $bucketListsArray;
        }

        catch(PDOException $e) {
            throw new DatabaseException("Database Exception: " . $e->getMessage(), 0, $e);
        }
    }
}
