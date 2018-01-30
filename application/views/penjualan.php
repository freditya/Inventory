        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Penjualan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="alert alert-success" style="display: none; color: green;">   
                    </div>
                  </div>
                  <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Penjualan</button>
                  <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                  <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr class="bg-blue" align="center">
                          <td>No</td>
                          <td>ID</td>
                          <td>Distributor</td>
                          <td>Tanggal Jual</td>
                          <td>Judul</td>
                          <td>Harga</td>
                          <td>Jumlah Jual</td>
                          <td>Total Harga</td>
                          <td style="width:150px;">Action</td>
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
                  <form id="myForm" action="" method="post" name='autoSumForm' class="form-horizontal">
                    <input type="hidden" name="kd_penjualan" value="0">

                    <div class="form-group">
                      <label for="kd_distributor" class="label-control col-md-4">Distributor</label>
                      <div class="col-md-8">
                        <!-- <input type="text" name="kd_distributor" class="form-control"> -->
                        <select type="number" id="kd_distributor" name="kd_distributor" class="form-control">
                           <option value="0">-PILIH-</option>
                            <?php foreach($distributor as $row):?>
                                <option value="<?php echo $row->kd_distributor;?>"><?php echo $row->distributor;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="tgl_jual" class="label-control col-md-4">Tanggal Jual</label>
                      <div class="col-md-8">
                        <input type="date" name="tgl_jual" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="kd_buku" class="label-control col-md-4">Judul</label>
                      <div class="col-md-8">
                        <select type="number" id="kd_buku" name="kd_buku" class="form-control">
                           <option value="0">-PILIH-</option>
                            <?php foreach($data as $row):?>
                                <option value="<?php echo $row->kd_buku;?>"><?php echo $row->judul;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="harga" class="label-control col-md-4">Harga</label>
                      <div class="col-md-8">
                        <input type="text" name="harga" id="harga" class="form-control" onFocus="startCalc();" onBlur="stopCalc();">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="jml_jual" class="label-control col-md-4">Jumlah Jual</label>
                      <div class="col-md-8">
                        <input type="number" id="jml_jual" name="jml_jual" class="form-control" onFocus="startCalc();" onBlur="stopCalc();">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="total_harga" class="label-control col-md-4">Total Harga</label>
                      <div class="col-md-8">
                       
                        <input type="number" name="total_harga" class="form-control" value="0">
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

    <!-- Script Penjualan-->

<script>
    $(function(){
        showAllPenjualan();

        //Add New
        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Penjualan');
            $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addPenjualan');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var kd_distributor = $('input[name=kd_distributor]');
            var tgl_jual = $('input[name=tgl_jual]');
            var kd_buku = $('input[name=kd_buku]');
            var harga = $('input[name=harga]');
            var jml_jual = $('input[name=jml_jual]');
            var total_harga = $('input[name=total_harga]');
            var result = '';
            if(tgl_jual.val()==''){
                tgl_jual.parent().parent().addClass('has-error');
            }else{
                tgl_jual.parent().parent().removeClass('has-error');
                result +='1';
            }
            if(kd_buku.val()==''){
                kd_buku.parent().parent().addClass('has-error');
            }else{
                kd_buku.parent().parent().removeClass('has-error');
                result +='2';
            }
            if(kd_distributor.val()==''){
                kd_distributor.parent().parent().addClass('has-error');
            }else{
                kd_distributor.parent().parent().removeClass('has-error');
                result +='3';
            }
            if(jml_jual.val()==''){
                jml_jual.parent().parent().addClass('has-error');
            }else{
                jml_jual.parent().parent().removeClass('has-error');
                result +='4';
            }      
            if(total_harga.val()==''){
                total_harga.parent().parent().addClass('has-error');
            }else{
                total_harga.parent().parent().removeClass('has-error');
                result +='5';
            }
            if(harga.val()==''){
                harga.parent().parent().addClass('has-error');
            }else{
                harga.parent().parent().removeClass('has-error');
                result +='6';
            }                  

            if(result=='123456'){
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
                            $('.alert-success').html('Data Penjualan '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllPenjualan();
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

         $(document).ready(function(){
       $('#kd_buku').on('input',function(){
                
                var kd_buku=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/home/get_buku')?>",
                    dataType : "JSON",
                    data : {kd_buku: kd_buku},
                    cache:false,
                    success: function(data){
                        $.each(data,function(kd_buku,judul, harga)
                        {
                            $('#harga').val(data.harga);
                        });
                        
                    }
                });
                return false;
           });

    });

        //edit
        $('#showdata').on('click', '.item-edit', function(){
            var kd_penjualan = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Data Penjualan');
            $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updatePenjualan');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/home/editPenjualan',
                data: {kd_penjualan: kd_penjualan},
                async: false,
                dataType: 'json',
                success: function(data){
                  $('input[name=kd_distributor]').val(data.kd_distributor);
                    $('input[name=tgl_jual]').val(data.tgl_jual);
                    $('input[name=kd_buku]').val(data.kd_buku);
                    $('input[name=harga]').val(data.harga);
                    $('input[name=jml_jual]').val(data.jml_jual);
                    $('input[name=total_harga]').val(data.total_harga);
                    $('input[name=kd_penjualan]').val(data.kd_penjualan);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function(){
            var kd_penjualan = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>index.php/home/deletePenjualan',
                    data:{kd_penjualan:kd_penjualan},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Data Penjualan Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                            showAllPenjualan();
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

        //function
        function showAllPenjualan(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/home/showAllPenjualan',
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
                                    '<td>'+data[i].kd_penjualan+'</td>'+
                                    '<td>'+data[i].distributor+'</td>'+
                                    '<td>'+data[i].tgl_jual+'</td>'+
                                    '<td>'+data[i].nama_kategori+'</td>'+
                                    '<td>'+data[i].harga+'</td>'+
                                    '<td>'+data[i].jml_jual+'</td>'+
                                    '<td>'+data[i].total_harga+'</td>'+
                                    '<td>'+
                                        '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].kd_penjualan+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].kd_penjualan+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
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

<script>

function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.jml_jual.value;
two = document.autoSumForm.harga.value;
document.autoSumForm.total_harga.value = (one * 1) * (two * 1) ;}
function stopCalc(){
clearInterval(interval);}
</script>