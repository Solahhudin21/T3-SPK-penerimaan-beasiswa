<!-- proses perangkingan -->
<?php
if (isset($_POST['proses'])) {
    // mengambil data tahun dari input
    $tahun = $_POST['tahun'];

    // mengambil data dari tabel
    $sql = "SELECT * FROM pendaftaran WHERE tahun='$tahun'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // mencari nilai max dan min
        $sql = "SELECT min(pendapatan_ortu) as mpendapatan, max(ipk) as mipk, max(jml_saudara) as msaudara FROM pendaftaran WHERE tahun='$tahun'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // mengambil nilai max dan min
        $mpendapatan = $row["mpendapatan"];
        $mipk = $row["mipk"];
        $msaudara = $row["msaudara"];

        // proses normalisasi
        $sql = "SELECT * FROM pendaftaran WHERE tahun='$tahun'";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            // mengambil data pendaftaran
            $iddaftar = $row["iddaftar"];
            $pendapatan = $row["pendapatan_ortu"];
            $ipk = $row["ipk"];
            $saudara = $row["jml_saudara"];

            // menghapus data perangkingan yang lama
            $sql = "DELETE FROM perangkingan WHERE iddaftar='$iddaftar'";
            $conn->query($sql);

            // hitung normalisasi
            $npendapatan = $mpendapatan / $pendapatan;
            $nipk = $ipk / $mipk;
            $nsaudara = $saudara / $msaudara;

            // hitung nilai preferensi
            $preferensi = ($npendapatan * 0.4) + ($nipk * 0.35) + ($nsaudara * 0.25);

            // simpan data perangkingan
            $sql = "INSERT INTO perangkingan VALUES (NULL, '$iddaftar', $npendapatan, $nipk, $nsaudara, $preferensi)";
            if ($conn->query($sql) === TRUE) {
                header("Location:?page=perangkingan&thn=$tahun");
            }
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Data tidak Ditemukan</strong>
        </div>
        <?php
    }
}
?>
<div class="card">
<div class="card-header bg-primary text-white border-dark"><strong>Perangkingan</strong></div>
<div class="card-body">

    <!-- form memilih tahun dan proses -->
    <form action="" method="POST">
    <div class="form-group">
            <label for="">Tahun</label>
            <select class="form-control chosen" data-placeholder="Pilih Tahun" name="tahun">
            <option value="<?php echo $_GET['thn']; ?>"><?php echo $_GET['thn']; ?></option>
            <?php
                for($x=date("Y");$x>=2015;$x--){
            ?>
                    <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
            <?php
                }
            ?>
        </select>
        </div>

        <input class="btn btn-primary mb-2" type="submit" name="proses" value="proses">

    </form>

    <table class="table table-bordered" id="myTable">
     <thead>
         <tr>
            <th width="100px">No.</th>
            <th width="100px">NIM</th>
            <th width="200px">Nama Mahasiswa</th>
            <th width="300px">n_Pendapatan</th>
            <th width="100px">n_IPK</th>
            <th width="100px">n_Saudara</th>
            <th width="100px">n_Preferensi</th>
        </tr>
</thead>
 <tbody>
                
