<?php
    include "includes/test2.php";
?>
<div class="main-content">
<div class="container mt-3">
<div class="container mt-3">
    <form class="form-inline mb-3" method="GET">
        <div class="form-group mr-2">
            <label for="filter_date" class="mr-2">Filter by Date:</label>
            <input type="date" class="form-control" name="filter_date" id="filter_date">
        </div>
        <div class="form-group mr-2">
            <label for="filter_status" class="mr-2">Filter by Status:</label>
            <select class="form-control" name="filter_status" id="filter_status">
                <option value="">All</option>
                <option value="borrowed">Borrowed</option>
                <option value="returned">Returned</option>
            </select>
        </div>
            <div class="form-group mr-2">
                <label for="search_query" class="mr-2">Search:</label>
                <input type="text" class="form-control" name="search_query" id="search_query" placeholder="Search by book name or nama">
            </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <!-- Table display code goes here -->
</div>


    <!-- Table display code goes here -->
</div>

<div class="box-body">
    <div class="table-responsive text-nowrap">
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
            include "includes/conn.php";

            // Pagination Configuration
            $records_per_page = 5;
            $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
            $offset = ($page - 1) * $records_per_page;

            $no = $offset + 1;
// Process filter
$filter_date = isset($_GET['filter_date']) ? $_GET['filter_date'] : '';
$filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';
$search_query = isset($_GET['search_query']) ? $_GET['search_query'] : '';

$filter_conditions = array();

if ($filter_date) {
    $filter_conditions[] = "(DATE(p.tgl_peminjaman) = '$filter_date' OR DATE(p.tgl_dikembalikan) = '$filter_date')";
}

if ($filter_status) {
    if ($filter_status == 'borrowed') {
        $filter_conditions[] = "d.status_peminjaman = 'dipinjam'";
    } elseif ($filter_status == 'returned') {
        $filter_conditions[] = "d.status_peminjaman = 'dikembalikan'";
    }
}

if ($search_query) {
    $filter_conditions[] = "(b.nama_buku LIKE '%$search_query%' OR u.nama_lengkap LIKE '%$search_query%')";
}

$filter_condition = '';

if (!empty($filter_conditions)) {
    $filter_condition = "WHERE " . implode(' AND ', $filter_conditions);
}

// Modify the SQL query
$sql = mysqli_query($koneksi, "SELECT d.*, p.tgl_peminjaman, p.tgl_pengembalian, p.tgl_dikembalikan, u.nama_lengkap, bs.id_buku_satuan, b.nama_buku
                                FROM detail_peminjaman d
                                INNER JOIN peminjaman p ON d.id_peminjaman = p.id_peminjaman
                                INNER JOIN user u ON p.id_user = u.id_user
                                INNER JOIN buku_satuan bs ON d.id_buku_satuan = bs.id_buku_satuan
                                INNER JOIN buku b ON bs.id_buku = b.id_buku
                                $filter_condition
                                LIMIT $offset, $records_per_page");


$total_records_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM detail_peminjaman");
$total_records = mysqli_fetch_array($total_records_query)[0];

if ($total_records > 0) {
    while ($data = mysqli_fetch_assoc($sql)) {
        echo "<tr>
                <td scope='row'>" . $no++ . "</td>
                <td>" . $data['id_peminjaman'] . "</td>
                <td>" . $data['nama_lengkap'] . "</td>
                <td>" . $data['tgl_peminjaman'] . "</td>
                <td>" . $data['tgl_pengembalian'] . "</td>
                <td>" . $data['tgl_dikembalikan'] . "</td>
                <td>" . $data['status_peminjaman'] . "</td>
                <td>" . $data['nama_buku'] . "</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No transactions found.</td></tr>";
}


            echo "</tbody>
    </table>
</div>
</div>";

// Pagination
if ($total_records > $records_per_page) {
    echo "<nav aria-label='Page navigation'>
            <ul class='pagination justify-content-center mt-3'>";

    $total_pages = ceil($total_records / $records_per_page);
    $prev = $page - 1;
    $next = $page + 1;

    $filter_params = "";
    if ($filter_date) {
        $filter_params .= "&filter_date=$filter_date";
    }
    if ($filter_status) {
        $filter_params .= "&filter_status=$filter_status";
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
<?php
    include "../includes2/footer.php";
?>
</div>
