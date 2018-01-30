        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Laporan Data Penjualan</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <!-- <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Exsport Excel</button> -->
                <a href="<?php echo base_url("index.php/lap_penjualan/export"); ?>" class="btn btn-success fa fa-file-excel-o item-edit"> Export Excel</a>
                <a href="<?php echo base_url().'index.php/lapbuku_pdf/cetak_penjualan';?>" class="btn btn-danger fa fa-file-pdf-o item-edit"> Export PDF</a>
                <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                    <thead>
                      <tr>
                        <tr align="center" class="bg-info">
                          <td>Kode Penjualan</td>
                          <td>Distributor</td>
                          <td>Tanggal</td>
                          <td>Judul Buku</td>
                          <td>Harga</td>
                          <td>Jumlah Jual</td>
                          <td>Total Harga</td>
                        </tr>
                      </tr>
                    </thead>
                    <tbody id="showdata">
                      <?php
                    if( ! empty($penjualan)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
                      foreach($penjualan as $data){ // Lakukan looping pada variabel siswa dari controller
                        echo "<tr>";
                        echo "<td align='center'>".$data->kd_penjualan."</td>";
                        echo "<td>".$data->distributor."</td>";
                        echo "<td>".$data->tgl_jual."</td>";
                        echo "<td>".$data->judul."</td>";
                        echo "<td>".$data->harga."</td>";
                        echo "<td>".$data->jml_jual."</td>";
                        echo "<td>".$data->total_harga."</td>";
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