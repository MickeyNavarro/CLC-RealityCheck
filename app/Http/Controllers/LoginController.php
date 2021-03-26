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
use App\Services\Utility\RealityCheckLogger;

class LoginController extends Controller
{
    /**
     * This method authenticates the user's credentials
     * @param Request $request
     * @throws ValidationException
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request) {
        RealityCheckLogger::info("Entering LoginController.index()");

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

                RealityCheckLogger::info("Leaving LoginController.index() to view Explore Page due to login success");

                return redirect('explore');
            }

            else {
                // return view('loginFail');
                return redirect()->back()->with('message', 'Login Failed');
                RealityCheckLogger::info("Leaving LoginController.index() to redirect to Home Page (Login) due to login failure");
            }
        }

        catch(Exception $e) {
            RealityCheckLogger::error("Exception: ", array("message" => $e->getMessage()));
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
        RealityCheckLogger::info("Entering LoginController.logout()");

        try{
            //$request->session()->forget('user_id');
            $request->session()->flush();
            $request->session()->regenerate(true);
            RealityCheckLogger::info("Leaving LoginController.index() to view Home Page due to logout success");
            return redirect('/home');
        }

        catch(Exception $e) {
            RealityCheckLogger::error("Exception: ", array("message" => $e->getMessage()));
            $data = ['errorMsg' => $e->getMessage()];
            return view('exception')->with($data);
        }
    }
}
