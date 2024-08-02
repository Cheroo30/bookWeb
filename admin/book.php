<?php
    include "includes/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>
<style>
    td .synopsis1 {
    background-color: #2b2c40;
    color: gray;
    transition: all 0.3s ease;
}
</style>
<body>
    <?php
        include "includes/test2.php";
    ?>
<div class="main-content">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Book List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Books</li>
            <li class="active">Book List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Static error and success messages (if needed) -->
        <!-- Replace these messages with your desired content -->
        <?php
        if (isset($_SESSION['errorbk'])) {
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
                                <p>" . $_SESSION['errorbk'] . "</p>
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
            unset($_SESSION['errorbk']);
        }
        if (isset($_SESSION['successbk'])) {
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
            unset($_SESSION['successbk']);
        }
        if (isset($_SESSION['editbk'])) {
            echo "
            <div id='successModal' class='modal fade' role='dialog'>
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
                    $('#successModal').modal('show');
                });
            </script>
            ";
            unset($_SESSION['editbk']);
        }
      ?>

        <div class="color">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                    <a href="#" id="openAddModal" class="btn btn-primary btn-sm btn-flat" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa fa-plus"></i> New
                      </a>
                      <form class="form-inline mb-3" method="GET">
    <div class="form-group mr-2">
        <label for="filter_criteria" class="mr-2">Filter:</label>
        <input type="text" class="form-control" name="filter_criteria" id="filter_criteria" placeholder="Enter Genre, Nama Buku, ISBN, Halaman, Author, Penerbit, or Tahun Terbit">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Registration Form</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="registrationForm" action="book_add.php" method="POST" class="form-inline" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" name="kode_isbn" required>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Title</label>
                                    <textarea class="form-control" id="text" name="nama_buku" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="halaman" class="form-label">Number of Pages</label>
                                    <input type="number" class="form-control" name="halaman" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Publish Date</label>
                                    <input type="date" class="form-control" name="tahun_terbit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_bk" class="form-label">Book Image</label>
                                    <input type="file" class="form-control" name="gambar_bk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="synopsis" class="form-label">Synopsis</label>
                                    <textarea class="form-control" id="synopsis" name="synopsis" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <select class="form-select" name="id_genre" required>
                                        <?php
                                            include "includes/conn.php";
                                            
                                            $query = mysqli_query($koneksi, "SELECT * FROM genre");
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_genre'] . "'>" . $row['nama_genre'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Author</label>
                                    <select class="form-select" name="id_penulis" required>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM penulis");
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_penulis'] . "'>" . $row['nama_penulis'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Publisher</label>
                                    <select class="form-select" name="id_penerbit" required>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM penerbit");  
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_penerbit'] . "'>" . $row['nama_penerbit'] . "</option>";
                                            }
                                        ?>
                                    </select>
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
                     <!-- Modal add satuan-->
