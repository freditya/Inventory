        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Data Buku</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Book</button>
                <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                    <thead>
                      <tr class="bg-blue" align="center">
                        <td>No</td>
                        <td>ID</td>
                        <td>Judul Buku</td>
                        <td>Kategori</td>
                        <td>Penulis</td>
                        <td>Penerbit</td>
                        <td>Harga</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody id="showdata">

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                <form id="myForm" action="" method="post" class="form-horizontal">
                  <input type="hidden" name="kd_buku" value="0">
                  <div class="form-group">
                    <label for="judul" class="label-control col-md-4">Judul Buku</label>
                    <div class="col-md-8">
                      <input type="text" name="judul" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="kd_kategori" class="label-control col-md-4">Kategori</label>
                    <div class="col-md-8">
                      <select type="number" name="kd_kategori" class="form-control" required>
                       <option value="0">-PILIH-</option>
                       <?php foreach($data->result() as $row):?>
                        <option value="<?php echo $row->kd_kategori;?>"><?php echo $row->nama_kategori;?></option>
                      <?php endforeach;?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kd_penulis" class="label-control col-md-4">Penulis</label>
                  <div class="col-md-8">
                    <select type="number" name="kd_penulis" class="form-control">
                     <option value="0">-PILIH-</option>
                     <?php foreach($penulis as $row):?>
                      <option value="<?php echo $row->kd_penulis;?>"><?php echo $row->nama_penulis;?></option>
                    <?php endforeach;?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="kd_penerbit" class="label-control col-md-4">Penerbit</label>
                <div class="col-md-8">
                  <select type="number" name="kd_penerbit" class="form-control">
                   <option value="0">-PILIH-</option>
                   <?php foreach($penerbit as $row):?>
                    <option value="<?php echo $row->kd_penerbit;?>"><?php echo $row->nama_penerbit;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="kd_ukuran" class="label-control col-md-4">Ukuran</label>
              <div class="col-md-8">
                <!-- <input type="text" name="ukuran" class="form-control"> -->
                <select type="number" name="kd_ukuran" class="form-control">
                   <option value="0">-PILIH-</option>
                   <?php foreach($ukuran as $row):?>
                    <option value="<?php echo $row->kd_ukuran;?>"><?php echo $row->ukuran;?></option>
                  <?php endforeach;?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="jml_halaman" class="label-control col-md-4">Jumlah Halaman</label>
              <div class="col-md-8">
                <input type="text" name="jml_halaman" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="isbn" class="label-control col-md-4">Nomor ISBN</label>
              <div class="col-md-8">
                <input type="number" name="isbn" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="thn_terbit" class="label-control col-md-4">Tahun</label>
              <div class="col-md-8">
                <input type="number" name="thn_terbit" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="harga" class="label-control col-md-4">Harga</label>
              <div class="col-md-8">
                <input type="number" name="harga" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="stok" class="label-control col-md-4">Stok</label>
              <div class="col-md-8">
                <input type="number" name="stok" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label for="keterangan" class="label-control col-md-4">Keterangan</label>
              <div class="col-md-8">
                <textarea name="keterangan" class="form-control"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label for="status" class="label-control col-md-4">Status</label>
              <div class="col-md-8">
                <!-- <input type="text" name="status" class="form-control"> -->
                <select name="status" class="form-control">
                   <option value="Sudah Terbit">Sudah Terbit</option>
                    <option value="Belum Terbit">Belum Terbit</option>
                </select>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Confirm Delete</h4>
        </div>
        <div class="modal-body">
          Do you want to delete this record?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <!-- modal detail -->
  <div id="modal_detail" class="modal fade modal_detail " tabindex="-1" role="dialog">
    <div class="modal-dialog modal1" role="document">
      <div class="modal-content modal2 ">
        <div class="modal-header">
          <div class="col-md-12 well">
            <h4 class="modal-title modal3">Detail Buku</h4>
          </div>
          <div class="modal-body">

           <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
            <thead>
              <tr>
                <td>ID</td>
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
            </thead>
            <tbody id="showdetail">

            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>




<!-- <div class="container-fluid">
  <div class="row">        
    <div class="col-xs-6 col-md-6 big-box" >
      <h2 data-toggle="modal">FULL MODAL</h2>
      <div class="modal fade" id="detail_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog text-justify">
          <div class="modal-content ">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h3 class="modal-title"><strong>Title Modal </strong>
              </br><small>Published Juni, 2015</small></h3>
            </div>
            <div class="modal-body">  

              <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                <thead>
                  <tr>
                    <td>ID</td>
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
                </thead>
                <tbody id="showdetail">

                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 -->

