<?php
    include "includes/conn.php";
    $book_id = $_POST['book_id'];
    $jml_buku = $_POST['jml_buku'];

    for($i=1; $i<=$jml_buku; $i++){
        $sql = mysqli_query($koneksi, "INSERT INTO buku_satuan VALUES(NULL, 'Baik', '".$book_id."')");
    }
    header("location: satuan.php?id_buku=".$book_id);
?>