<div class="modal fade" id="exampleModalAddSatuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Book Satuan Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="registrationForm" action="satuan_add.php" method="POST" class="form-inline">
                    <div class="mb-3" hidden>
                        <label for="bookId" class="form-label">Book ID</label>
                        <input type="text" class="form-control" id="bookIdSatuan" name="book_id" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="bukuSatuan" class="form-label">Masukan Jumlah Buku</label>
                        <input type="number" class="form-control" name="jml_buku" required>
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

                        <!-- Modal Edit-->
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 600px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Update Form</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form id="editForm" action="book_edit.php" method="POST" class="form-inline" enctype="multipart/form-data">
                                    <div class="mb-3" hidden>
                                        <label for="bookId" class="form-label">book ID</label>
                                        <input type="text" class="form-control" id="bookId" name="book_id" readonly>
                                    </div>
                                <div class="mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="kode_isbn" required>
                                </div>
                                <div class="mb-3">
                                    <label for="text" class="form-label">Title</label>
                                    <textarea class="form-control" id="nama_buku" name="nama_buku" rows="2" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="halaman" class="form-label">Number of Pages</label>
                                    <input type="number" id="halaman" class="form-control" name="halaman" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tahun_terbit" class="form-label">Publish Date</label>
                                    <input type="date" id="tahun_terbit" class="form-control" name="tahun_terbit" required>
                                </div>

                                <div class="mb-3">
                                    <label for="gambar_bk" class="form-label">Book Image</label>
                                    <input type="file" id="gambar_bk1" class="form-control" name="gambar_bk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="synopsis" class="form-label">Synopsis</label>
                                    <textarea class="form-control" id="synopsis1" name="synopsis" rows="4" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Genre</label>
                                    <select class="form-select" id="id_genre" name="id_genre" required>
                                        <?php
                                            include "includes/conn.php";
                                            
                                            $query = mysqli_query($koneksi, "SELECT * FROM genre");
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_genre'] . "'>" . $row['nama_genre'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Author</label>
                                    <select class="form-select" id="id_penulis" name="id_penulis" required>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM penulis");
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_penulis'] . "'>" . $row['nama_penulis'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="genre" class="form-label">Publisher</label>
                                    <select class="form-select" id="id_penerbit" name="id_penerbit" required>
                                        <?php
                                            $query = mysqli_query($koneksi, "SELECT * FROM penerbit");  
                                            
                                            while ($row = mysqli_fetch_assoc($query)) {
                                                echo "<option value='" . $row['id_penerbit'] . "'>" . $row['nama_penerbit'] . "</option>";
                                            }
                                        ?>
                                    </select>
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
         <div class="filter"></div>
                        <div class="table-responsive text-nowrap">
                            <table>
                                <thead class="">
                                    <tr>
                                        <th>No</th>
                                        <th>Genre</th>
                                        <th>ISBN</th>
                                        <th>Title</th>
                                        <th>Halaman</th>
                                        <th>Tahun Terbit</th>
                                        <th>Sinopsis</th>
                                        <th>Gambar</th>
                                        <th>Author</th>
                                        <th>Publisher</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                <?php
include "includes/conn.php";

// Pagination Configuration
$records_per_page = 3;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $records_per_page;

$no = $offset + 1;
// Process filter
$filter_criteria = isset($_GET['filter_criteria']) ? $_GET['filter_criteria'] : '';

$filter_conditions = array();

if ($filter_criteria) {
    $filter_conditions[] = "(genre.nama_genre LIKE '%$filter_criteria%'
                            OR buku.nama_buku LIKE '%$filter_criteria%'
                            OR buku.kode_isbn LIKE '%$filter_criteria%'
                            OR buku.halaman = '$filter_criteria'
                            OR penulis.nama_penulis LIKE '%$filter_criteria%'
                            OR penerbit.nama_penerbit LIKE '%$filter_criteria%'
                            OR buku.tahun_terbit = '$filter_criteria')";
}

$filter_condition = '';

if (!empty($filter_conditions)) {
    $filter_condition = "WHERE " . implode(' OR ', $filter_conditions);
}

