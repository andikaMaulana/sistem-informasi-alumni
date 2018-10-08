<script type="text/javascript">
	$(document).ready(function(){
		$("#status").hide();
		$("#form_kirim_sandi").hide();
	});
	function cariNIM(){
		var nim=$('#nim').val();
		$.ajax({
			url:'<?=base_url().'web/reset_password'?>',
			method:'post',
			dataType:'json',
			data:'nim='+nim,
			success:function(data){				
				if(data['email']==0)
					$("#status").show();
				else{
					$("#status").hide();
					$("#_email").text(data['email']);
					$("#email").val(data['email']);
					$("#nama").val(data['nama']);
					$("#form_kirim_sandi").show();
				}
			}
		});
	}
</script>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<br>
			<br>
			<div class="container-fluid">
				<form class="clearfix" action="" method="POST">
					<div class="form-group">
						<label for="nim"> Masukan NIM anda : </label>
						<input type="text" class="form-control input_panel" id="nim" name="nim" placeholder="NIM" required="">
					</div>
					<div id="status" class="alert alert-warning alert-dismissible fade show" role="alert">
						<strong>Error : </strong> Email tidak ditemukan.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<button type="button" class="btn pull-right" id="cari" onclick="cariNIM()">Cari</button>
				</form>
				<div class="clearfix" id="form_kirim_sandi">
					<br>
					<div class="alert alert-success">
						<strong>Email Anda : </strong> <span id="_email"></span>
						<br>
					</div>
					<br>
					<form method="POST" action="<?=base_url().'web/kirim_email'?>">
					<input type="hidden" name="email" id="email">
					<input type="hidden" name="nama" id="nama">
					<button type="submit" class="btn btn-success" id="sandi_baru">Kirim Kata Sandi Baru</button>
					</form>
				</div>
				<br><br>
			</div>
		</div>
		<div class="col-md-6">
		</div>
	</div>
</div>
