<?php
namespace App\Repositories;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create($request,$latitude,$longitude)
    {
      $user = app()->make(User::class);
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->address = $request->get('address');
      $user->password = Hash::make($request->get('password'));
      $user->phone = $request->get('phone');
      $user->latitude = $latitude;
      $user->longitude = $longitude;
      $user->save();
      return $user;
    }

    public function byId($id)
    {
      return User::find($id);
    }

    public function getAll()
    {
      return User::all();
    }

    public function delete($id)
    {
      return User::find($id)->delete();
    }

    

}