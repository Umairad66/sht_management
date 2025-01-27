<?php

include_once __DIR__. "/../providers/Validator.php";
include_once __DIR__. "/../models/Models.php";

class Profile
{
    public function __construct()
    {
    }

    function index() {

        $users = new Models("users");
        $users = $users->read_all();

        echo "<pre>";
        print_r($users);
        exit;
        
        return view("profile/edit");
    }
}