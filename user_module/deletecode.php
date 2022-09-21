<?php
include '../config.php';


if(isset($_POST['deletedata']))
{
    $refno = $_POST['delete_id'];

    $query = "DELETE FROM nnmr_user_vehicle WHERE refno='$refno'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header('Location:record_vehicle.php?result=delete');
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}



if(isset($_POST['deletettg']))
{
    $refno = $_POST['delete_id'];

    $query = "DELETE FROM nnmr_user_ttg WHERE refno='$refno'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header('Location:record_ttg.php?result=delete');
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>