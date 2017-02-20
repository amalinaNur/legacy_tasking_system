<?php
/**
 * Created by PhpStorm.
 * User: Ehtesham Mehmood
 * Date: 11/24/2014
 * Time: 11:55 PM
 */
include("Connections/Connection.php");
$delete_id=$_GET['id'];
$delete_query="DELETE FROM tasks WHERE id='$delete_id'";//delete query
$run=mysqli_query($Connection,$delete_query);
if($run)
{
//javascript function to open in the same window
    echo "<script>window.location = 'list_tasks.php';</script>";
}


?>