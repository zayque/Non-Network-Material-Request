<?php

include '../config.php';

if (isset($_POST['insertttg'])) {
    $date = date('y-m-d h:i:s');
    $req_name = $_POST['req_name'];
    $rec_div = $_POST['rec_div'];
    $ttg_type = $_POST['ttg_type'];
    $ttg_item =  $_POST['ttg_item'];
    $quantity =  $_POST['quantity'];
    $justification = $_POST['justification'];
    $att1 = $_FILES['att1'];
    $att2 = $_FILES['att2'];

    $path="uploaded_folder/";
    
      if(isset($_FILES['att1'])){
            $errors= array();
            $att1_name = $_FILES['att1']['name'];
            $att1_name2 = $_FILES['att1']['name'];
            $att1_size =$_FILES['att1']['size'];
            $att1_tmp =$_FILES['att1']['tmp_name'];
            $att1_type=$_FILES['att1']['type'];
            $att1_ext=strtolower(end(explode('.',$_FILES['att1']['name'])));
    
            $att1_name_raw =explode('.',$att1_name2);
           
            $dashboard_name="NNMR_";
            if(empty($errors)==true){
              $att1_name =$dashboard_name."-".date("Ymd-His")."_".$att1_name_raw[0].".".$att1_ext;
              $att1_name = $path.str_replace(" ", "_", $att1_name);
               move_uploaded_file($att1_tmp,$att1_name);
               echo "Success Uploaded File";
            }else{
               print_r($errors);
            }
         }


         if(isset($_FILES['att2'])){
            $errors= array();
            $att2_name = $_FILES['att2']['name'];
            $att2_name2 = $_FILES['att2']['name'];
            $att2_size =$_FILES['att2']['size'];
            $att2_tmp =$_FILES['att2']['tmp_name'];
            $att2_type=$_FILES['att2']['type'];
            $att2_ext=strtolower(end(explode('.',$_FILES['att2']['name'])));
    
            $att2_name_raw =explode('.',$att2_name2);
           
            $dashboard_name="NNMR_";
            if(empty($errors)==true){
               if ($att2_name != NULL){ 
                  
              $att2_name ="2. ".$dashboard_name."-".date("Ymd-His")."_".$att2_name_raw[0].".".$att2_ext;
              $att2_name = $path.str_replace(" ", "_", $att2_name);
               move_uploaded_file($att2_tmp,$att2_name);
               echo "Success Uploaded File";
               }
            }else{
               print_r($errors);
            }
         }

    $query = "INSERT INTO nnmr_user_ttg (`date/time`,`req_name`,`rec_div`, `ttg_type`, `ttg_item`, `quantity`,`justification`, `att1`, `att2`) 
    VALUES ('$date','$req_name','$rec_div','$ttg_type', '$ttg_item' , '$quantity' , '$justification' , '$att1_name', '$att2_name' )";
    

    mysqli_query($conn, $query);
    header('Location:form_user_ttg.php?result=insert');
    
         //  echo "<meta http-equiv='refresh' content='0;url=https://nmo.tm.com.my/material_delivery_plan/weekly.php?result=insert'>";
          
   
}



if (isset($_POST['insertvehicle'])) {

    $date = date('y-m-d h:i:s');
    $req_name = $_POST['req_name'];
    $rec_div = $_POST['rec_div'];
    $v_type = $_POST['v_type'];
    $v_model =  $_POST['v_model'];
    $quantity =  $_POST['quantity'];
    $justification = $_POST['justification'];
    $att1 = $_FILES['att1'];
    $att2 = $_FILES['att2'];

    $path= "uploaded_folder/";
    
      if(isset($_FILES['att1'])){
            $errors= array();
            $att1_name = $_FILES['att1']['name'];
            $att1_name2 = $_FILES['att1']['name'];
            $att1_size =$_FILES['att1']['size'];
            $att1_tmp =$_FILES['att1']['tmp_name'];
            $att1_type=$_FILES['att1']['type'];
            $att1_ext=strtolower(end(explode('.',$_FILES['att1']['name'])));
    
            $att1_name_raw =explode('.',$att1_name2);
           
            $dashboard_name="NNMR_";
            if(empty($errors)==true){
              $att1_name =$dashboard_name."-".date("Ymd-His")."_".$att1_name_raw[0].".".$att1_ext;
              $att1_name = $path.str_replace(" ", "_", $att1_name);
               move_uploaded_file($att1_tmp,$att1_name);
               echo "Success Uploaded File";
            }else{
               print_r($errors);
            }
         }


         if(isset($_FILES['att2'])){
            $errors= array();
            $att2_name = $_FILES['att2']['name'];
            $att2_name2 = $_FILES['att2']['name'];
            $att2_size =$_FILES['att2']['size'];
            $att2_tmp =$_FILES['att2']['tmp_name'];
            $att2_type=$_FILES['att2']['type'];
            $att2_ext=strtolower(end(explode('.',$_FILES['att2']['name'])));
    
            $att2_name_raw =explode('.',$att2_name2);
           
            $dashboard_name="NNMR_";
            if(empty($errors)==true){
               if ($att2_name != NULL){ 

                  $att2_name ="2. ".$dashboard_name."-".date("Ymd-His")."_".$att2_name_raw[0].".".$att2_ext;
                  $att2_name = $path.str_replace(" ", "_", $att2_name);
                   move_uploaded_file($att2_tmp,$att2_name);
                   echo "Success Uploaded File";
                  
                  }
             
            }else{
               print_r($errors);
            }
         }

    
    //     echo '<meta http-equiv="refresh" content="0; url=index.php" />';
       

    $query = "INSERT INTO nnmr_user_vehicle (`date/time`,`req_name`,`rec_div`, `v_type`, `v_model`, `quantity`,`justification`, `att1`, `att2`) 
    VALUES ('$date','$req_name','$rec_div','$v_type', '$v_model' , '$quantity' , '$justification' , '$att1_name', '$att2_name' )";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        header('Location:form_user_vehicle.php?result=insert');
    } else {
        echo '<script> alert("Data Not submitted"); </script>';
    }
}
?>