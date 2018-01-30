        <div class="right_col" role="main">
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-lg-8 col-md-7">
              <div class="x_panel">
                <div class="x_title">
                  <h2>View Picture</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                  <div class="alert alert-success" style="display: none; color: green;">   
                  </div>
                </div>
                <div class="x_content">

                  <div class="col-md-8">
                    <div class="my-4">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><?php echo anchor('','Home')?></li>
                        <li class="breadcrumb-item"><?php echo anchor('upload','upload')?></li>
                        <li class="breadcrumb-item"><?php echo anchor('lihat','lihat')?></li>
                      </ol>
                    </div>
                    <?php echo validation_errors('<font color=red>', '</font>'); ?>
                    <?php
                    if($this->session->flashdata('pesan')==TRUE):
                      echo'<div class="alert alert-warning" role="alert">';
                      echo $this->session->flashdata('pesan');
                      echo "</div>";
                      endif;?>
                      <div class="card">
                        <div class="card-body">
                         <div class="row">
                          <?php foreach ($gbr as $row) {?>
                          <div class="col-sm-3">
                            <div class="card">
                              <img class="card-img-top" src=<?php echo base_url('assets/img/'.$row->gambar.'');?>>
                              <div class="card-body">
                                <?php echo anchor('edit/edimg/'.$row->id_user.'/'.$row->gambar.'', '<span class="badge badge-dark">Edit</span>');?> &nbsp;
                                <?php echo anchor('hapus/hps/'.$row->id_user.'/'.$row->gambar.'', '<span class="badge badge-danger">Hapus</span>');?>
                              </div>
                            </div>
                          </div>   
                          <?php } ?>
                        </div>
                      </div></div>
                    </div>




                  </div>
                </div>
              </div>
            </div>
          </div>





