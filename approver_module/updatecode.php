<?php
//connect to database
include '../config.php';
session_start();

    if(isset($_POST['updatettg']))
    {   
        $refno = $_POST['update_id'];
        $app_name = $_POST['app_name'];
        $status = $_POST['status'];
        $fulfill_date =  $_POST['fulfill_date'];
        $remarks = $_POST['remarks'];
        $att3 = $_POST['att3'];
       
        
        $path="../user_module/uploaded_folder/";
        
        if(isset($_FILES['att3'])){
              $errors= array();
              $att3_name = $_FILES['att3']['name'];
              $att3_name2 = $_FILES['att3']['name'];
              $att3_size =$_FILES['att3']['size'];
              $att3_tmp =$_FILES['att3']['tmp_name'];
              $att3_type=$_FILES['att3']['type'];
              $att3_ext=strtolower(end(explode('.',$_FILES['att3']['name'])));
      
              $att3_name_raw =explode('.',$att3_name2);
             
              $dashboard_name="NNMR_";
              if(empty($errors)==true){
                $att3_name =$dashboard_name."-".date("Ymd-His")."_".$att3_name_raw[0].".".$att3_ext;
                $att3_name = $path.str_replace(" ", "_", $att3_name);
                 move_uploaded_file($att3_tmp,$att3_name);
                 echo "Success Uploaded File";
              }else{
                 print_r($errors);
              }
          }
           

        $query = "UPDATE nnmr_user_ttg SET app_name =  '$app_name', status ='$status' , fulfill_date = '$fulfill_date' , 
        remarks = '$remarks', att3 = '$att3_name'  WHERE refno='$refno'  ";
        $query_run = mysqli_query($conn, $query);


        if($query_run)
        {
            header("Location:request_ttg.php?result=edit");
        }else
        {
            echo '<script> alert("Update Failed"); </script>';
        }
    }



    if(isset($_POST['updatevehicle']))
    {   
       $refno = $_POST['update_id'];
       $app_name = $_POST['app_name'];
        $status = $_POST['status'];
        $fulfill_date =  $_POST['fulfill_date'];
        $remarks = $_POST['remarks'];
        $att3 = $_POST['att3'];
       
        
        $path="../user_module/uploaded_folder/";
        
        if(isset($_FILES['att3'])){
              $errors= array();
              $att3_name = $_FILES['att3']['name'];
              $att3_name2 = $_FILES['att3']['name'];
              $att3_size =$_FILES['att3']['size'];
              $att3_tmp =$_FILES['att3']['tmp_name'];
              $att3_type=$_FILES['att3']['type'];
              $att3_ext=strtolower(end(explode('.',$_FILES['att3']['name'])));
      
              $att3_name_raw =explode('.',$att3_name2);
             
              $dashboard_name="NNMR_";
              if(empty($errors)==true){
                $att3_name =$dashboard_name."-".date("Ymd-His")."_".$att3_name_raw[0].".".$att3_ext;
                $att3_name = $path.str_replace(" ", "_", $att3_name);
                 move_uploaded_file($att3_tmp,$att3_name);
                 echo "Success Uploaded File";
              }else{
                 print_r($errors);
              }
          }
           

        $query = "UPDATE nnmr_user_vehicle SET app_name =  '$app_name', status = '$status' , fulfill_date = '$fulfill_date' , 
        remarks = '$remarks', att3 = '$att3_name'  WHERE refno='$refno'  ";
        $query_run = mysqli_query($conn, $query);


        if($query_run)
        {
            header("Location:request_vehicle.php?result=edit");
        }else
        {
            echo '<script> alert("Update Failed"); </script>';
        }
    }


    ?>
