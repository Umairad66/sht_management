<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";

class Tasks
{
    public function __construct()
    {
    }
    function loaddata()
    {

        $tasks = new Models("tasks");
        $tasks =  $tasks->read_all();

        // echo "<pre>";
        // print_r($tasks);
        // exit;

        echo json_encode($tasks);
    }



    public function index()
    {

        $tasks = new Models("tasks");
        $tasks = $tasks->read_all();
        // users
        $users = new Models("users");
        $users = $users->read_all();

        // projects
        $projects = new Models("projects");
        $projects = $projects->read_all();

        $data = [
            "tasks" => $tasks,
            "projects" => $projects,
            "users" => $users,
        ];
        return view("tasks/index", $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $crud = new Models('tasks');
    
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
                // echo json_encode(['errors' => $validator->errors()]);
                exit;
            }
    
            // Sanitize or validate $data as needed to prevent security vulnerabilities
    
            $tasks = $crud->create($data);
            echo json_encode([
                "success" => true
            ]);
        }
    }
    
    function edit()
    {
        $crud = new Models('tasks');
        $tasks = $crud->read("id", $_POST['id']);
        echo json_encode($tasks);
        // print_r($tasks);
        // exit;
    }
    function update()
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

        // Sanitize or validate $data as needed to prevent security vulnerabilities

        $crud = new Models('tasks');
        $tasks_data = [
            'name' => $data['name'],
            'description' => $data['description'],
            'project_id' => $data['project_id'],
            'assigned_to' => $data['assigned_to'],
            'status' => $data['status'],
            'priority' => $data['priority'],
            'due_date' => $data['due_date'],
        ];

        $tasks = $crud->update($data['id'], $tasks_data, "id");
        echo json_encode([
            "success" => true
        ]);
    }
}


    function delete()
    {
        $crud = new Models('tasks');
        $tasks = $crud->delete($_POST['id'], "id");
        echo json_encode($tasks);
    }
}
