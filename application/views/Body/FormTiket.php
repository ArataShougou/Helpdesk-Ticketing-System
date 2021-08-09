
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Buat Tiket</li>

	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
				<div id='msg'></div>
			<div class="panel-heading">
				<h4>Formulir Tiket</h4>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" id="form">
					<fieldset>

						<!-- Pelapor input-->
						<div class="form-group ">
							<label class="col-md-3 control-label" for="reprt">Pelapor</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="reprt" id="reprt" value="<?php echo $this->session->userdata('nama');?>" readonly>
							</div>
						</div>

						<!-- Katagori input -->
						<div class="form-group">
							<label class="col-md-3 control-label">Masalah</label>
							<div class="col-md-9">
								<?php echo form_dropdown('id_masalah',$dd_masalah," " , ' id="id_masalah" required class="form-control"');?>
							</div>
						</div>

						<!-- Subjek input-->
						<div class="form-group">
							<label class="col-md-3 control-label" for="subjek">Subjek</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="subjek" id="subjek" placeholder="Subjek">
							</div>
						</div>

						<!-- Message body -->
						<div class="form-group">
							<label class="col-md-3 control-label" for="desc">Deskripsi Masalah</label>
							<div class="col-md-9">
								<textarea class="form-control" id="desc" name="desc" placeholder="Silahkan Deskripsikan Masalah Anda..." rows="5"></textarea>
							</div>
						</div>

						<!-- Tingkat input -->
						<div class="form-group">
							<label class="col-md-3 control-label">Tingkat Penggunaan</label>
							<div class="col-md-9">
							<select name="tktPenggunaan" id="tktPenggunaan" class="form-control" >
								<option value="5">Sering</option>
								<option value="3">Kadang</option>
								<option value="1">Jarang</option>
							</select>

							</div>
						</div>

						<!-- Form actions -->
						<div class="form-group">
							<div class="col-md-12 widget-right">
								<button type="submit" class="btn btn-primary btn-md pull-right">Buat Tiket</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(e){
		$("#form").submit(function(){
			var datastring = $("#form").serialize();
			$.ajax({
				type : "POST",
				url : "<?php echo base_url().'index.php/NewTiket/save'?>",
				data :datastring,
				success: function(){
					$('#msg').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Tiket Berhasil dibuat.</div>");
					setTimeout(function(){ location.reload(); }, 5000);
				},
				error:function(){
					$('#msg').html("<div class='alert bg-danger' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Error, Gagal membuat tiket.</div>");
					setTimeout(function(){ location.reload(); }, 5000);	
				}
			});
			return false;
		});
	});
</script>