<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $user_repository;
    
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->middleware('guest');
        $this->user_repository = $user_repository;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        
    }

    public function register(Request $request){

      $latitude='';
      $longitude='';
      $post_data = $request->validate([
        'name'=>'required|string',
        'phone' => 'required|min:11|numeric',
        'email'=>'required|string|email|unique:users',
        'password'=>'required|min:8'
      ]);

      $user= $this->user_repository->create($request,$latitude,$longitude);
      return response()->json(['success' => true,'message' => 'Registration is completed']);

}

}
