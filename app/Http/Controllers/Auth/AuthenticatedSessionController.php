<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Guard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
       $validator =Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }
        $credentials=['email'=>$request->email,'password'=>$request->password];
        if (Auth::attempt($credentials)) {
       
            $request->session()->regenerate();
            return redirect('dashboard');
        }
        else{
            
            return redirect()->back()->with('email', 'Credentials not match');
        }
        // $user_info = User::where(function ($query) use ($request){
        //     $query->where(['email' => $request->input('email')]);
        // })->first();
        // if($user_info){
        //     if(Hash::check($request->input('password'),$user_info->password)){
        //         $credential=$request->only('email','password');
        //         $request->session()->put('id',$user_info->id);
        //         $request->session()->put('name',$user_info->name);
        //         $request->session()->put('usertype',$user_info->usertype);
              
        //         return redirect('dashboard');
        //       }
            //   else{
            //       dd("hello");
            //     // return view('auth/login')->with('msg','credentials not matching');
            //        return  Redirect::back()->withErrors('Credintials not matching');
            //     
                

            // }
        //}
    
        // $credentials = $request->getCredentials();
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);

        // Auth::login($user);

        // return $this->authenticated($request, $user);
        
        // if($userInfo){
        //     if(Hash::check($request->password,$userInfo->password)){
        //         $credential = $request->only('email','password');
        //         $user = Auth()->Login($credential);
        //         return response()->json([
        //             'success' => true,
        //             'data'=> $this->guard()->user(),
        //             'message' => 'Successfully logged in.',
        //         ],200);
        //     }else{
        //         return response()->json([
        //             'success' => false,
        //             'message' => 'Invalid username or Password',
        //         ]);
        //     }
        // }
        // return $user;
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function destroy(Request $request)
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
