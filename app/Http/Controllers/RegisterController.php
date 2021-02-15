<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use App\Services\Business\UserBusinessService;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller {
    //add a user
    public function index(Request $request){
        try{
            //$this->validateForm($request);

            //recieves data inputed from user
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');

            //2. create object model
            //save posted form data in user object model
            $user = new UserModel(-1, $email, $username, $password);

            //3. execute business service
            //call user business service
            $service = new UserBusinessService();
            $status = $service->create($user);

            //4. process results from business service (navigation)
            //render a failed or success response view and pass the user model to it
            if ($status) {
                return redirect('home');
            }

            else {
                return redirect()->back()->with('message', 'Register Failed');
            }
        }
        catch (ValidationException $e1) {
            //note: this exception must be caught before exception bc validationexception extends from exception
            //must rethrow this exception in order for laravel to display your submitted page with errors
            //catch and rethrow data validation exception (so we can catch all others in our next exception catch block
            throw $e1;
        }
    }

    private function validateForm(Request $request){
        //best practice: centralize your rules so you have a consistent architecture and even reuse your rules
        //bad practice: not using a defined data validation framework, putting rules all over your code, doing only on client side or database
        //setup data validation rules for login form
        $rules = ['username' => 'unique:User'];

        $customMessage = ['unique' => '*Username already exists'];

        //run data validation rules
        $this->validate($request, $rules, $customMessage);
    }
}
