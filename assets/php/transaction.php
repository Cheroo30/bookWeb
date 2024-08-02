
<div class="main-content">
    <div class="box-body">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaction ID</th>
                    <th>Nama</th>
                    <th>Transaction Date</th>
                    <th>Return Date</th>
                    <th>Returned Date</th>
                    <th>Status</th>
                    <th>Book Name</th>
                    <!-- <th>Tools</th> -->
                </tr>
            </thead>
            <tbody>
               <?php
include "../../admin/includes/conn.php";

$sql = mysqli_query($koneksi, "SELECT d.*, p.tgl_peminjaman, p.tgl_pengembalian, p.tgl_dikembalikan, u.nama_lengkap
                                FROM detail_peminjaman d
                                INNER JOIN peminjaman p ON d.id_peminjaman = p.id_peminjaman
                                INNER JOIN user u ON p.id_user = u.id_user");

$no = 1; // Initialize $no here

if (mysqli_num_rows($sql) > 0) {
    while ($data = mysqli_fetch_assoc($sql)) {
        echo "<tr>
                <td scope='row'>" . $no++ . "</td>
                <td>" . $data['id_peminjaman'] . "</td>
                <td>" . $data['nama_lengkap'] . "</td>
                <td>" . $data['tgl_peminjaman'] . "</td>
                <td>" . $data['tgl_pengembalian'] . "</td>
                <td>" . $data['tgl_dikembalikan'] . "</td>
                <td>" . $data['status_peminjaman'] . "</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No transactions found.</td></tr>";
}


?>

            </tbody>
        </table>
    </div>
</div>

