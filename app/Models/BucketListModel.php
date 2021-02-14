<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

/* BucketList Model Object */
namespace App\Models;

class BucketListModel {
    private $id;
    private $user_id;

    public function __construct($id, $user_id) {
        $this->id = $id;
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
    }
}
