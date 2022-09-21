<?php
include '../config.php';
session_start();
if (!$_SESSION['role'] == 'approver') {
    header("Location:../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Non-Network Material Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

</head>

<body>

    <!-- UPDATE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Update Request </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST" enctype="multipart/form-data">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">


                        <div class="form-group">
                            <label> Approver Name </label>
                            <input type="text" name="app_name" id="app_name" class="form-control" value=<?php echo  $_SESSION['staff_id'] ?> readonly>
                        </div>

                        <div class="form-group">
                            <label> Status (Approver) </label>
                            <select class="dropdown form-control" id="status" name="status" required="required">
                                <option selected disabled hidden>Select Status</option>
                                <option value="Fulfilled">Fulfilled</option>
                                <option value="Partially fulfilled">Partially fulfilled</option>
                                <option value="Approved - Pending fulfillment">Approved - Pending fulfillment</option>
                                <option value="Query">Query</option>
                                <option value="Cancel">Cancel</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label> Estimated Fulfillment Date </label><br>

                            <input type="date" name="fulfill_date" id="fulfill_date" class="form-control" placeholder="Select Date" required="required">
                        </div>


                        <div class="form-group">
                            <label>Remarks</label><br>
                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks" required="required">

                        </div>

                        <div>
                            <label>Attachment</label>
                            <input class="form-control" type="file" name="att3" id="att3">

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updatevehicle" class="btn btn-primary">Update Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Record </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h6>Are you sure to delete this record permanently?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancel </button>
                        <button type="submit" name="deletevehicle" class="btn btn-primary"> Proceed to Delete </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="overflow-auto">

        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="request_vehicle.php">
                    <img src="../images/tmlogo.png" width="50" height="30" class="d-inline-block align-top" alt="">
                    Non-Network Material Request (Vehicle)
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Material Request Record
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="./request_ttg.php">Non-Network Material Request (TTG) <span class="sr-only">(current)</span></a>
                                <a class="dropdown-item" href="./request_vehicle.php">Non-Network Material Request (Vehicle)</a>

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
        Record delivery is submitted! You may view/revise record in the Material Request Record Tab
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
        </div>


        <?php
        include '../config.php';


        $query = "SELECT * FROM nnmr_user_vehicle";
        $query_run = mysqli_query($conn, $query);
        ?>


        <h3 class="text-center" style="padding-top: 20px; padding-bottom: 20px;"> Non-Network Material Request Record (Vehicle)</h3>

        <table id="datatableid" class="table table-striped table-bordered text-center">
            <thead>
                <tr>

                    <th>Ref No.</th>
                    <th>Date/Time</th>
                    <th>Requestor Name</th>
                    <th>Recipient Division/Unit</th>
                    <th>Vehicle Type</th>
                    <th>Vehicle Model</th>
                    <th>Quantity</th>
                    <th>Justification</th>
                    <th>Attachment</th>
                    <th>Action</th>
                    <th>Approver Name</th>
                    <th>Status (Approver)</th>
                    <th>Estimated Fulfillment Date</th>
                    <th>Remarks (Approver)</th>
                    <th style="width:50%" >Attachment (Approver)</th>
                    <th>Aging</th>

                </tr>
            </thead>
            <?php
            if ($query_run) {
                foreach ($query_run as $row) {
            ?>
                    <div style="display: table-row-group;">
                        <tr>


                            <td class="refno"> <?php echo $row['refno']; ?> </td>
                            <td> <?php echo $row['date/time']; ?> </td>
                            <td> <?php echo $row['req_name']; ?> </td>
                            <td> <?php echo $row['rec_div']; ?> </td>
                            <td> <?php echo $row['v_type']; ?> </td>
                            <td> <?php echo $row['v_model']; ?> </td>
                            <td> <?php echo $row['quantity']; ?> </td>
                            <td> <?php echo $row['justification']; ?> </td>
                          
                            <td>
                            
                            <a href="../user_module/<?php echo $row['att1']; ?>" >1. <?php echo str_replace("uploaded_folder/", "",  $row['att1']);  ?> </a>
                            <a href="../user_module/<?php echo $row['att2']; ?>"><?php echo str_replace("uploaded_folder/", "",  $row['att2']);  ?> </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success updatebtn mx-auto" id="update"> Update </button>

                                <button type="button" class="btn btn-danger deletebtn"> Delete </button>
                            </td>
                            <td> <?php echo  $_SESSION['staff_id'] ?> </td>
                            <td> <?php echo $row['status']; ?> </td>
                            <td> <?php echo $row['fulfill_date']; ?> </td>
                            <td> <?php echo $row['remarks']; ?> </td>
                            <td>  
                            <a href="<?php echo $row['att3']; ?>"><?php echo str_replace("../user_module/uploaded_folder/", "",  $row['att3']);  ?> </a>
                         </td>
                            <td> <?php echo $row['aging']; ?> </td>


                        </tr>
                    </div>
            <?php
                }
            } else {
                echo "No Record Found";
            }
            ?>
        </table>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src=" https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <script>
        $(document).ready(function() {

            $('#datatableid thead tr').clone(true).appendTo('#datatableid thead');
            $('#datatableid tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" style = "width: 100%;" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            var table = $('#datatableid').DataTable({
                orderCellsTop: true,
                fixedHeader: true,

                dom: 'lBfrtip',
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],



                buttons: [

                    {
                        extend: 'copy',
                        exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13, 14]
                        }

                    }, {
                        extend: 'csv',
                        title: 'Non-Network Material Request (Vehicle)',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13,14]

                        }

                    }, {
                        extend: 'excel',
                        title: 'Non-Network Material Request (Vehicle)',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13,14]

                        }

                    }, {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        title: 'Non-Network Material Request (Vehicle)',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13,14]

                        }

                    }, {
                        extend: 'print',
                        title: 'Non-Network Material Request (Vehicle)',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 10, 11, 12, 13,14]

                        }

                    },

                ],

            });
        });

        $(document).ready(function() {

            $('#datatableid tbody').on('click', '.updatebtn', function() {
                // $('.editbtn').on('click', function() {

                $('#updatemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]); 
                $('#status').val(data[11]);
                $('#fulfill_date').val(data[12]);
                $('#remarks').val(data[13]);
                $('#att3').val(data[14]);


            });
        });
        $(document).ready(function() {

            $('#datatableid tbody').on('click', '.deletebtn', function() {
                // $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });

        });

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