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