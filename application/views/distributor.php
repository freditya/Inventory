        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Distributor</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="alert alert-success" style="display: none; color: green;">   
                    </div>
                  </div>
                  <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add Distributor</button>
                  <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                  <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr class="bg-blue">
                          <td align="center">No</td>
                          <td align="center">ID</td>
                          <td align="center">Nama Distributor</td>
                          <td align="center">Telephone</td>
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
                    <input type="hidden" name="kd_distributor" value="0">
                    <div class="form-group">
                      <label for="distributor" class="label-control col-md-4">Nama Distributor</label>
                      <div class="col-md-8">
                        <input type="text" name="distributor" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="no_telp_dis" class="label-control col-md-4">Telephone</label>
                      <div class="col-md-8">
                        <input type="number" name="no_telp_dis" class="form-control">
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

<!-- Script distributor -->
  <script>
    $(function(){
        showAllDistributor();

        //Add New
        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New Distributor');
            $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addDistributor');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var distributor = $('input[name=distributor]');
            var no_telp_dis = $('input[name=no_telp_dis]');
            var result = '';
            if(distributor.val()==''){
                distributor.parent().parent().addClass('has-error');
            }else{
                distributor.parent().parent().removeClass('has-error');
                result +='1';
            }
            if(no_telp_dis.val()==''){
                no_telp_dis.parent().parent().addClass('has-error');
            }else{
                no_telp_dis.parent().parent().removeClass('has-error');
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
                            $('.alert-success').html('Data Distributor '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllDistributor();
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
            var kd_distributor = $(this).attr('data');
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Edit Distributor');
            $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updateDistributor');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/home/editDistributor',
                data: {kd_distributor: kd_distributor},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=distributor]').val(data.distributor);
                    $('input[name=no_telp_dis]').val(data.no_telp_dis);
                    $('input[name=kd_distributor]').val(data.kd_distributor);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function(){
            var kd_distributor = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>index.php/home/deleteDistributor',
                    data:{kd_distributor:kd_distributor},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Data Distributor Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                            showAllDistributor();
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
        function showAllDistributor(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/home/showAllDistributor',
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
                                    '<td>'+data[i].kd_distributor+'</td>'+
                                    '<td>'+data[i].distributor+'</td>'+
                                    '<td>'+data[i].no_telp_dis+'</td>'+
                                    '<td align="center">'+
                                        '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].kd_distributor+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].kd_distributor+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
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

