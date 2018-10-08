<div class="container">
	<div class="row">
		<div class="col-md-4">
			<br>
			<br>
			<div class="container-fluid">
				<form class="clearfix" action="<?=base_url().'web/cek_login'?>" method="POST">
				<div class="form-group">
                    <label for="email">Username</label>
                     <input type="text" class="form-control input_panel" id="username" name="username" placeholder="Enter Username" value="<?=$this->session->flashdata('username')?>" required="">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control input_panel" id="password" name="password" placeholder="Enter Password" value="<?=$this->session->flashdata('password')?>" required="">
                    </div>
                    <?php
					$log=$this->session->flashdata('status_log');
					if($log){
					?>
					<div class="alert alert-warning alert-dismissible fade show" role="alert">
  					<strong>Error : </strong><?=$log;?>
  					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
					<?php
					}
					?>
                    <a href="javascript:void(0);" onclick="location.href='<?=base_url().'web/lupa_kata_sandi'?>';" class="text-dark">Lupa kata sandi?</a>
                    <button type="submit" class="btn pull-right">Login</button>
			</form>
			<br><br>

			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
</div>
                                    