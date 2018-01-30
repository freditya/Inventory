        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Retur</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="alert alert-success" style="display: none; color: green;">   
                    </div>
                  </div>
                  <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Data</button>
                  <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                  <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center" class="bg-blue">
                          <td>No</td>
                          <td>ID</td>
                          <td>Distributor</td>
                          <td>Tanggal</td>
                          <td>Nama Buku</td>
                          <td>Jumlah</td>
                          <td>Keterangan</td>
                          <td align="center">Action</td>
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
                    <input type="hidden" name="kd_retur" value="0">

                    <div class="form-group">
                      <label for="kd_distributor" class="label-control col-md-4">Distributor</label>
                      <div class="col-md-8">
                        <!-- <input type="kd_distributor" name="kd_distributor" class="form-control"> -->
                        <select type="number" name="kd_distributor" class="form-control">
                           <option value="0">-PILIH-</option>
                            <?php foreach($distributor as $row):?>
                                <option value="<?php echo $row->kd_distributor;?>"><?php echo $row->distributor;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="tgl_retur" class="label-control col-md-4">Tanggal Retur</label>
                      <div class="col-md-8">
                        <input type="date" name="tgl_retur" class="form-control">
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="kd_buku" class="label-control col-md-4">Nama Buku</label>
                      <div class="col-md-8">
                        <select type="number" name="kd_buku" class="form-control">
                           <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->kd_buku;?>"><?php echo $row->judul;?></option>
                            <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jml_retur" class="label-control col-md-4">Jumlah Retur</label>
                      <div class="col-md-8">
                        <input type="number" name="jml_retur" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="keterangan" class="label-control col-md-4">Keterangan</label>
                      <div class="col-md-8">
                        <textarea class="form-control" name="keterangan"></textarea>
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

    <!-- Script Retur -->
<script>
    $(function(){
        showAllRetur();

        //Add New
        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Data Retur');
            $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addRetur');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var kd_distributor = $('input[name=kd_distributor]');
            var tgl_retur = $('input[name=tgl_retur]');
            var kd_buku = $('input[name=kd_buku]');
            var jml_retur = $('input[name=jml_retur]');
            var keterangan = $('textarea[name=keterangan]');

            var result = '';
            if(tgl_retur.val()==''){
                tgl_retur.parent().parent().addClass('has-error');
            }else{
                tgl_retur.parent().parent().removeClass('has-error');
                result +='1';
            }
            if(kd_buku.val()==''){
                kd_buku.parent().parent().addClass('has-error');
            }else{
                kd_buku.parent().parent().removeClass('has-error');
                result +='2';
            }
            if(jml_retur.val()==''){
                jml_retur.parent().parent().addClass('has-error');
            }else{
                jml_retur.parent().parent().removeClass('has-error');
                result +='3';
            }
            if(keterangan.val()==''){
                keterangan.parent().parent().addClass('has-error');
            }else{
                keterangan.parent().parent().removeClass('has-error');
                result +='4';
            }
            if(kd_distributor.val()==''){
                kd_distributor.parent().parent().addClass('has-error');
            }else{
                kd_distributor.parent().parent().removeClass('has-error');
                result +='5';
            }

            if(result=='12345'){
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
                            $('.alert-success').html('Retur '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllRetur();
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
            var kd_retur = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Retur');
            $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updateRetur');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/home/editRetur',
                data: {kd_retur: kd_retur},
                async: false,
                dataType: 'json',
                success: function(data){
                  $('input[name=kd_distributor]').val(data.kd_distributor);
                    $('input[name=tgl_retur]').val(data.tgl_retur);
                    $('input[name=kd_buku]').val(data.kd_buku);
                    $('input[name=jml_retur]').val(data.jml_retur);
                    $('textarea[name=keterangan]').val(data.keterangan);                   
                    $('input[name=kd_retur]').val(data.kd_retur);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function(){
            var kd_retur = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>index.php/home/deleteRetur',
                    data:{kd_retur:kd_retur},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Data Retur Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                            showAllRetur();
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
        function showAllRetur(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/home/showAllRetur',
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
                                    '<td>'+data[i].distributor+'</td>'+
                                    '<td>'+data[i].kd_retur+'</td>'+
                                    '<td>'+data[i].tgl_retur+'</td>'+
                                    '<td>'+data[i].judul+'</td>'+
                                    '<td>'+data[i].jml_retur+'</td>'+
                                    '<td>'+data[i].keterangan+'</td>'+
                                    '<td align="center">'+
                                        '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].kd_retur+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].kd_retur+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
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