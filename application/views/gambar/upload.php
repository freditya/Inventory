        <div class="right_col" role="main">
        	<div class="clearfix"></div>
        	<div class="row">
        		<div class="col-lg-8 col-md-7">
        			<div class="x_panel">
        				<div class="x_title">
        					<h2>Change Picture</h2>
        					<ul class="nav navbar-right panel_toolbox">
        						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        						</li>
        					</ul>
        					<div class="clearfix"></div>
        					<div class="alert alert-success" style="display: none; color: green;">   
        					</div>
        				</div>
        				<div class="x_content">
              <div class="col-md-4">

                  <?php
                    if($this->session->flashdata('pesan')==TRUE): // Notif pesan
                    echo'<div class="alert alert-success" role="alert">';
                    echo $this->session->flashdata('pesan');
                    echo "</div>";
                    endif;
                    if(isset($pesan)): // validasi IMG
                    echo'<div class="alert alert-warning" role="alert">';
                    echo $pesan;
                    echo "</div>";
                    endif;?>
                <div class="card">
                  <div class="card-body">

                      <?php echo form_open_multipart('upload/proses');?>
                      
                    <div class="form-group">
                      <!-- <?php foreach ($gbr as $row) {?> -->
                      <img class="img-thumbnail" width="200" height="200" id="profile-pre" src="<?php echo base_url('assets/img/'.$row->gambar.'');?>" alt="your image" /><br><br>
                      <!-- <?php } ?> -->
                      <label for="exampleInputEmail1">Pilih file</label>
                      <input type="file" name="tb_user" class="form-control" id="profile-id" aria-describedby="emailHelp" placeholder="Enter nama">
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
              <script type="text/javascript">
                function readURL(input) { // live preview IMG
                  if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                      $('#profile-pre').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                  }
                }
                $("#profile-id").change(function(){
                  readURL(this);
                });
              </script>

            </div>
          </div>
        </div>
      </div>
    </div>





