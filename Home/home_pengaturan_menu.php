<div class="container" style="margin-top:100px;margin-bottom:100px">
    <?php

        // pengaturan menu
        $page = isset($_GET['page']) ? $_GET['page'] : "";
        $action = isset($_GET['action']) ? $_GET['action'] : "";

        if ($page==""){
            include "welcome.php";
        }elseif ($page=="mahasiswa"){
            if ($action==""){
                include "tampil_mahasiswa.php";
            }elseif($action=="tambah"){
                include "tambah_mahasiswa.php";
            }elseif($action=="update"){
                include "update_mahasiswa.php";
            }else{
                include "hapus_mahasiswa.php";
            }
        }elseif ($page=="pendaftaran"){
            if ($action==""){
                include "tampil_pendaftaran.php";
            }elseif($action=="tambah"){
                include "tambah_pendaftaran.php";
            }elseif($action=="update"){
                include "update_pendaftaran.php";
            }else{
                include "hapus_pendaftaran.php";
            }
        }elseif ($page=="perangkingan"){
            if ($action==""){
                include "perangkingan.php";
            }
        
        }else{
          
        }
    ?>
</div>