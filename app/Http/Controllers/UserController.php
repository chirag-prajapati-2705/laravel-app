<?php

namespace App\Api\Controllers;

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
    public function index(UserRe)
    {
        dd('ddd');
    }
}
