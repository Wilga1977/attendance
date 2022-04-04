<?php
$title = 'View.php';
require_once 'includes/header.php';
require_once 'includes/auth.check.php';
require_once 'db/conn.php';

if(!isset($_GET['id'])) {
    include 'includes/errormessage.php';
    
    
    
}else{
    $id = $_GET['id'];
    $result = $crud->getAtendeesDetails($id);

    
?>

<div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Nom : <?php echo $result['firstname'] ?> </h5>
            <h5 class="card-title">Prénom : <?php echo  $result['lastname'] ?> </h5>
            <h6 class="card-subtitle mb-2 text-muted">Date of Birth: <?php echo $result['dateofbirth']?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Speciality: <?php echo  $result['name']?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Email Adress: <?php echo  $result['emailadress'] ?></h6>
            <h6 class="card-subtitle mb-2 text-muted">Phone Number: <?php echo  $result['contactnumber'] ?></h6>
            
        </div>
</div>
            <a class = "btn btn-primary" href ="viewrecords.php?id= <?php echo $result['attendee_id'] ;?>">View</a>
            <a class = "btn btn-warning" href ="edit.php?id= <?php echo $result['attendee_id'] ;?>">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record ?');" class = "btn btn-danger" href ="delete.php?id= <?php echo $result['attendee_id'] ;?>">Delete</a>

    <?php } ?>



<br>
<br>
<br>
<br>
<?php require_once 'includes/footer.php' ?>