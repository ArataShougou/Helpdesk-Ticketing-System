
<style type="text/css">
.modal-header .close {
	display: none;
}

.detail{
	list-style: none;
}

.detail a{
	text-decoration: none;
	color: #777;
}
a{
	text-decoration: none;
	outline: none;
}

a:hover{
	text-decoration: none;
}

.table>thead>tr>th {
	height: 0;
	/*text-align: center;*/
	border: 0;
}

.table{
	border-collapse: separate;
	border-spacing: 0;
}

.fixed-table-container tbody td {
	border: none;
	text-align:left;
}

.fixed-table-container {
	border: none;
}


.fixed-table-header {

	border-radius: 0;
}


/* width */
::-webkit-scrollbar {
	width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
	background: rgba(0,0,0,0);  
}

/* Handle */
::-webkit-scrollbar-thumb {
	background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
	background: #555; 
}


</style>
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Daftar Pengguna</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Daftar Pengguna</h4>
			</div>
			<div class="panel-body">
				<div><a id="modal-detil" href="#" data-toggle="modal" data-target="#detailModal"><i class="fas fa-user-plus fa-lg"></i>&nbsp;Tambah User</a></div>
				<table id='tabledata' class="table   table-hover"  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th class=".col-" data-field="id_tiket" data-sortable="true"> No</th>
							<th data-field="user" data-sortable="true">Nama Pengguna</th>
							<th data-field="level" data-sortable="true">Hak Akses</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($user_list as $row) : $no++; ?>
						<tr>
							<td><?php echo $no ?></td>
							<td><?php echo $row['Username']; ?></td>
							<td><?php echo $row['Level']; ?></td>
							<td>
								<a class="ubah btn btn-primary btn-xs" id="modal-ubah" href="#" data-toggle="modal" data-target="#ubahModal" data-id="<?php echo $row['Username'];?>"><span class="glyphicon glyphicon-edit" ></span></a>
								<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row['Username'];?>"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>

<!-- Modal -->
<div id="detailModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Pengguna Baru</li>
				</ol>
			</div>
			<div class="modal-body">
				<div id='msg'></div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" id="form">
					<div class="form-group ">
						<label class="col-sm-3 col-form-label" for="txtusername">Username: </label>
						 <div class="col-sm-8">
						<input type="text" class="form-control" name="username" id="txtusername">
					</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 col-form-label" for="txtpassword">Password:</label>
						 <div class="col-sm-8">
						<input type="text" class="form-control" name="pass" id="txtpassword">
					</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 col-form-label" for="txtemail">Email: </label>
						 <div class="col-sm-8">
						<input type="text" class="form-control" name="email" id="txtemail">
					</div>
					</div>
					<div class="form-group ">
						<label class="col-sm-3 col-form-label" for="leveladd">Level:</label>
						 <div class="col-sm-8">
						<select class="btn-sm dropdown-toggle form-control form-control-sm" name="level" id="leveladd">
							<option value="ADMIN">Admin</option>
							<option value="TEKNISI">Teknisi</option>
							<option value="USER">User</option>
						</select>
					</div>
					</div>
							<div class="modal-footer">
					<button type="submit" class="btn btn-primary ">Tambah</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
					</div>
				</form>
				</div>

			</div>
		
	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="ubahModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="modal-title active">Ubah Hak Akses Pengguna</li>
				</ol>
			</div>
			<div class="modal-body">
				<div id='msg-ubah'></div>
				<!-- <h5 name="user" id="user"></h5> -->
				<div class="form-group">
							<span class="label label-primary" id="user" style="display: block; padding: 10px;"></span>
						</div>
				<form  class="form-horizontal" method="post" id="formubah">

					<div class="list-group row">
						<input type="hidden" name="user" id="usertxt">
						<label for="level" class="col-sm-3 col-form-label">Hak Akses :</label>
						<div class="col-sm-5">
						<select name="level" id="level" class="btn-sm dropdown-toggle form-control form-control-sm">
							<option value="ADMIN">Admin</option>
							<option value="TEKNISI">Teknisi</option>
							<option value="USER">User</option>
						</select>
					</div>
						<div class="col-sm-2">
						<button type="button" id="ubah" class="btn btn-primary">Ubah</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modKonfirmasi" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="font-weight:bold"><span class="glyphicon glyphicon-info-sign" style="color:#FFFFFF; font-size:24px"></span>Konfirmasi </h4>
			</div>
			<div class="modal-body">
				Anda yakin akan menghapus Pengguna  : <strong><span id="mod"></span></strong> ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="oke">Ya </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>

	</div>
</div>

<script>

	$("#form").submit(function(){
		var user = document.getElementById("txtusername").value;
		var pass = document.getElementById("txtpassword").value;
		var email = document.getElementById("txtemail").value;
		var level = $('#leveladd').find(":selected").val();
		var data = {'user':user, 'pass':pass, 'email':email, 'level':level}
		$.ajax({
			url : "<?php echo base_url('index.php/User/addNew');?>",
			type: "POST",
			data: data,
			dataType : 'html',
			success:function(){

					$('#msg').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Pengguna Berhasil Ditambah.</div>");
					$('#form').trigger("reset");
					$('#detailModal').on('hidden.bs.modal', function () {
						 location.reload();
						});
			}
		});
			return false;
	});

	$(document).ready(function(){
		$(".hapus").click(function(){
			var id = $(this).data('id');

			$(".modal-body #mod").text(id);

		});

	});

	$(document).ready(function(){
		$("#oke").click(function(){
			var id = $("#mod").text();

			var data = 'id='+id;

			$.ajax({
				url : "<?php echo base_url('index.php/User/hapus');?>",
				type: "POST",
				data: data,
				dataType : 'html',
				cache:false,
				success:function(data){
					location.reload();
				}
			});

		});
	});

	$(document).ready(function(){
		$(".ubah").click(function(){
			var id = $(this).data('id');

			$(".modal-body #user").text(id);
			document.getElementById("usertxt").value = id;

		});

	});

	$(document).ready(function(){
		$("#ubah").click(function(){
			var user = document.getElementById("usertxt").value;
			var level = $('#level').find(":selected").val();
			var data = {'user':user, 'level':level};

			$.ajax({
				url : "<?php echo base_url('index.php/User/ubah');?>",
				type: "POST",
				data: data,
				dataType : 'html',
				cache:false,
				success:function(data){
					$('#msg-ubah').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Data Berhasil Diperbarui.</div>");
					$('#formubah').trigger("reset");
					$('#ubahModal').on('hidden.bs.modal', function () {
						 location.reload();
						});
				}
			});

		});
	});
</script>

