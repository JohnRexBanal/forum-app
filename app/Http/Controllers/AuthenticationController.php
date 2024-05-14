<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function authenticateUser(Request $request)
    {
        // Attempting authentication with provided email and password
        if (auth()->attempt($request->only('email', 'password'))) {
            // If authentication is successful, redirect to check user account
            return $this->validateUserAccount();
        }

        // If authentication fails, redirect back with input and a warning message
        return back()->withInput()->with('warning', 'Incorrect user credentials.');
    }

    public function logout()
    {
        // Logging out user and flushing session data
        auth()->logout();
        session()->flush();

        // Redirecting to home page with success message
        return redirect('/login')->with('success', 'Successfully logged out.');
    }

    private function validateUserAccount()
    {
        // Checking if user is authenticated
        if (!auth()->check()) {
            // If not authenticated, redirect back
            return back();
        }

        // If authenticated, get the authenticated user
        $authenticatedUser = auth()->user();

        // Redirecting to dashboard with a welcome message
        return redirect()->route("home")->with('success', "Welcome $authenticatedUser->name.");
    }
}
