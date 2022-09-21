<?php
include '../config.php';
session_start();
if (!$_SESSION['role'] == 'user' || !$_SESSION['role'] == 'approver') {
    header("Location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Non-Network Material Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>

<body>

    <script>
    var ttgObject = {
        "Tools": {
            "Optical Light Source": "",
            "Optical Fiber Identifier": "",
            "Fiber Cleaver": "",
            "Visual Fault Locator": "",
            "Splicing Machine(Single)": "",
            "Lineman Handset": "",
            "Swift Tablet": "",
            "TM Force Tablet": ""
        },
        "Test Gear": {
            "Optical Power Meter": "",
            "Optical Power Meter (PON)": "",
            "OTDR": "",
            "Analog Tester (Copper Tester)": "",
            "DQ & ISDN Tester": "",
            "Ethernet Tester (1GE)": "",
            "Ethernet Tester (10GE)": "",
            "Ethernet Tester (100GE)": "",
            "SHDSL TESTER": "",
            "ADSL Tester / OP II / Triple Play / OP III ": "",
            "Multi-meter": "",
            "Earth Tester": "",
            "Clamp Meter (AC/DC)": ""
        }
    }
    window.onload = function() {
        var typeSel = document.getElementById("ttg_type");
        var itemSel = document.getElementById("ttg_item");

        for (var x in ttgObject) {
            typeSel.options[typeSel.options.length] = new Option(x, x);
        }
        typeSel.onchange = function() {
            itemSel.length = 1;
            //display correct values
            for (var y in ttgObject[this.value]) {
                itemSel.options[itemSel.options.length] = new Option(y, y);
            }
        }
    }
    </script>
    <div class="overflow-auto">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="form_user_ttg.php">
                    <img src="../images/tmlogo.png" width="50" height="30" class="d-inline-block align-top" alt="">
                    Non-Network Material Request (TTG)
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                New Material Request
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./form_user_ttg.php">Non-Network Material Request (TTG)
                                    <span class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="./form_user_vehicle.php">Non-Network Material Request
                                    (Vehicle)</a>

                            </div>
                        </li>
                        <!-- <a class="nav-item nav-link active" href="#form">New Delivery <span class="sr-only">(current)</span></a> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Material Request Record
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./record_ttg.php">Non-Network Material Request (TTG)<span
                                        class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="./record_vehicle.php">Non-Network Material Request
                                    (Vehicle)</a>

                            </div>
                        </li>
                        <a class="nav-item nav-link" href="../about.php">About</a>

                    </div>
                </div>
                <?php
                if ($_SESSION['role'] == 'admin') {
                    echo  '<div><a class = "btn btn-primary" href ="register_user_admin.php">Admin</a></div>';
                }



                ?>
                <div class="nav-item text-nowrap">
                    <a class="nav-link px-3" href="../logout.php">Logout</a>

                </div>

            </nav>
        </header>

        <div id='form' class="container">
            <?php
            if (isset($_GET['result'])) {
                if ($_GET['result'] == 'delete') {

                    echo '<div class="alert alert-danger" role="alert">
                You have deleted this record succesfully.
              </div>';
                } else if ($_GET['result'] == 'insert') {
                    echo '<div class="alert alert-success" role="alert">
                Record request is submitted! You may view/revise record in the Material Request Record Tab
              </div>';
                } else if ($_GET['result'] == 'edit') {
                    echo '<div class="alert alert-success" role="alert">
                Record has been successfully updated!
              </div>';
                } else if ($_GET['result'] == 'completed') {

                    echo '<div class="alert alert-success" role="alert">
                
                Status has been succesfully updated to Completed!
                
                </div>';
                } else {
                    echo "error";
                }
            }
            ?>

            <div class="card mx-auto shadow bg-white rounded"
                style="width: 38rem; height: 60rem;  margin-bottom: 30px;  margin-top: 30px; ">



                <h4 class="card-header text-center">Non-Network Material Request Information</h4>
                <form action="insertcode.php" method="POST" enctype="multipart/form-data">


                    <div class="modal-body">


                        <div class="form-group">
                            <label> Requestor Name </label>
                            <input type="text" name="req_name" class="form-control"
                                value=<?php echo  $_SESSION['staff_id'] ?> readonly>
                        </div>

                        <div class="form-group">
                            <label> Recipient Division/ Unit </label>
                            <select class="dropdown form-control" id="rec_div" name="rec_div" required="required">
                                <option selected disabled hidden>Select Recipient Division/ Unit</option>
                                <option value="AND">AND</option>
                                <option value="NO – SDZ">NO – SDZ</option>
                                <option value="NO – CNZ">NO – CNZ</option>
                                <option value="NO – ENZ">NO – ENZ</option>
                                <option value="NO – DDZ">NO – DDZ</option>
                                <option value="CNFD">CNFD</option>
                                <option value="CTD">CTD</option>
                                <option value="CTX">CTX</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> TTG Type </label><br>
                            <select class="dropdown form-control" id="ttg_type" name="ttg_type" required="required">
                                <option selected disabled hidden>Select TTG Type</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> TTG Item </label><br>
                            <select class="dropdown form-control" id="ttg_item" name="ttg_item" required="required">
                                <option selected disabled hidden>Select TTG Item</option>

                            </select>
                        </div>


                        <div>
                            <label>Quantity</label>
                            <input class="form-control" type="number" required="required" id="quantity" name="quantity"
                                placeholder="Enter Quantity"> <br>
                        </div>
                        <div class="form-group">
                            <label>Justification </label>
                            <input type="text" name="justification" class="form-control"
                                placeholder="Enter Justification" required="required">
                        </div>

                        <div class="form-group">
                            <label>Attachment(1) <p class="text-muted">*Required: Official paper approved by Head of
                                    Division</p> </label>
                            <input type="file" name="att1" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Attachment(2) <p class="text-muted">*Optional: Quotation from Vendor </p> </label>
                            <input type="file" name="att2" class="form-control">
                        </div>

                        <div class="text-right">
                            <button type="submit" name="insertttg" class="btn btn-primary">Save Data</button>
                            <button type="reset" class="btn btn-danger"> Clear Form </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(".alert").show(() => {
        setTimeout(() => {
            $(".alert").fadeTo(500, 1).slideUp(500, () => {

                $(message).hide();
            })
        }, 5000)
    });
    </script>



</body>


</html>