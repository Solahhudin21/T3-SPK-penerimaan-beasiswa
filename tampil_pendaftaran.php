<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA PENDAFTARAN</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=pendaftaran&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="80px">No</th>
        <th width="200px">Tanggal</th>
        <th width="80px">Tahun</th>
        <th width="100px">NIM</th>
        <th width="80px">Nama</th>
        <th width="100px">Pendapatan Ortu</th>
        <th width="300px">IPK</th>
        <th width="100px">Jml Saudara</th>
        <th width="200px"> </th>
      </tr>
    </thead>
    <tbody>
	
    <?php
    $i=1;
     $sql = "SELECT pendaftaran.iddaftar,pendaftaran.tgldaftar,pendaftaran.tahun,pendaftaran.nim,mahasiswa.nama_mahasiswa,pendaftaran.pendapatan_ortu,pendaftaran.ipk,pendaftaran.jml_saudara
      FROM mahasiswa INNER JOIN pendaftaran ON mahasiswa.nim=pendaftaran.nim ORDER BY iddaftar DESC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row['tgldaftar']; ?></td>
        <td><?php echo $row['tahun']; ?></td>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['nama_mahasiswa']; ?></td>
        <td><?php echo $row['pendapatan_ortu']; ?></td>
        <td><?php echo $row['ipk']; ?></td>
        <td><?php echo $row['jml_saudara']; ?></td>
        <td>
          <a class="btn btn-warning" href="?page=pendaftaran&action=ubah&id=<?php echo $row['iddaftar']; ?>"> 
            <span class="fas fa-edit"></span>
        </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=pendaftaran&action=hapus&id=<?php echo $row['iddaftar']; ?>">
        <span class=" 	fas fa-eraser"></span>
        </a>
        </td>
     </tr>
    <?php
     }
     $conn->close();
    ?>


   </tbody>
</table>