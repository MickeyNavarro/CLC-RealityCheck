<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

/* BucketList Item Model Object */
namespace App\Models;

class ListItemModel {
    private $id;
    private $description;
    private $bucketlist_id;

    public function __construct($id, $description, $bucketlist_id) {
        $this->id = $id;
        $this->description = $description;
        $this->bucketlist_id = $bucketlist_id;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getBucketListID()
    {
        return $this->bucketlist_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

     /**
     * @param mixed $bucketlist_id
     */
    public function setBucketListID($bucketlist_id)
    {
        $this->bucketlist_id = $bucketlist_id;
    }
}
