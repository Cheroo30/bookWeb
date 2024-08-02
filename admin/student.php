<?php
    include "includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<style>
     .box-body {
        margin-top:10px;
    }

    .modal-body .mb-3 {
    display: flex;
    align-items: center;
  }

  .modal-body label {
    margin-bottom: 0;
    margin-right: 10px;
    min-width: 150px;
  }
</style>
<body>
<?php
        include "includes/test2.php";
    ?>
<div class="main-content">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php
        if (isset($_SESSION['errorst'])) {
            echo "
                <div id='errorModal' class='modal fade' role='dialog'>
                    <div class='modal-dialog modal-dialog-centered'>
                        <!-- Modal content-->
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                <h4 class='modal-title'><i class='icon fa fa-check'></i> error!</h4>
                            </div>
                            <div class='modal-body'>
                                <p>" . $_SESSION['errorst'] . "</p>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-error' data-dismiss='modal'>Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <script>
                    $(document).ready(function(){
                        $('#errorModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['errorst']);
        }
        if (isset($_SESSION['successt'])) {
            echo "
            <div id='successModal' class='modal fade' role='dialog'>
            <div class='modal-dialog modal-dialog-centered' style='max-width: 400px; max-height: 700px;'>
                <!-- Modal content-->
                <div class='modal-content border-0'>
                    <div class='modal-body text-center'>
                        <h1 class='modal-title'><i class='fas fa-check fa-2xl text-success'></i></h1>
                        <p style='margin-top:20px;'>Data Berhasil Di Input!</p>
                    </div>
                </div>
            </div>
        </div>
        
            
                <script>
                    $(document).ready(function(){
                        $('#successModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['successt']);
        }
        if (isset($_SESSION['editst'])) {
            echo "
            <div id='editModal' class='modal fade' role='dialog'>
            <div class='modal-dialog modal-dialog-centered' style='max-width: 400px; max-height: 700px;'>
                <!-- Modal content-->
                <div class='modal-content border-0'>
                    <div class='modal-body text-center'>
                        <h1 class='modal-title'><i class='fas fa-check fa-2xl text-success'></i></h1>
                        <p style='margin-top:20px;'>Data Berhasil Di Edit!</p>
                    </div>
                </div>
            </div>
        </div>
        
            
                <script>
                    $(document).ready(function(){
                        $('#editModal').modal('show');
                    });
                </script>
            ";
            unset($_SESSION['editst']);
        }
      ?>
    <section class="content-header">
        <h1>
            Student List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Static error and success messages (if needed) -->
        <!-- Replace these messages with your desired content -->
        

        <div class="color">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <a href="#" id="openAddModal" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">
                        <i class="fa fa-plus"></i> New
                        </a>
                         <!-- Modal add-->
                         <div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="RegisterForm" action="student_add.php" method="POST" class="form-inline">
                                <div class="mb-3">
                                    <label for="student" class="form-label">Full Name Student</label>
                                    <input type="text" class="form-control" name="nama_lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Password</label>
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Number</label>
                                    <input type="text" class="form-control" name="no_telp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                            </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                         <!-- Modal edit-->
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="UpdateForm" action="student_edit.php" method="POST" class="form-inline">
                                <div class="mb-3" hidden>
                                    <label for="bookId" class="form-label">Student ID</label>
                                    <input type="text" class="form-control" id="studentId" name="id_user" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Full Name Student</label>
                                    <input type="text" class="form-control" id="fullName" name="nama_lengkap" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="userName" name="username" required>
                                </div>
                                <!--
                                <div class="mb-3">
                                    <label for="student" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
    -->
                                <div class="mb-3">
                                    <label for="student" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="alamat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Number</label>
                                    <input type="text" class="form-control" id="number" name="no_telp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="student" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                            </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="box-body table-responsive text-nowrap">
                        <table>
                            <thead>
                                <th>No</th>
                                <th>FullName</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Address</th>
                                <th>Number</th>
                                <th>Email</th>
                                <th>Tools</th>
                            </thead>
                            <tbody>
                            <?php
                                include "includes/conn.php";

                                $no = 1;
                                $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE role = 'user'");

                                while ($data = mysqli_fetch_assoc($sql)) {
                                    echo "<tr>
                                            <td scope='row'>" . $no++ . "</td>
                                            <td class='full-name'>" . $data['nama_lengkap'] . "</td>
                                            <td class='username'>" . $data['username'] . "</td>
                                            <td class='password'>" . $data['password'] . "</td>
                                            <td class='alamat'>" . $data['alamat'] . "</td>
                                            <td class='number'>" . $data['no_telp'] . "</td>
                                            <td class='email'>" . $data['email'] . "</td>
                                            <td>
                                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$data['id_user']."' data-bs-toggle='modal' data-bs-target='#exampleModalEdit'><i class='fa fa-edit'></i> Edit</button>
                                                <a href='student_delete.php?action=delete&id=" . $data['id_user'] . "' class='btn btn-danger btn-sm delete btn-flat' onclick='return confirm(\"Are you sure you want to delete this student?\")'><i class='fa fa-trash'></i> Delete</a>
                                            </td>
                                        </tr>";
                                }
                            ?>


                                <!-- Repeat the structure for other static rows -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    
</div>
<?php
    include "../includes2/footer.php";
?>
</div>

<script>
 $(document).ready(function() {
    // Handler for edit button click
    $('.edit').click(function() {
        var studentId = $(this).data('id'); // Get the student ID from data attribute
        var fullName = $(this).closest('tr').find('.full-name').text();
        var userName = $(this).closest('tr').find('.username').text();
        var password = $(this).closest('tr').find('.password').text();
        var address = $(this).closest('tr').find('.alamat').text();
        var number = $(this).closest('tr').find('.number').text();
        var email = $(this).closest('tr').find('.email').text();

        $('#studentId').val(studentId); // Set the student ID in the modal
        $('#fullName').val(fullName);
        $('#userName').val(userName);
        $('#password').val(password);
        $('#address').val(address);
        $('#number').val(number);
        $('#email').val(email);
    });
});

</script>

</body>
</html>