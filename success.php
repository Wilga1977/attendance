<?php
 $title="Succes";
 require_once 'includes/auth.check.php';
 require_once 'includes/header.php';
 require_once 'db/conn.php'; 
 if(isset($_POST['submit'])){
    $fname = $_POST['lastname'];
    $lname = $_POST['firstname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $contact = $_POST['phone'];
    $speciality = $_POST['activity'];
    $isSuccess = $crud-> insertAttendees($fname,$lname,$dob, $email, $contact,$speciality);

    if($isSuccess){
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
            <h6 class="card-subtitle mb-2 text-muted">Speciality: <?php echo $speciality?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Email Adress: <?php echo $email ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Phone Number: <?php echo $contact ?></h6>
            
        </div>
    </div>
   </br> <br> <br> <br>
    <?php require_once 'includes/footer.php' ?>
    

