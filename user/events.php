<?php

include_once '../config/constants.php';
include_once '../config/db.php';

$type = $_POST['type'];

if($type == 'fetch'){

    $events = array();
    $e = array();

    $sql = "SELECT * FROM tbl_reservation WHERE status = '1'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            
           $e['id']  = $row['id'];
           $e['title']  = $row['sport'];
           $e['user_id'] = $row['user_id'];
           $e['start'] = $row['date'];
           $e['end'] = $row['date'];
           array_push($events, $e);
        }
        echo json_encode($events);
    }
}

if($type == 'getEvent'){
    $date = $_POST['date'];

    $events = array();
    $e = array();

    $sql = "SELECT * FROM tbl_reservation WHERE date = '".$date."' AND status = '1'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            
           $e['id']  = $row['id'];
           $e['title']  = $row['sport'];
           $e['user_id'] = $row['user_id'];
           $e['start'] = $row['date'];
           $e['end'] = $row['date'];
           array_push($events, $e);
        }
        echo json_encode($events);
    }

}

?>