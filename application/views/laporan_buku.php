<h1>Data Siswa</h1><hr>
<a href="<?php echo base_url("index.php/lap_buku/export"); ?>">Export ke Excel</a><br><br>

<table border="1" cellpadding="8">
  <tr>
    <td>Kode Buku</td>
    <td>Judul Buku</td>
    <td>Kategori</td>
    <td>Penulis</td>
    <td>Penerbit</td>
    <td>ukuran</td>
    <td>Jumlah Halaman</td>
    <td>ISBN</td>
    <td>Tahun Terbit</td>
    <td>Harga</td>
    <td>Stok</td>
    <td>Keterangan</td>
    <td>Status</td>
  </tr>

  <?php
if( ! empty($buku)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
  foreach($buku as $data){ // Lakukan looping pada variabel siswa dari controller
    echo "<tr>";
    echo "<td>".$data->kd_buku."</td>";
    echo "<td>".$data->judul."</td>";
    echo "<td>".$data->nama_kategori."</td>";
    echo "<td>".$data->nama_penulis."</td>";
    echo "<td>".$data->nama_penerbit."</td>";
    echo "<td>".$data->ukuran."</td>";
    echo "<td>".$data->jml_halaman."</td>";
    echo "<td>".$data->isbn."</td>";
    echo "<td>".$data->thn_terbit."</td>";
    echo "<td>".$data->harga."</td>";
    echo "<td>".$data->stok."</td>";
    echo "<td>".$data->keterangan."</td>";
    echo "<td>".$data->status."</td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
}
?>
</table>