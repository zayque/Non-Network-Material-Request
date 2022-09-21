<?php
//connect to database
include '../config.php';
session_start();

    if(isset($_POST['editdata']))
    {   
        $refno = $_POST['update_id'];
        $req_name = $_POST['req_name'];
        $rec_div = $_POST['rec_div'];
        $v_type =  $_POST['v_type'];
        $v_model =  $_POST['v_model'];
        $quantity = $_POST['quantity'];
        $justification = $_POST['justification'];
        // $att1 = $_FILES['att1'];
        // $att2 = $_FILES['att2'];


    //     $path="public/uploaded_folder/";
    
    //   if(isset($_FILES['att1'])){
    //         $errors= array();
    //         $att1_name = $_FILES['att1']['name'];
    //         $att1_name2 = $_FILES['att1']['name'];
    //         $att1_size =$_FILES['att1']['size'];
    //         $att1_tmp =$_FILES['att1']['tmp_name'];
    //         $att1_type=$_FILES['att1']['type'];
    //         $att1_ext=strtolower(end(explode('.',$_FILES['att1']['name'])));
    
    //         $att1_name_raw =explode('.',$att1_name2);
           
    //         $dashboard_name="NNMR_";
    //         if(empty($errors)==true){
    //           $att1_name =$dashboard_name."-".date("Ymd-His")."_".$att1_name_raw[0].".".$att1_ext;
    //           $att1_name = $path.str_replace(" ", "_", $att1_name);
    //            move_uploaded_file($att1_tmp,$att1_name);
    //            echo "Success Uploaded File";
    //         }else{
    //            print_r($errors);
    //         }
    //      }


    //      if(isset($_FILES['att2'])){
    //         $errors= array();
    //         $att2_name = $_FILES['att2']['name'];
    //         $att2_name2 = $_FILES['att2']['name'];
    //         $att2_size =$_FILES['att2']['size'];
    //         $att2_tmp =$_FILES['att2']['tmp_name'];
    //         $att2_type=$_FILES['att2']['type'];
    //         $att2_ext=strtolower(end(explode('.',$_FILES['att2']['name'])));
    
    //         $att2_name_raw =explode('.',$att2_name2);
           
    //         $dashboard_name="NNMR_";
    //         if(empty($errors)==true){
    //           $att2_name =$dashboard_name."-".date("Ymd-His")."_".$att2_name_raw[0].".".$att2_ext;
    //           $att2_name = $path.str_replace(" ", "_", $att2_name);
    //            move_uploaded_file($att2_tmp,$att2_name);
    //            echo "Success Uploaded File";
    //         }else{
    //            print_r($errors);
    //         }
    //      }



        $query = "UPDATE nnmr_user_vehicle SET req_name = '$req_name' , rec_div = '$rec_div' , 
        v_type = '$v_type' , v_model = '$v_model'', quantity = '$quantity' , justification ='$justification' 
        WHERE refno='$refno'  ";
        $query_run = mysqli_query($conn, $query);


        if($query_run)
        {
            header('Location:record_vehicle.php?result=insert');
        }else
        {
            echo '<script> alert("Edit Failed"); </script>';
        }
    }


    ?>