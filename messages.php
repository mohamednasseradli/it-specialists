<?php 
    include('./connect.php');

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if ( isset($_POST['action']) && $_POST['action'] == 'add-message')
        {

            $sender     = $_POST['sender'];
            $receiver   = $_POST['receiver'];
            $message    = $_POST['message'];
    
            global $con;
    
            // Query to add new rating
            $query      = $con->prepare('INSERT INTO messages (sender_id, receiver_id, message ) VALUES (:sender_id, :receiver_id, :message)');
            $success    = $query->execute(
                [
                    'sender_id'     => $sender,
                    'receiver_id'   => $receiver,
                    'message'       => $message,
                ]
            );
    
            if ($success)
            {
                echo 'message added';
            } else {
                
                echo 'Error';
            }
        } elseif (isset($_POST['action']) && $_POST['action'] == 'get-messages')
        {
            $tech       = $_POST['tech_id'];
            $client     = $_POST['client_id'];
            $query      = $con->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)");
            $query->execute([$client, $tech, $tech, $client]);

            if ($query->rowCount() == 0)
            {
                echo 0;

            } else 
            {
                echo json_encode($query->fetchAll());
            }
        }
    }