<?php
$title = 'Viewrecords';
require_once 'includes/header.php';
require_once 'includes/auth.check.php';
require_once 'db/conn.php';
$results = $crud->getAttendees();


?>
<table class="table table-danger">
    <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Specialty</th>
        <th>Actions</th>


    </tr>
    <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr>
        
        <td><?php echo $r['attendee_id'] ?></td>
        <td><?php echo $r['firstname'] ?></td>
        <td><?php echo $r['lastname'] ?></td>
        <td><?php echo $r['name'] ?></td>
        <td><a class = "btn btn-primary" href ="view.php?id= <?php echo $r['attendee_id'] ;?>">View</a>
            <a class = "btn btn-warning" href ="edit.php?id= <?php echo $r['attendee_id'] ;?>">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record ?');" class = "btn btn-danger" href ="delete.php?id= <?php echo $r['attendee_id'] ;?>">Delete</a>

        </td>




    </tr>
    <?php } ?>
</table>

<?php require_once 'includes/footer.php' ?>

