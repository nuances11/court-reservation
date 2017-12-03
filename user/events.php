<?php

include_once '../config/constants.php';
include_once '../config/db.php';

$type = $_POST['type'];

if($type == 'fetch'){
        $events = array();
        $e = array();
    
        $sql = "SELECT * FROM tbl_reservation a INNER JOIN tbl_court b ON b.court_id = a.court_id WHERE a.court_id = '".$_GET['barangay']."'";
        $result = $conn->query($sql);
        $color = '';
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                list($start, $end) = explode('-', $row['hour']);
                if($row['res_status'] == '0'){
                    $color = '#FFD700';
                }
               $e['id']  = $row['id'];
               $e['title']  = $row['sport'] . ' - ID:' . $row['user_id'];
               $e['user_id'] = $row['user_id'];
                $e['start'] = $row['date'].'T'.$start;
            $e['end'] = $row['date'].'T'.$end;
               
            $e['start_time'] = $start;
            $e['end_time'] = $end;
            $e['color'] = $color;
               array_push($events, $e);
            }
            
        }else{
            $events = array();
            $e = array();
        }
        echo json_encode($events);
    
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

if($type == 'check'){
    $date = $_POST['date'];
    $barangay = $_POST['barangay'];

    $events = array();
    $e = array();

    $sql = "SELECT * FROM tbl_court_hours WHERE hour NOT IN(SELECT hour FROM tbl_reservation WHERE court_id = '".$barangay."' AND date = '".$date."')";
    $result = $conn->query($sql);  
    
    if ($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
           $e['date'] = $date;
           $e['hour']  = $row['hour'];
           
           array_push($events, $e);
        }
        echo json_encode($events);
        // print_r($events);
        // exit;
    }

}

?>
