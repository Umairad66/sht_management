<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";

class Users
{
    public function __construct()
    {
    }
    public function index()
    {

        $users = new Models("users");
        $users =  $users->read_all();
        //    echo "<pre>";
        //         print_r($users);
        //         exit;
        return view("users/index", $users);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $crud = new Models('users');
            // echo "<pre>";
            // print_r($data);
            // exit;

            $validator = new Validator();

            $rules = [
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required',
            ];
            $validator->validate($data, $rules);
            if ($validator->errors()) {
                echo json_encode($validator->errors());
                // echo json_encode(['errors' => $validator->errors()]);
                exit;
            }
            $users = $crud->create($data);
            echo json_encode([
                "success" => true
            ]);
            // header("Location: " . route("users"));
            // exit;
        }
    }
    function edit()
    {
        $crud = new Models('users');
        $users = $crud->read("id", $_POST['id']);
        echo json_encode($users);
        // print_r($users);
        // exit;

    }

    function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;

            $validator = new Validator();

            $rules = [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'role' => 'required',
            ];

            $validator->validate($data, $rules);

            if ($validator->errors()) {
                echo json_encode(['errors' => $validator->errors()]);
                exit;
            }

            // Hash the password before storing it (optional but recommended)
             $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $crud = new Models('users');
            $users_data = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $hashedPassword,
                'role' => $_POST['role'],
            ];
           
            // echo "<pre>";
            // print_r($users_data);
            // exit;

            $users = $crud->update($_POST['id'], $users_data, "id");
            echo json_encode([
                "success" => true
        ]);
        }
    }

    function delete()
    {
        $crud = new Models('users');
        $users = $crud->delete($_POST['id'], "id");
        echo json_encode($users);
    }
}
