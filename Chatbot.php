<?php

include_once __DIR__ . "/../providers/Validator.php";
include_once __DIR__ . "/../models/Models.php";


class Chatbot
{
    public function __construct()
    {
    }
    public function index()
    {

        $crud = new Models('chat_messages');
        $chat_messages = $crud->read_all();
        
   
        foreach ($chat_messages as $message) {
            echo "Sender ID: " . $message['sender_id'] . "<br>";
            echo "Recipient ID: " . $message['recipient_id'] . "<br>";
            echo "Message: " . $message['message'] . "<br>";
            echo "Attachment Path: " . $message['attachment_path'] . "<br>";
            echo "Created At: " . $message['created_at'] . "<br><br>";
        }
    }
}    
