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
                  <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Penerbit</button>
                  <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                  <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr align="center" class="bg-blue">
                          <td>No</td>
                          <td>ID</td>
                          <td>Nama Penerbit</td>
                          <td>Telephone</td>
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
                    <input type="hidden" name="kd_penerbit" value="0">
                    <div class="form-group">
                      <label for="nama_penerbit" class="label-control col-md-4">Nama Penerbit</label>
                      <div class="col-md-8">
                        <input type="text" name="nama_penerbit" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="telp_penerbit" class="label-control col-md-4">Telephone</label>
                      <div class="col-md-8">
                        <input type="number" name="telp_penerbit" class="form-control">
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

<!-- Script Penerbit -->
  <script>
    $(function(){
        showAllPenerbit();

        //Add New
        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Penerbit');
            $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addPenerbit');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var nama_penerbit = $('input[name=nama_penerbit]');
            var telp_penerbit = $('input[name=telp_penerbit]');
            var result = '';
            if(nama_penerbit.val()==''){
                nama_penerbit.parent().parent().addClass('has-error');
            }else{
                nama_penerbit.parent().parent().removeClass('has-error');
                result +='1';
            }
            if(telp_penerbit.val()==''){
                telp_penerbit.parent().parent().addClass('has-error');
            }else{
                telp_penerbit.parent().parent().removeClass('has-error');
                result +='2';
            }

            if(result=='12'){
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
                            $('.alert-success').html('Penerbit '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllPenerbit();
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
            var kd_penerbit = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit EPenerbit');
            $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updatePenerbit');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/home/editPenerbit',
                data: {kd_penerbit: kd_penerbit},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=nama_penerbit]').val(data.nama_penerbit);
                    $('input[name=telp_penerbit]').val(data.telp_penerbit);
                    $('input[name=kd_penerbit]').val(data.kd_penerbit);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function(){
            var kd_penerbit = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>index.php/home/deletePenerbit',
                    data:{kd_penerbit:kd_penerbit},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Data Penerbit Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                            showAllPenerbit();
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
        function showAllPenerbit(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/home/showAllPenerbit',
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
                                    '<td>'+data[i].kd_penerbit+'</td>'+
                                    '<td>'+data[i].nama_penerbit+'</td>'+
                                    '<td>'+data[i].telp_penerbit+'</td>'+
                                    '<td align="center">'+
                                        '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].kd_penerbit+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].kd_penerbit+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
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

