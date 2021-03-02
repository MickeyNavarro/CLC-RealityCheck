<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

/*Handles user business logic and connections to database*/
namespace App\Services\Business;

use \mysqli;
use App\Models\UserModel;
use App\Models\CredentialModel;
use App\Services\Data\UserDataService;

class UserBusinessService {
/**
     * Create User
     * @param UserModel $user
     * @return boolean
     */
    public function create(UserModel $user) {
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

        //create a user service dao with this connection and try to create user
        $service = new UserDataService($conn);
        $flag = $service->createUser($user);

        //return the finder results
        return $flag;
    }

    /**
     * User login
     * @param CredentialModel $user
     * @return NULL
     */
    public function login(CredentialModel $user) {
        //create connection
        $conn = new mysqli( "pfw0ltdr46khxib3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "wjbw0lcl49iw7wvr", "ftgibcj4cx7q2n8v", "lfvhk00fwjkpc2eq" );

        //create a user service dao with this connection and try to find the username and password in user
        $service = new UserDataService($conn);
        $flag = $service->findByUser($user);

        //return the finder results
        return $flag;
    }
}
