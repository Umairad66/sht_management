<?php

include_once __DIR__. "/../providers/Validator.php";
include_once __DIR__. "/../models/Models.php";

class Auth
{
    public function __construct()
    {
        $this->old("", $_POST);
    }

    private function old($field_name = "", $POST = []) {
    
        // Check if the field exists in the session and return its value
        if(!empty($field_name))
            return ($_SESSION["old"][$field_name] ?? null) ? $_SESSION["old"][$field_name] : '';

        if(!empty($POST)){
            foreach ($POST as $key => $value) {
                if($key !== "password"){
                    $_SESSION["old"][$key] = $value;
                }
            }
        }

    }

    function register_view()
    {
        return view("auth/register");
    }


    function register_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = $_POST;

            $validator = new Validator();

            $rules = [
                'username' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
            ];

            $validator->validate($data, $rules);

            if ($validator->errors()) {
                $_SESSION['form_errors'] = $validator->errors();
                header("Location: " . route("register"));
                exit;
            }

            $crud = new Models('users');
            $user = $crud->read("email", $data['email']);

            if(!$user){

                $newUserId = $crud->create($data);
                echo "New user ID: " . $newUserId . "\n";
                
                header("Location: " . route("login"));
                exit;
            }else{
                $_SESSION["form_errors"]['email'][0] = "Provided email is already taken.";
                header("Location: " . route("register"));
                exit;
            }

        }
    }


    function login_view()
    {
        return view("auth/login");
    }


    function login_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = $_POST;

            $validator = new Validator();

            $rules = [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20',
            ];

            $validator->validate($data, $rules);

            if ($validator->errors()) {
                $_SESSION['form_errors'] = $validator->errors();
                header("Location: " . route("login"));
                exit;
            }

            $crud = new Models('users');
            $user = $crud->read("email", $data['email']);
            
            if($user && password_verify($data['password'], $user['password'])){

                unset($user['password']);
                $_SESSION['auth'] = $user;
                
                header("Location: " . route(""));
                exit;
            }else{
                $_SESSION["form_errors"]['email'][0] = "Credentials did not match our record!";
                header("Location: " . route("login"));
                exit;
            }

        }

    }


    function logout_view()
    {
        return view("auth/dashboard");
    }


    function logout_submit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            unset($_SESSION['loginData']);

            header("Location: " . route("login"));
            exit;
        }
    }


    function dashboard_view()
    {
        return view("dashboard");
    }


    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $data = $_POST;

            $validator = new Validator();

            $rules = [
                'name' => 'required',
                'description' => 'required|max:200',
                'project_id' => 'required',
                'assigned_to' => 'required',
                'priority' => 'required',
                'status' => 'required',
                'due_date' => 'required',
            ];

            $validator->validate($data, $rules);

            if ($validator->errors()) {
                echo json_encode($validator->errors());
                exit;
            }

            $crud = new Models('tasks');
            $tasks = $crud->read("name", $data['name']);
        }

    }


}