<!-- Script buku -->
<script>
  $(function(){
    showAllBuku();

        //Add New
        $('#btnAdd').click(function(){
          $('#myModal').modal('show');
          $('#myModal').find('.modal-title').text('Add New Book');
          $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addBuku');
        });


        $('#btnSave').click(function(){
          var url = $('#myForm').attr('action');
          var data = $('#myForm').serialize();
            //validate form
            var judul = $('input[name=judul]');
            var kd_kategori = $('input[name=kd_kategori]');
            var kd_penulis = $('input[name=kd_penulis]');
            var kd_penerbit = $('input[name=kd_penerbit]');
            var kd_ukuran = $('input[name=kd_ukuran]');
            var jml_halaman = $('input[name=jml_halaman]');
            var isbn = $('input[name=isbn]');
            var thn_terbit = $('input[name=thn_terbit]');
            var harga = $('input[name=harga]');
            var stok = $('input[name=stok]');
            var keterangan = $('textarea[name=keterangan]');
            var status = $('input[name=status]');
            var result = '';
            if(judul.val()==''){
              judul.parent().parent().addClass('has-error');
            }else{
              judul.parent().parent().removeClass('has-error');
              result +='1';
            }
            if(kd_kategori.val()==''){
              kd_penulis.parent().parent().addClass('has-error');
            }else{
              kd_penerbit.parent().parent().removeClass('has-error');
              result +='2';
            }
            if(kd_penulis.val()==''){
              kd_penulis.parent().parent().addClass('has-error');
            }else{
              kd_penulis.parent().parent().removeClass('has-error');
              result +='3';
            }
            if(kd_penerbit.val()==''){
              kd_penerbit.parent().parent().addClass('has-error');
            }else{
              kd_penerbit.parent().parent().removeClass('has-error');
              result +='4';
            }
            if(kd_ukuran.val()==''){
              kd_ukuran.parent().parent().addClass('has-error');
            }else{
              kd_ukuran.parent().parent().removeClass('has-error');
              result +='5';
            }
            if(jml_halaman.val()==''){
              jml_halaman.parent().parent().addClass('has-error');
            }else{
              jml_halaman.parent().parent().removeClass('has-error');
              result +='6';
            }
            if(isbn.val()==''){
              isbn.parent().parent().addClass('has-error');
            }else{
              isbn.parent().parent().removeClass('has-error');
              result +='7';
            }
            if(thn_terbit.val()==''){
              thn_terbit.parent().parent().addClass('has-error');
            }else{
              thn_terbit.parent().parent().removeClass('has-error');
              result +='8';
            }
            if(harga.val()==''){
              harga.parent().parent().addClass('has-error');
            }else{
              harga.parent().parent().removeClass('has-error');
              result +='9';
            }
            if(stok.val()==''){
              stok.parent().parent().addClass('has-error');
            }else{
              stok.parent().parent().removeClass('has-error');
              result +='10';
            }
            if(keterangan.val()==''){
              keterangan.parent().parent().addClass('has-error');
            }else{
              keterangan.parent().parent().removeClass('has-error');
              result +='11';
            }
            if(status.val()==''){
              status.parent().parent().addClass('has-error');
            }else{
              status.parent().parent().removeClass('has-error');
              result +='12';
            }


            if(result=='123456789101112'){
              $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response){
                  if(response.success){
                    $('#myModal').modal('hide');
                    $('#myForm')[0].reset();
                    if(response.type=='add'){
                      var type = 'added'
                    }else if(response.type=='update'){
                      var type ="updated"
                    }
                    $('.alert-success').html('Data Buku '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                    showAllBuku();
                  }else{
                    alert('Error');
                  }
                },
                error: function(){
                  alert('Could not add data');
                }
              });
            }
          });

        //edit
        $('#showdata').on('click', '.item-edit', function(){
          var kd_buku = $(this).attr('data');
          $('#myModal').modal('show');
          $('#myModal').find('.modal-title').text('Edit Buku');
          $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updateBuku');
          $.ajax({
            type: 'ajax',
            method: 'get',
            url: '<?php echo base_url() ?>index.php/home/editBuku',
            data: {kd_buku: kd_buku},
            async: false,
            dataType: 'json',
            success: function(data){
              $('input[name=judul]').val(data.judul);
              $('input[name=kd_kategori]').val(data.kd_kategori);
              $('input[name=kd_penulis]').val(data.kd_penulis);
              $('input[name=kd_penerbit]').val(data.kd_penerbit);
              $('input[name=kd_ukuran]').val(data.ukuran);
              $('input[name=jml_halaman]').val(data.jml_halaman);
              $('input[name=isbn]').val(data.isbn);
              $('input[name=thn_terbit]').val(data.thn_terbit);
              $('input[name=harga]').val(data.harga);
              $('input[name=stok]').val(data.stok);
              $('textarea[name=keterangan]').val(data.keterangan);
              $('input[name=status]').val(data.status);
              $('input[name=kd_buku]').val(data.kd_buku);
            },
            error: function(){
              alert('Could not Edit Data');
            }
          });
        });


         //delete- 
         $('#showdata').on('click', '.item-delete', function(){
          var kd_buku = $(this).attr('data');
          $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
              $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>index.php/home/deleteBuku',
                data:{kd_buku:kd_buku},
                dataType: 'json',
                success: function(response){
                  if(response.success){
                    $('#deleteModal').modal('hide');
                    $('.alert-success').html('Data Buku Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                    showAllBuku();
                  }else{
                    alert('Error');
                  }
                },
                error: function(){
                  alert('Error deleting');
                }
              });
            });
          });




         //detail
         $('#showdata').on('click', '.item-detail', function(){
          var kd_buku = $(this).attr('kd_buku');
          $('#modal_detail').modal('show');
          // $('#modal_detail').find('.modal-title').text('Detai Buku.');
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/home/get_detail',
            async: false,
            dataType: 'json',
            success: function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                html +='<tr>'+
                '<td>'+data[i].kd_buku+'</td>'+
                '<td>'+data[i].judul+'</td>'+
                '<td>'+data[i].nama_kategori+'</td>'+
                '<td>'+data[i].nama_penulis+'</td>'+
                '<td>'+data[i].nama_penerbit+'</td>'+
                '<td>'+data[i].ukuran+'</td>'+
                '<td>'+data[i].jml_halaman+'</td>'+
                '<td>'+data[i].isbn+'</td>'+
                '<td>'+data[i].thn_terbit+'</td>'+
                '<td>'+data[i].harga+'</td>'+
                '<td>'+data[i].stok+'</td>'+
                '<td>'+data[i].keterangan+'</td>'+
                '<td>'+data[i].status+'</td>'+
                '</tr>';
              }
              $('#showdetail').html(html);
            },
            error: function(){
             alert('Could not get Data from Database');
           }
         });
        });

        //function
        function showAllBuku(){
          $.ajax({
            type: 'ajax',
            url: '<?php echo base_url() ?>index.php/home/showAllBuku',
            async: false,
            dataType: 'json',
            success: function(data){
              var html = '';
              var i;
              var a=0;
              for(i=0; i<data.length; i++){
                a++;
                html +='<tr>'+
                '<td>'+a+'</td>'+
                '<td>'+data[i].kd_buku+'</td>'+
                '<td>'+data[i].judul+'</td>'+
                '<td>'+data[i].nama_kategori+'</td>'+
                '<td>'+data[i].nama_penulis+'</td>'+
                '<td>'+data[i].nama_penerbit+'</td>'+
                                    // '<td>'+data[i].ukuran+'</td>'+
                                    // '<td>'+data[i].jml_halaman+'</td>'+
                                    // '<td>'+data[i].isbn+'</td>'+
                                    // '<td>'+data[i].thn_terbit+'</td>'+
                                    '<td>'+data[i].harga+'</td>'+
                                    // '<td>'+data[i].stok+'</td>'+
                                    // '<td>'+data[i].keterangan+'</td>'+
                                    // '<td>'+data[i].status+'</td>'+
                                    '<td align="center">'+
                                    '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].kd_buku+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                    '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].kd_buku+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
                                    '<a href="javascript:;" class="btn btn-info item-detail" data="'+data[i].kd_buku+'"><i class="glyphicon glyphicon-info-sign"></i> Detail</a>'+
                                    '</td>'+
                                    '</tr>';
                                  }
                                  $('#showdata').html(html);
                                },
                                error: function(){
                                  alert('Could not get Data from Database');
                                }
                              });
        }
      });
    </script>
    <script type="text/javascript">
  $(document).ready(function(){
    $('#table_id').DataTable();
  });
</script>


