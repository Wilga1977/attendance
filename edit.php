<?php
$title = 'Edit Page';
require_once 'includes/header.php';
require_once 'includes/auth.check.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();
if(!isset($_GET['id'])){
    include 'includes/errormessage.php';
}else{
    $id = $_GET['id'];
    $attendee = $crud->getAtendeesDetails($id);


?>
<!-- 
    - First name
    - Date of Birth (Use Datepicker)
    - Speciality (Datebase Admin,software Developer, web Administrator,Other)
    - Email Adress
    - Contact Number    
 -->

<h1 class="text-center">Edit Record</h1>

<form method="POST" action="editpost.php">
    <input type = "hidden" name='id' value = "<?php echo $attendee['attendee_id'] ?>"/> 
    <div class="form-group">
        <label for="firstname" class="form-label" >First Name</label>
        <input type="text" class="form-control" value = "<?php echo $attendee['firstname'] ?>" id="firstname" name ="firstname" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="lastname" class="form-label"name ="lasttname">Last Name</label>
        <input type="text" class="form-control" value = "<?php echo $attendee['lastname'] ?>" id="lastname"name ="lastname" aria-describedby="emailHelp">
    </div>
    <!-- Il faudra ajouter le jquery ui au div suivant -->
    <div class="form-group mb-2">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" value = "<?php echo $attendee['dateofbirth'] ?>" id="dob" name ="dob" aria-describedby="emailHelp">
    </div>
    <div class="form-group" >
    <select class="form-control"name = "activity" aria-label="Default select example">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value ="<?php echo $r['speciality_id'] ?>"<?php if($r['speciality_id'] == $attendee['speciality_id']) echo "selected" ?>>
            <?php echo $r['name'] ?>
        </option>
        
        <?php } ?>
    </select>
   </div>
    <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email"value = "<?php echo $attendee['emailadress'] ?>" class="form-control" id="email"name ="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="pwd" class="form-label">Password</label>
        <input type="password" class="form-control" id="pwd"name ="pwd">
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="tel" class="form-control"value = "<?php echo $attendee['contactnumber'] ?>" id="phone" name ="phone" aria-describedby="emailHelp">
    </div>
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-success" name = "submit">Save Changes</button>
    </div>
</form>
<?php } ?>
<?php require_once 'includes/footer.php' ?>