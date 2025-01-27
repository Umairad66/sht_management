<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";

class Teacher
{
    public function __construct()
    {
    }
    function loaddata()
    {

        $teacher = new Models("teacher");
        $teacher =  $teacher->read_all();

        // echo "<pre>";
        // print_r($teacher);
        // exit;

        echo json_encode($teacher);
    }



    function output()
    {

        $teacher = new Models("teacher");
        $teacher =  $teacher->read_all();

        // echo "<pre>";
        // print_r($teacher);
        // exit;

        return view("profile/teacher", $teacher);
    }
    function insert()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = $_POST;
            $crud = new Models('teacher');
            // echo "<pre>";
            // print_r($data);
            // exit;
            $teacher = $crud->create($data);
            echo json_encode($teacher);
            // header("Location: " . route("teacher"));
            // exit;
        }
    }

    function update()
    {
        $crud = new Models('teacher');
        $teacher = $crud->read("teacher_id", $_POST['teacher_id']);
        echo json_encode($teacher);
        // print_r($teacher);
        // exit;
    }
    function updatedata()
    {
        $teacher_data = array(
            'teacher_name' => $_POST['teacher_name'],
            'teacher_type' => $_POST['teacher_type'],
            'age' => $_POST['Age']
        );
        $crud = new Models('teacher');
        $teacher = $crud->update($_POST['teacher_id'], $teacher_data, "teacher_id");
        echo json_encode($teacher);
    }
    function delete()
    {
        $crud = new Models('teacher');
        $teacher = $crud->delete($_POST['teacher_id'], "teacher_id");
        echo json_encode($teacher);
    }
}