// Modify the SQL query
$sql = mysqli_query($koneksi, "SELECT buku.*, genre.nama_genre, penerbit.nama_penerbit, penulis.nama_penulis
                                FROM buku
                                INNER JOIN genre ON buku.id_genre = genre.id_genre
                                INNER JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit
                                INNER JOIN penulis ON buku.id_penulis = penulis.id_penulis
                                $filter_condition
                                LIMIT $offset, $records_per_page");



$total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM buku");
$total_records = mysqli_fetch_array($total_records_query)[0];

if ($total_records > 0) {
    while ($data = mysqli_fetch_assoc($sql)) {
        echo "<tr>
                <td scope='row'>" . $no++ . "</td>
                <td class='genre-id'>" . $data['nama_genre'] . "</td>
                <td class='isbn'>" . $data['kode_isbn'] . "</td>
                <td class='book-name'>" . $data['nama_buku'] . "</td>
                <td class='pages'>" . $data['halaman'] . "</td>
                <td class='publish-date'>" . $data['tahun_terbit'] . "</td>
                <td class='synopsis1'><textarea style='width: 300px; min-height: 10em; max-height: 10em; overflow-y: auto;' readonly oninput='autoExpand(this)'>" . $data['synopsis'] . "</textarea></td>
                <td class='gambar-bk1'><img src='" . $data['gambar_bk'] . "' alt='Book Image' style='max-width: 100px; max-height: 100px;'></td>
                <td class='author-id'>" . $data['nama_penulis'] . "</td>
                <td class='publisher-id'>" . $data['nama_penerbit'] . "</td>
                <td>
                    <button class='btn btn-success btn-sm edit btn-flat' data-id='" . $data['id_buku'] . "' data-bs-toggle='modal' data-bs-target='#exampleModalEdit'><i class='fa fa-edit'></i> Edit</button>
                    <button class='btn btn-warning btn-sm edit btn-flat' data-id='" . $data['id_buku'] . "' data-bs-toggle='modal' data-bs-target='#exampleModalAddSatuan'><i class='fa fa-edit'></i>Add Buku</button>
                    <button class='btn btn-warning btn-sm edit btn-flat' data-id='" . $data['id_buku'] . "' data-bs-toggle='modal' data-bs-target='' onclick='redirectToSatuan(" . $data['id_buku'] . ")'><i class='fa fa-edit'></i> Show Satuan</button>
                    <a href='book_delete.php?action=delete&id=" . $data['id_buku'] . "' class='btn btn-danger btn-sm delete btn-flat' onclick='return confirm(\"Are you sure you want to delete this book?\")'><i class='fa fa-trash'></i> Delete</a>
                </td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='11'>No books found.</td></tr>";
}

echo "</tbody>
    </table>
</div>";

// Pagination
if ($total_records > $records_per_page) {
    echo "<nav aria-label='Page navigation'>
            <ul class='pagination justify-content-center mt-3'>";

    $total_pages = ceil($total_records / $records_per_page);
    $prev = $page - 1;
    $next = $page + 1;

    $filter_params = "";
    if ($filter_criteria) {
        $filter_params .= "&filter_criteria=$filter_criteria";
    }

    if ($prev > 0) {
        echo "<li class='page-item'><a class='page-link' href='?page=$prev$filter_params'>Prev</a></li>";
    }
    if ($page > 2) {
        echo "<li class='page-item'><a class='page-link' href='?page=1$filter_params'>1</a></li>";
    }

    $start_page = max(1, $page - 1);
    $end_page = min($total_pages, $start_page + 2);

    for ($i = $start_page; $i <= $end_page; $i++) {
        $active_class = ($i == $page) ? "active" : "";
        echo "<li class='page-item $active_class'><a class='page-link' href='?page=$i$filter_params'>$i</a></li>";
    }

    if ($end_page < $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=$total_pages$filter_params'>$total_pages</a></li>";
    }

    if ($next <= $total_pages) {
        echo "<li class='page-item'><a class='page-link' href='?page=$next$filter_params'>Next</a></li>";
    }

    echo "</ul></nav>";
}

?>


                </div>
            </div>
        </div>
        </div>
    </section>
    <?php
    include "../includes2/footer.php";
?>
</div>
</div>


<script>
$(document).ready(function() {
    // Handler for edit button click
    $('.edit').click(function() {
        var bookId = $(this).data('id'); // Get the book ID from data attribute
        $('#bookId').val(bookId); // Set the book ID in the "Edit" modal
        $('#bookIdSatuan').val(bookId); // Set the book ID in the "Add" modal

        var isbn = $(this).closest('tr').find('.isbn').text();
        var title = $(this).closest('tr').find('.title').text();
        var pages = $(this).closest('tr').find('.pages').text();
        var bookName = $(this).closest('tr').find('.book-name').text();
        var publishDate = $(this).closest('tr').find('.publish-date').text();
        var synopsis1 = $(this).closest('tr').find('.synopsis1').text();
        var gambar_bk1 = $(this).closest('tr').find('.gambar-bk1 img').attr('src'); 
        var genreId = $(this).closest('tr').find('.genre-id').val();
        var authorId = $(this).closest('tr').find('.author-id').val();
        var publisherId = $(this).closest('tr').find('.publisher-id').val();

        $('#isbn').val(isbn);
        $('#text').val(title);
        $('#halaman').val(pages);
        $('#nama_buku').val(bookName);
        $('#tahun_terbit').val(publishDate);
        $('#synopsis1').val(synopsis1);
        $('#gambar_bk1').val(gambar_bk1);
        $('#id_genre').val(genreId);
        $('#id_penulis').val(authorId);
        $('#id_penerbit').val(publisherId);
    });
});

function redirectToSatuan(id_buku) {
        window.location.href = 'satuan.php?id_buku=' + id_buku;
    }


</script>

</body>
</html>