<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work
namespace App\Http\Services\Data;

use App\Models\ListItemModel;

//Database interacts with the data from the bucketlist item class
class BucketListDataService {
    private $conn = null;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to add item to database
    public function createListItem(ListItemModel $item) {
        //select variables and see if the row exists
        $title = $recipe->getTitle();
        $description = $recipe->getDescription();
        $ingredients = $recipe->getIngredients();

        //prepared statements is created
        $stmt = $this->conn->prepare("INSERT INTO `recipes` (`title`, `description`, `ingredients`, `directions`, `time`, `image`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssssss', $title, $description, $ingredients, $directions, $time, $image);

        /*see if user existed and return true if found
        else return false if not found*/
        if ($stmt->execute()) {
            return true;
        }

        else {
            echo "ERROR: " . mysqli_error($this->conn);
            return false;
        }
    }

    //Method to get data from database
    public function readAllRecipes() {
        //prepared statement is created to display recipes
        $stmt = "SELECT * from `recipes`";
        //executes prepared query
        // $stmt->execute();
        $result = mysqli_query($this->conn, $stmt);

        if ($result->num_rows > 0) {
            //recipe array is created
            $recipeArray = array();
            //fetches result from prepared statement and returns as an array
            while ($recipe = mysqli_fetch_assoc($result)) {
                //inserts variables into end of array
                array_push($recipeArray, $recipe);
            }

            //return recipe array
            return $recipeArray;
        }
    }
}
