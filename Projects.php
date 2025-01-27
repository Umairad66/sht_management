<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";

class Projects
{
    public function __construct()
    {
    }
    public function index()
    {

        $projects = new Models("projects");
        $projects =  $projects->read_all();

        $users = new Models("users");
        $users =  $users->read_all();

        //    echo "<pre>";
        //         print_r($users);
        //         exit;
        return view("projects/index", [
            "projects" => $projects,
            "users" => $users,
        ]);
    }

    function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $crud = new Models('projects');

            $validator = new Validator();

            $rules = [
                'name' => 'required',
                'description' => 'required|max:200',
                'team_ids' => 'required',
                'status' => 'required',
                'priority' => 'required',
            ];

            $validator->validate($data, $rules);
            if ($validator->errors()) {
                echo json_encode($validator->errors());
                // echo json_encode(['errors' => $validator->errors()]);
                exit;
            }

            $data['team_ids'] = json_encode($data['team_ids']);
            // echo "<pre>";
            // print_r($data);
            // exit;
            $projects = $crud->create($data);
             echo json_encode([
                "success" => true,
               
             ]);
           
        }
    }

    function edit()
    {
        $crud = new Models('projects');
        $projects = $crud->read("id", $_POST['id']);
        echo json_encode($projects);
        // print_r($users);
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
        
            $projects_data = [
                'name' => $data['name'],
                'description' => $data['description'],
                'team_ids' => $data['team_ids'],
                'status' => $data['status'],
                'priority' => $data['priority'],
            ];
        
            $crud = new Models('projects');
            $projects_data['team_ids'] = json_encode($projects_data['team_ids']);
            $result = $crud->update($data['id'], $projects_data, "id");
        
            // Check the result and return a meaningful response
            if ($result) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Failed to update project"]);
            }
        }
        
    }
    function delete()
    {
        $crud = new Models('projects');
        $users = $crud->delete($_POST['id'], "id");
        echo json_encode($users);
    }
}
