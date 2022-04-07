<?php
 $title="Success";
 require_once 'includes/auth.check.php';
 require_once 'includes/header.php';
 require_once 'db/conn.php';
 require_once 'sendmail.php'; 
 if(isset($_POST['submit'])){
    $fname = $_POST['lastname'];
    $lname = $_POST['firstname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['activity'];
    $isSuccess = $crud-> insertAttendees($fname,$lname,$dob, $email, $contact,$speciality);
    $specialtyName = $crud->getSpecialtyById($speciality);

    if($isSuccess){
        SendEmail::SendMail($email, 'Welcome to IT Conference 2022','You have succesfully registered for this year\'s IT Conference');
       include 'includes/successmessage.php';
        
    
    }else{
        include 'includes/errormessage.php';
        
    }
 }
 ?>
    
    

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nom : <?php echo $fname ?> </h5>
            <h5 class="card-title">Prénom : <?php echo $lname ?> </h5>
            <h6 class="card-subtitle mb-2 text-muted">Date of Birth: <?php echo $dob?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Speciality: <?php echo $specialtyName['name']?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Email Adress: <?php echo $email ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Phone Number: <?php echo $contact ?></h6>
            
        </div>
    </div>
   </br> <br> <br> <br>
    <?php require_once 'includes/footer.php' ?>
    

