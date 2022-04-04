<?php
$title = 'Delete';

require_once 'includes/auth.check.php';
require_once 'db/conn.php';

if(!$_GET['id']){
    include 'includes/errormessage.php';
    
}else{
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);
}
if($result){
    header("Location: viewrecords.php");
}else{
    echo 'redirection failed!';
}


?>