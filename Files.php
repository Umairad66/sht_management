<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";

class Files
{
    public function __construct()
    {
    }
    public function index()
    {
        $files = new Models("files");
        $files =  $files->read_all();

        $tasks = new Models("tasks");
        $tasks = $tasks->read_all();
        // users
        $users = new Models("users");
        $users = $users->read_all();

        $data = [
            'files' => $files,
            'tasks' => $tasks,
            'users' => $users,

        ];
        //    echo "<pre>";
        //         print_r($users);
        //         exit;
        return view("files/index", $data);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
          
            if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
                $file_name = $_FILES['file']['name'];
                $file_tmp = $_FILES['file']['tmp_name'];
                $file_type = $_FILES['file']['type'];
                $file_size = $_FILES['file']['size'];
                
                move_uploaded_file($file_tmp, __DIR__."/../assets/uploads/" . $file_name);
                $data['file_name'] = $file_name; 
            }
            $crud = new Models('files');
            $files = $crud->create($data);
            header("Location: " . route("files"));
            exit;
        }
    }

    function edit()
    {
        $crud = new Models('files');
        $_FILES = $crud->read("id", $_POST['id']);
        echo json_encode($_FILES);
        // print_r($users);
        // exit;

    }
    // function update()
    // {
    //     $users_data = array(
    //         'username' => $_POST['username'],
    //         'email' => $_POST['email'],
    //         'password' => $_POST['password'],
    //         'role' => $_POST['role'],
    //     );
    // //     echo "<pre>";
    // //     print_r($users_data);
    // //   exit;
    //     $crud = new Models('users');
    //     $users = $crud->update($_POST['id'], $users_data, "id");
    //     echo json_encode($users);
    // }
    // function delete()
    // {
    //     $crud = new Models('users');
    //     $users = $crud->delete($_POST['id'], "id");
    //     echo json_encode($users);
    // }
}
