<?php
    include("./assets/sessions/session_admin.php");
    
    $id=$_GET['id'];

    $sql = "DELETE FROM locations 
            WHERE id='$id'";

    $query = mysqli_query($con,$sql) or die (mysqli_error());
    
    mysqli_close($con);
	
    header("Location: read_location.php");
?>
