<?php
 $title="Editpost";
 require_once 'db/conn.php'; 
 if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $fname = $_POST['lastname'];
    $lname = $_POST['firstname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['activity'];
    $result = $crud->editAttendee($id,$fname,$lname,$dob, $email, $contact,$speciality);
    if($result){
       header("Location: viewrecords.php");
    }else{
       include 'includes/errormessage.php';
    }
 }else{
   include 'includes/errormessage.php';
     
 }   