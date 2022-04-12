<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Interfaces\UserRepositoryInterface;
use App\Http\Requests\RegisterUserFormRequest;
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


    public function register(RegisterUserFormRequest $request){
      $address = $request->get('address');
      $url = "https://nominatim.openstreetmap.org/search?q=$address&format=json&addressdetails=1&limit=1";
      $opts = array(
        'http'=>array(
          'header'=>array("Referer: $url\r\n")
          )
        );
        $context = stream_context_create($opts);
        $content_url = file_get_contents($url, false, $context); 
        $json = json_decode($content_url);
        $latitude=!empty($json[0]->lat)?$json[0]->lat:'';
        $longitude=!empty($json[0]->lon)?$json[0]->lon:$json[0]->lon;
        $user= $this->user_repository->create($request,$latitude,$longitude);
        return response()->json(['success' => true,'message' => 'Registration is completed']);
}

}
