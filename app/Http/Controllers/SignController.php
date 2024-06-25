<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; // Correct namespace for Session facade
use App\Models\Login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.reg');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'Required',
            'email'=>'Required | email | unique:logins,email',
            'password'=>'Required | min:3 | max:8'    //confirmed
        ],
        [
            'email.unique'=>'email already exists.'
        ]);

        $login=new Login();
        $login->name=$request->name;
        $login->email=$request->email;
        $login->password=Hash::make($request->password);

        if ($login->save()) {
            return redirect()->route('login.login')
                             ->with('success', 'User created successfully');
        }
        

        return redirect()->route('login.register')->with('no', "couldn't creat ");
    }

    
   

public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3|max:8' // No spaces between | and min/max
        ]);

        $login = Login::where('email', $request->email)->first();
        if ($login) {
            if (Hash::check($request->password, $login->password)) {
                $request->session()->put('loginId', $login->id);
                return view('layouts.wel',compact("request"));
            } else {
                return back()->with('fail', 'User password is wrong');
            }
        } else {
            return back()->with('error', 'User not registered');
        }
    }

    public function view(Login $login)
    {

        //return view()
        // Initialize an empty data array
        // $data = [];

        // if (Session::has('loginId')) {
          
        //     $loginId = Session::get('loginId');

          
        //     $login = Login::find($loginId);

           
        //     if ($login) {
        //         // Populate the data array with the login information
        //         $data['login'] = $login;
        //     } else {
        //         // If the 'Login' record is not found, clear the session
        //         Session::forget('loginId');
        //     }
        //}

        // Pass the data to the view and render it
       // return view('layouts.wel', $data);

    }


    public function logout(Request $request)
{
    // Clear the authenticated user's session
    $request->session()->forget('loginId');
    
    // Redirect the user to the login page or any other desired page
    return redirect()->route('login.index')->with('success', 'Logged out successfully');
 
}


 

    /**
     * Update the specified resource in storage.
     */
    // public function upload()
    // {
    //     return view('layouts.imageupload');
    // }

   
    // public function imageupload(Request $request)
    // {
    //     $request->validate([
    //         'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
    //     ]);

    //     $imagename=time().'.'.$request->image->extension();  // for time & file type (jpeg,png...)

    //     $request->image->move(public_path('images'),$imagename);

    //     return back()->withsuccess('You have successfully uploaded the image')
    //     ->withimagename($imagename);
    // }
}
