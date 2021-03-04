<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 11, 2021
//This is our own work

/*Handles bucket list & list item business logic and connections to database*/
namespace App\Services\Business;

use App\Models\ListItemModel;
use \PDO;
use App\Services\Data\BucketListDataService;

class BucketListBusinessService {
    /**
     * Create Bucket List
     * @param int $userID
     * @return boolean
     */
    public function createBucketList(int $userID) {
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a bucket list service dao with this connection and try to create a bucket list
        $service = new BucketListDataService($conn);
        $flag = $service->createBucketList($userID);

        //return the finder results
        return $flag;
    }

    /**
     * Find Bucket List
     * @param int $userID
     * @return NULL
     */
    public function findListByUserID(int $userID) {
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a security service dao with this connection and try to find the password in user
        $service = new BucketListDataService($conn);
        $flag = $service->findListByUserID($userID);

        //return the finder results
        return $flag;
    }

    /**
     * Create a List Item in a Bucket List
     * @param ListItemModel $item
     * @return NULL
     */
    public function createListItem(ListItemModel $item) {
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a bucketlist dao with this connection and create the item list
        $service = new BucketListDataService($conn);
        $flag = $service->createListItem($item);

        //return the finder results
        return $flag;
    }

    /**
     * Find all Bucket Lists & List Items
     * @param NULL
     * @return NULL
     */
    public function findListItems(int $bucketListID) {
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a bucketlist dao with this connection and try to find the list item
        $service = new BucketListDataService($conn);
        $flag = $service->findListItems($bucketListID);

        //return the finder results
        return $flag;
    }

    /**
     * Find all Bucket Lists & List Items
     * @param NULL
     * @return NULL
     */
    public function findAllLists() {
        //get credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $dbname = config("database.connections.mysql.database");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");

        //create connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create a bucketlist dao with this connection and try to find all list items
        $service = new BucketListDataService($conn);
        $flag = $service->findAllLists();

        //return the finder results
        return $flag;
    }
}
