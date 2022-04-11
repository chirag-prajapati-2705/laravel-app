<?php
namespace App\Interfaces;

interface UserRepositoryInterface
{

    public function create($request,$latitude,$longitude);

    public function getAll();

    public function delete($id);


}
