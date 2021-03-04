<?php
//Milestone 2
//Almicke Navarro and Emily Quevedo
//February 9, 2021
//This is our own work

/* Login module processes the authentication of user credentials */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use App\Models\CredentialModel;
use App\Services\Business\UserBusinessService;

class LoginController extends Controller
{
    /**
     * This method authenticates the user's credentials
     * @param Request $request
     * @throws ValidationException
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request) {
        try{
            //1. process form data
            //get posted form data
            $username = $request->input('username');
            $password = $request->input('password');

            //2. create object model
            //save posted form data in user object model
            $user = new CredentialModel(0, $username, $password);

            //3. execute business service
            //call security business service
            $service = new UserBusinessService();

            $user_id = $service->login($user);

            //4. process results from business service (navigation)
            //set session variables
            //render a failed or success response view and pass the user model to it

            if ($user != null && $user_id) {
                $request->session()->put('username', $username);
                $request->session()->put('user_id', $user_id);

                return redirect('explore');
            }

            else {
                // return view('loginFail');
                return redirect()->back()->with('message', 'Login Failed');
            }
        }

        catch(Exception $e) {
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }

    /**
     * This method is to log the user out
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request) {
        try{
            //$request->session()->forget('user_id');
            $request->session()->flush();
            $request->session()->regenerate(true);
            return redirect('/home');
        }

        catch(Exception $e) {
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
}
