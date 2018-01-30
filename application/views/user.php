
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data User</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="alert alert-success" style="display: none; color: green;">   
                    </div>
                  </div>
                  <button id="btnAdd" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add New User</button>
                  <!-- <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button> -->
                  <div class="x_content">
                  <table id="table_id" class="table table-bordered table-responsive table-striped" style="margin-top: 20px;">
                      <thead>
                        <tr class="bg-blue" align="center">
                          <td>No</td>
                          <td>ID</td>
                          <td>Nama Lengkap</td>
                          <td>Username</td>
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
                
                  <form id="myForm" action="" method="post" class="form-horizontal" id="upload_file">
                    <input type="hidden" name="id_user" value="0">
                    <div class="form-group">
                      <label for="nama_user" class="label-control col-md-4">Nama Lengkap</label>
                      <div class="col-md-8">
                        <input type="text" name="nama_user" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="label-control col-md-4">Username</label>
                      <div class="col-md-8">
                        <input type="text" name="username" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="password" class="label-control col-md-4">Password</label>
                      <div class="col-md-8">
                        <input type="password" name="password" class="form-control">
                      </div>
                    </div>
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
               <!--  <?php echo form_close(); ?> -->
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- edit modal user -->

        <div id="editModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modal title</h4>
              </div>
              <div class="modal-body">
                
                  <form id="myForm1" action="" method="post" class="form-horizontal" id="upload_file">
                    <input type="hidden" name="id_user1" value="0">
                    <div class="form-group">
                      <label for="nama_user1" class="label-control col-md-4">Nama Lengkap</label>
                      <div class="col-md-8">
                        <input type="text" name="nama_user1" class="form-control" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="username" class="label-control col-md-4">Username</label>
                      <div class="col-md-8">
                        <input type="text" name="username1" class="form-control" required>
                      </div>
                    </div>

<!--                     <div class="form-group">
                      <label for="password" class="label-control col-md-4">Password</label>
                      <div class="col-md-8">
                        <input type="password" name="password1" class="form-control" readonly>
                      </div>
                    </div> -->
                  </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnEdit" class="btn btn-primary">Update</button>
               <!--  <?php echo form_close(); ?> -->
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

<!-- Script User -->
  <script>
    $(function(){
        showAllUser();

        //Add New
        $('#btnAdd').click(function(){
            $('#myModal').modal('show');
            $('#myModal').find('.modal-title').text('Add New User');
            $('#myForm').attr('action','<?php echo base_url() ?>index.php/home/addUser');
        });


        $('#btnSave').click(function(){
            var url = $('#myForm').attr('action');
            var data = $('#myForm').serialize();
            //validate form
            var nama_user = $('input[name=nama_user]');
            var username = $('input[name=username]');
            var password = $('input[name=password]');
            var result = '';
            if(nama_user.val()==''){
                nama_user.parent().parent().addClass('has-error');
            }else{
                nama_user.parent().parent().removeClass('has-error');
                result +='1';
            }
             if(username.val()==''){
                username.parent().parent().addClass('has-error');
            }else{
                username.parent().parent().removeClass('has-error');
                result +='2';
            }
             if(password.val()==''){
                password.parent().parent().addClass('has-error');
            }else{
                password.parent().parent().removeClass('has-error');
                result +='3';
            }


            if(result=='123'){
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
                            $('.alert-success').html('Data Users '+type+' successfully').fadeIn().delay(4000).fadeOut('slow');
                            showAllUser();
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
            var id_user = $(this).attr('data');
            $('#editModal').modal('show');
            $('#editModal').find('.modal-title').text('Edit Data User');
            $('#myForm').attr('action', '<?php echo base_url() ?>index.php/home/updateUser');
            $.ajax({
                type: 'ajax',
                method: 'get',
                url: '<?php echo base_url() ?>index.php/home/editUser',
                data: {id_user: id_user},
                async: false,
                dataType: 'json',
                success: function(data){
                    $('input[name=nama_user1]').val(data.nama_user);
                    $('input[name=username1]').val(data.username);
                    // $('input[name=password1]').val(data.password);
                    $('input[name=id_user1]').val(data.id_user);
                },
                error: function(){
                    alert('Could not Edit Data');
                }
            });
        });

        //Update user
        $('#btnEdit').on('click',function(){
            var data = $('#myForm1').serialize();
            var nama_user = $('input[name=nama_user1]');
            var username = $('input[name=username1]');
            // var password = $('input[name=password1]');
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('index.php/home/updateUser')?>",
                dataType : "JSON",
                data : data,
                success: function(data){
                    $('input[name=nama_user1]').val(data.nama_user);
                    $('input[name=username1]').val(data.username);
                    // $('input[name=password1]').val(data.password);
                    $('input[name=id_user1]').val(data.id_user);
                    $('#editModal').modal('hide');
                    showAllUser();
                }
            });
            return false;
        });

        //delete- 
        $('#showdata').on('click', '.item-delete', function(){
            var id_user = $(this).attr('data');
            $('#deleteModal').modal('show');
            //prevent previous handler - unbind()
            $('#btnDelete').unbind().click(function(){
                $.ajax({
                    type: 'ajax',
                    method: 'get',
                    async: false,
                    url: '<?php echo base_url() ?>index.php/home/deleteUser',
                    data:{id_user:id_user},
                    dataType: 'json',
                    success: function(response){
                        if(response.success){
                            $('#deleteModal').modal('hide');
                            $('.alert-success').html('Data User Berhasil Dihapus').fadeIn().delay(4000).fadeOut('slow');
                            showAllUser();
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
        function showAllUser(){
            $.ajax({
                type: 'ajax',
                url: '<?php echo base_url() ?>index.php/home/showAllUser',
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
                                    '<td>'+data[i].id_user+'</td>'+
                                    '<td>'+data[i].nama_user+'</td>'+
                                    '<td>'+data[i].username+'</td>'+
                                    
                                    // '<td>'+'<img src="<?php echo base_url("images");?>'+'/'+data[i].filename+'" width="100px" height="100px">'+'</td>'+
                                    '<td align="center">'+
                                        '<a href="javascript:;" class="btn btn-warning item-edit" data="'+data[i].id_user+'"><i class="glyphicon glyphicon-edit"></i> Edit</a>'+
                                        '<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_user+'"><i class="glyphicon glyphicon-trash"></i> Delete</a>'+
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
