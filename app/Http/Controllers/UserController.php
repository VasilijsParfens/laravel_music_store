<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Show register form
    public function create(){
        return view('users.register');
    }

    // Show user list for admin
    public function user_list(){
        return view('users.user_list');
    }

    // Show all users
    public function showAllUsers(){

        $users = User::all();

        return view('users.user_list', compact('users'));
    }

    // Create user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8'
        ]);

        // Encrypt password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create new user
        $user = User::create($formFields);

        // Login after registration
        auth()->login($user);

        // Go to homepage after registration
        return redirect('/');
    }

    // Delete user
    public function destroy(User $user) {
        $user->delete();
        return redirect('/user_list')->with('message', 'User deleted successfully');
    }

    // Show login form
    public function login(){
        return view('users.login');
    }

    // Authorize user
    public function authorize(Request $request){
        $formFields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()-> withErrors(['email', 'password' => 'Wrong input! Please try again!']);
    }

    // User log out
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // Order - User relations
    public function orders() {
        return $this->hasMany(Order::class);
    }
}
