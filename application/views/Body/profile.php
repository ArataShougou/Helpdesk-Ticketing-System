<div class="row">
	<ol class="breadcrumb">
		<li><a href="<?php echo base_url();?>index.php/home"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Profil Saya</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

			<div class="panel-heading"><i class="fas fa-users-cog fa-lg"></i>
				<span>Profil</span>
			</div>
			<div class="panel-body">

				<div class="list-group">
					<a href="#" class="list-group-item active">
						AKUN INFORMASI
					</a>
					<a href="#" class="list-group-item"><label class="col-md-3"> Nama Pengguna </label>&nbsp;: <?php echo $this->session->userdata('user');?></a>
					<a href="#" class="list-group-item"><label class="col-md-3"> Hak Akses</label>&nbsp;: <?php echo $this->session->userdata('level');?></a>
				</div>

				<div class="list-group">
					<?php foreach($profile as $row):?>
						<a href="#" class="list-group-item active">
							Profil INFORMASI
						</a>
						<a href="#" class="list-group-item" id="data1" data-info="<?php echo $row['Nama'];?>"><label class="col-md-3"> Nama Lengkap</label>&nbsp;: <?php echo $row['Nama'];?></a>
						<a href="#" class="list-group-item" id="data2" data-info="<?php echo $row['TglLahir'];?>"><label class="col-md-3"> Tanggal Lahir </label>&nbsp;: <?php echo $row['TglLahir'];?></a>
						<a href="#" class="list-group-item" id="data3" data-info="<?php echo $row['Alamat'];?>"><label class="col-md-3"> Alamat </label>&nbsp;: <?php echo $row['Alamat'];?></a>
						<a href="#" class="list-group-item" id="data4" data-info="<?php echo $row['JenisKelamin'];?>"><label class="col-md-3"> Jenis Kelamin </label>&nbsp;: <?php echo $row['JenisKelamin'];?></a>
						<a href="#" class="list-group-item" id="data5" data-info="<?php echo $row['NoTelp'];?>"><label class="col-md-3"> No Telepon </label>&nbsp;: <?php echo $row['NoTelp'];?></a>
						<a href="#" class="list-group-item" id="data6"><label class="col-md-3"> Tanggal dibuat </label>&nbsp;: <?php echo $row['TglBuat'];?></a>
					<?php endforeach ?>
					<button class="btn btn-primary" type="button" id="editprofilebtn" data-toggle="modal" data-target="#updateModal" style="margin-top:10px;">Perbarui Data</button>
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->

<!-- Modal -->
<div class="modal fade" id="updateModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="modal-title active">Ubah Data Pengguna</li>
				</ol>
			</div>
			<div class="modal-body">
				<div id='msg-ubah'></div>
				<div class="panel col-lg-12">
					<form class="form-horizontal"  >
						<div class="form-group">
							<label class="label label-primary" id="labeltambah" style="display: block; padding: 10px; font-size: 14px"><?php echo $this->session->userdata('user');?></label>
						</div>
						<div class="form-group ">
							<label class="control-label col-sm-3" for="txtnama">Nama :</label>
							<div class=" col-sm-6">
								<input class="form-control" type="text" name="nama" id="txtnama" required>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-sm-3" for="txttgllahir">Tanggal Lahir :</label>
							<div class=" col-sm-6">
								<input class="form-control" type="text" name="nama" id="txttgllahir" required>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-sm-3" for="txtalamat">Alamat :</label>
							<div class=" col-sm-6">
								<textarea class="form-control" rows="3" name="nama" id="txtalamat"></textarea>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-sm-3" for="txtjk">Jenis Kelamin :</label>
							<div class=" col-sm-6">
								<select class="form-control" id="ddjk">
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</div>
						<div class="form-group ">
							<label class="control-label col-sm-3" for="txtnotelp">No Telepon :</label>
							<div class=" col-sm-6">
								<input class="form-control" type="text" name="nama" maxlength="15" id="txtnotelp" required>
							</div>
						</div>
						<br>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btnupdate">Simpan</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#editprofilebtn").click(function(){
			document.getElementById('txtnama').value = $("#data1").data('info');
			document.getElementById('txttgllahir').value = $("#data2").data('info');
			document.getElementById('txtalamat').value = $("#data3").data('info');
			document.getElementById('ddjk').value = $("#data4").data('info');
			document.getElementById('txtnotelp').value = $("#data5").data('info');
		});
	});

	$(document).ready(function(){
		$("#btnupdate").click(function(){
			var nama = document.getElementById('txtnama').value;
			var tgllahir = document.getElementById('txttgllahir').value;
			var alamat = document.getElementById('txtalamat').value;
			var jk = document.getElementById('ddjk').value;
			var notelp = document.getElementById('txtnotelp').value;
			$.post("<?php echo site_url('Profile/update');?>",
				{'nama':nama,'tgllahir':tgllahir,'alamat':alamat,'jk':jk,'notelp':notelp},
				function(data,status){
					$('#msg-ubah').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Data Berhasil Diperbarui.</div>");
					$('#updateModal').on('hidden.bs.modal', function () {
						 location.reload();
						});
				});
		});
	});
</script>

