        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Laporan Data Buku</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <!-- <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Exsport Excel</button> -->
                <a href="<?php echo base_url("index.php/lap_buku/export"); ?>" class="btn btn-success fa fa-file-excel-o item-edit"> Export Excel</a>
                <a href="<?php echo base_url().'index.php/lapbuku_pdf/cetak_produk';?>" class="btn btn-danger fa fa-file-pdf-o item-edit"> Export PDF</a>
                <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                    <thead>
                      <tr>
                        <tr align="center" class="bg-info">
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
                      </tr>
                    </thead>
                    <tbody id="showdata">
                      <?php
                    if( ! empty($buku)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                      foreach($buku as $data){ // Lakukan looping pada variabel siswa dari controller
                        echo "<tr>";
                        echo "<td align='center'>".$data->kd_buku."</td>";
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
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#table_id').DataTable();
  });
</script>