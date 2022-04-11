<?php

namespace App\Api\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $user_repository)
    {
      $this->user_repository = $user_repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users =  $this->user_repository->getAll();
        return response()->json(['users' => $users]);
    }

    public function show($id)
    {
      $user =  $this->user_repository->byId($id);
      return response()->json(['user' => $user]);
    }

    public function delete()
    {
        if(empty(request()->get('id')))
        {
           return response()->json(['success' => false,'message' => 'Something went wrong!']);
        }
       $this->user_repository->delete(request()->get('id'));
       return response()->json(['success' => true,'message' => 'User has been successfully deleted']);
    }
}
