<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 12, 2021
//This is our own work

/* Bucket List module processes the creation of a bucket list item */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\ListItemModel;
use App\Services\Business\BucketListBusinessService;

class BucketListController extends Controller
{
    /**
     * This method creates a new bucket list item AND creates a new bucket list if needed
     * @param Request $request
     * @throws ValidationException
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request) {
            //1. check if bucket list exists
            //get the user ID from the session variables
            $user_id = $request->session()->get('user_id');

            //2. call bucket list business service
            $service = new BucketListBusinessService();

            //3. execute business service
            //find the bucket list ID that belongs to the user with the given ID
            $bucketListID = $service->findListByUserID($user_id);

            //4. check if the bucket list was returned
            if ($bucketListID != null) {
                //1. process form data
                //get posted form data
                $listItem = $request->input('listItem');

                //2.create object model
                //save posted form data in list item object model
                $newItem = new ListItemModel(0, $listItem, $bucketListID);

                //3. execute business service
                //create a new bucket list item with the form data and bucket list ID
                $success = $service->createListItem($newItem);

                // $find = $service->findListItems($bucketListID);

                //4. process results from business service
                //render a failed response view with an error message or a success response view with the new list item
                if ($newItem != null && $success) {
                    return view('mybucketlistResult')->with('bucketlist_id', $bucketListID);
                }

                else {
                    return redirect()->back()->with('message', 'Bucket list item creation has failed');
                }
            }
            else {
                //1. execute business services
                //create a new bucket list to belong to the user with the given ID
                $listSuccess = $service->createBucketList($user_id);

                //find the bucket list ID that belongs to the user with the given ID
                $bucketListID = $service->findListByUserID($user_id);

                //2. check if the bucket list was created
                if ($listSuccess && $bucketListID != null) {
                    //1. process form data
                    //get posted form data
                    $listItem = $request->input('listItem');

                    //2.create object model
                    //save posted form data in list item object model
                    $newItem = new ListItemModel(0, $listItem, $bucketListID);

                    //3. execute business service
                    //create a new bucket list item with the form data and bucket list ID
                    $success = $service->createListItem($newItem);

                    $find = $service->findListItems($bucketListID);

                    //4. process results from business service
                    //render a failed response view with an error message or a success response view with the new list item
                    if ($newItem != null && $success) {
                        return view('mybucketlistResult')->with('list', $find);
                    }

                    else {
                        return redirect()->back()->with('message', 'Bucket list item creation has failed');
                    }
                }

                return redirect()->back()->with('message', 'Bucket list not found');
            }
    }

    /**
     * This method find the bucket list items
     * @param Request $request
     * @throws ValidationException
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function getList(Request $request) {
        //
        $user_id = $request->session()->get('user_id');

        $service = new BucketListBusinessService();

        $bucketListID = $service->findListByUserID($user_id);

        if($bucketListID != null){
            $find = $service->findListItems($bucketListID);

            return view('mybucketlist')->with('list', $find);
        }

    }
}
