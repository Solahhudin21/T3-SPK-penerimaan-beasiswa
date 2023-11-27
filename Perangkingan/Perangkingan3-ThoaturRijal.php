<tbody>
    
<?php
        $i=1;
            $sql = "SELECT perangkingan.idperangkingan,pendaftaran.iddaftar,pendaftaran.tgldaftar,pendaftaran.nim,
                            mahasiswa.nama_mahasiswa,perangkingan.n_pendapatan,perangkingan.n_ipk,
                            perangkingan.n_saudara,perangkingan.preferensi
            FROM perangkingan INNER JOIN pendaftaran ON perangkingan.iddaftar=pendaftaran.iddaftar 
            INNER JOIN mahasiswa ON pendaftaran.nim=mahasiswa.nim ORDER BY preferensi DESC";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama_mahasiswa']; ?></td>
            <td><?php echo $row['n_pendapatan']; ?></td>
            <td><?php echo $row['n_ipk']; ?></td>
            <td><?php echo $row['n_saudara']; ?></td>
            <td><?php echo $row['preferensi']; ?></td>

        </tr>
        <?php
            }
            $conn->close();
        ?>


    </tbody>
    </table>
    </div>
    </div>   