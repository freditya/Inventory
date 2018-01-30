        <div class="right_col" role="main">
        	<div class="clearfix"></div>
        	<div class="row">
        		<div class="col-lg-8 col-md-7">
        			<div class="x_panel">
        				<div class="x_title">
        					<h2>Setting Password</h2>
        					<ul class="nav navbar-right panel_toolbox">
        						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        						</li>
        					</ul>
        					<div class="clearfix"></div>
        					<div class="alert alert-success" style="display: none; color: green;">   
        					</div>
        				</div>
        				<div class="x_content">

        					<form method="post" action="<?=base_url();?>index.php/c_ganti/save_password" class="form-horizontal">
        						<div class="error">
        						<?= validation_errors() ?>
        						<?= $this->session->flashdata('error') ?>
        					</div>

        						<div class="form-group">
        							<label for="nama_user" class="label-control col-md-4">Password Lama</label>
        							<div class="col-md-8">
        								<input type="password" name="old" value="<?php echo set_value('old');?>" class="form-control"  required placeholder="*******" autocomplete="off">
        							</div>
        						</div>

        						<div class="form-group">
        							<label for="username" class="label-control col-md-4">Password Baru</label>
        							<div class="col-md-8">
        								<input type="password" name="new" value="<?php echo set_value('new');?>" class="form-control" value="" required placeholder="*******" autocomplete="off">
        							</div>
        						</div>

        						<div class="form-group">
        							<label for="pas_lama" class="label-control col-md-4">Ulangi Password Baru</label>
        							<div class="col-md-8">
        								<input type="password" name="re_new" value="<?php echo set_value('re_new'); ?>" class="form-control" value="" required placeholder="*******" autocomplete="off">
        							</div>
        						</div>
        						<div class="text-center">
        							<button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
        						</div>
        					</form>
        					
        				</div>

        			</div>
        		</div>
        	</div>
        </div>
    </div>





