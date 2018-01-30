 <?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>
 
 <table border="1" width="100%">
 
      <thead>
 
           <tr>
 
                <th>Kode</th>
 
                <th>Tanggal</th>
 
                <th>Buku</th>

                <th>Jumlah</th>
 
                <th>Keterangan</th>
 
           </tr>
 
      </thead>
 
      <tbody>
 
           <?php $i=1; foreach($buku as $buku) { ?>
 
           <tr>
 
                <td><?php echo $buku->kd_retur; ?></td>
                <td><?php echo $buku->tgl_retur; ?></td>
                <td><?php echo $buku->judul; ?></td>
                <td><?php echo $buku->jml_retur; ?></td>
                <td><?php echo $buku->keterangan; ?></td>
 
           </tr>
 
           <?php $i++; } ?>
 
      </tbody>
 
 </table>
