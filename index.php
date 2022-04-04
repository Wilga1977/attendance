<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialties();


?>
<!-- 
    - First name
    - Date of Birth (Use Datepicker)
    - Speciality (Datebase Admin,software Developer, web Administrator,Other)
    - Email Adress
    - Contact Number    
 -->

<h1 class="text-center">Registration IT Conference</h1>

<form method="POST" action="success.php">
    <div class="form-group">
        <label for="firstname" class="form-label" >First Name</label>
        <input type="text" class="form-control" id="firstname" name ="firstname" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="lastname" class="form-label"name ="lasttname">Last Name</label>
        <input type="text" class="form-control" id="lastname"name ="lastname" aria-describedby="emailHelp">
    </div>
    <!-- Il faudra ajouter le jquery ui au div suivant -->
    <div class="form-group mb-2">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name ="dob" aria-describedby="emailHelp">
    </div>
    <div class="form-group" >
    <select class="form-control"name = "activity" aria-label="Default select example">
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
        <option value ="<?php echo $r['speciality_id'] ?>"><?php echo $r['name'] ?></option>
        
        <?php } ?>
    </select>
   </div>
    <div class="form-group">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email"name ="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="pwd" class="form-label">Password</label>
        <input type="password" class="form-control" id="pwd"name ="pwd">
    </div>
    <div class="form-group">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="tel" class="form-control" id="phone" name ="phone" aria-describedby="emailHelp">
    </div>
    <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary" name = "submit">Submit</button>
    </div>
</form>

<?php require_once 'includes/footer.php' ?>