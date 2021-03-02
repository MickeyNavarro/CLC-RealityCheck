<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 11, 2021
//This is our own work

/*Handles bucket list & list item business logic and connections to database*/
namespace App\Services\Business;

use App\Models\ListItemModel;
use \mysqli;
use App\Services\Data\BucketListDataService;

class BucketListBusinessService {
    /**
     * Create Bucket List
     * @param int $userID
     * @return boolean
     */
    public function createBucketList(int $userID) {
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

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
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

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
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

        //create a security service dao with this connection and try to find the password in user
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
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

        //create a security service dao with this connection and try to find the password in user
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
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

        //create a security service dao with this connection and try to find the password in user
        $service = new BucketListDataService($conn);
        $flag = $service->findAllLists();

        //return the finder results
        return $flag;
    }
}
