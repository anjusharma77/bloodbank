<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function login(Request $request){
        // Validate the form data
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
      

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // dd(session()->getId());
            $user = Auth::user();
            $request->session()->regenerate();
        $request->session()->put('user_name', Auth::user()->name);
        $request->session()->put('user_type', Auth::user()->user_type);
            if($request->input('type') == 'receiver'){
                return redirect()->intended('dashboard');
                return view('receivers.dashboard',['user'=>$user]);
            }
            if($request->input('type') == 'hospital'){
                return view('hospital.dashboard',['user'=>$user]);
            }
            
             // Redirect to dashboard or intended page
        } else {
            // Authentication failed...
            return back()->withErrors(['email' => 'Invalid credentials']); // Redirect back with error message
        }

    }

    public function register(Request $request)
    {
        // Retrieve and validate input (for demonstration purposes)
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'type' => 'required|in:receiver,hospital',
            'address' => 'nullable|required_if:type,hospital|string|max:255',
            'state' => 'nullable|required_if:type,hospital|string|max:255',
            'image' => 'nullable|required_if:type,hospital|image|max:2048', // max 2MB
            'blood_group' => 'nullable|required_if:type,receiver|string|max:255',
        ]);

        // Create a new User instance
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->user_type = $data['type'];

        // Handle specific fields based on user type
        if ($request['type'] == 'hospital') {
            $user->address = $request->input('address');
            $user->state = $request->input('state');

            if ($request->hasFile('image')) {
                // Store the image in public/images folder
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images'), $imageName);
                
                // Save only the image file name in the database
                $user->image = $imageName;
            }
        } elseif ($request['type'] == 'receiver') {
            $user->blood_group = $request->input('blood_group');
        }

        // Save the user to the database
        $user->save();

        // Optionally, you can redirect the user after successful registration
        return redirect('/');
    }

    public function logout(Request $request)
    {
      
        
        Auth::logout();        
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        return redirect('/'); 
    }
}
