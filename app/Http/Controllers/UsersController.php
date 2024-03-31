<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class UsersController extends Controller
{

    //view dashbaord index page
    public function index()
    {
        // $User = Auth::user();
        $user = auth()->user();
        if ($user) {
            return view('dashboard.index');
        } else {
            return redirect()->route('login');
        }
    }
    // view login page
    public function viewLogin()
    {
        return view('dashboard.login');
    }

    //login user
    public function userLogin(Request $request)
    {
        try {
            // Validate the request data
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Attempt to log in the user
            if (Auth::attempt($credentials)) {
                return redirect()->route('dashboard.index')->with('success', 'Login successful!');
            } else {
                throw ValidationException::withMessages([
                    'email' => 'Invalid email or password.',
                ]);
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    //view register page
    public function register()
    {
        return view('dashboard.register');
    }

    //create new user
    public function createUser(Request $request)
    {
        try {
            // Validate the data
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);

            // If validation fails, return the validation errors
            if ($validator->fails()) {
                throw new \Exception('Validation failed', 422);
            }

            // Create the user
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
            ]);

            // Log in the user
            Auth::login($user);

            return redirect()->route('dashboard.index')->with('success', 'User registered successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    // logout 
    public function logout(Request $request)
    {
        Auth::logout(); 
        return redirect()->route('login'); 
    }
}
