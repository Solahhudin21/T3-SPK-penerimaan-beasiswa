<div class="card">
  <div class="card-header bg-primary text-white border-dark"><strong>DATA MAHASISWA</strong></div>
  <div class="card-body">
<a class="btn btn-primary mb-2" href="?page=mahasiswa&action=tambah">Tambah</a>
<table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th width="100px">NIM</th>
        <th width="200px">Nama Mahasiswa</th>
        <th width="300px">Alamat</th>
        <th width="100px">No. Telfon</th>
        <th width="80px"> </th>
      </tr>
    </thead>
    <tbody>
	
    <?php
     $sql = "SELECT*FROM mahasiswa ORDER BY nim ASC";
     $result = $conn->query($sql);
     while($row = $result->fetch_assoc()) {
    ?>
     <tr>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['nama_mahasiswa']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
        <td><?php echo $row['telp']; ?></td>
        <td>
          <a class="btn btn-warning" href="?page=mahasiswa&action=ubah&nim=<?php echo $row['nim']; ?>"> 
            <span class="fas fa-edit"></span>
        </a>
            <a onclick="return confirm('Yakin menghapus data ini ?')" class="btn btn-danger" href="?page=mahasiswa&action=hapus&nim=<?php echo $row['nim']; ?>">
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