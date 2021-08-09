
<style type="text/css">
/*.modal-header .close {
	display: none;
	}*/

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
		<li class="active">Daftar Masalah</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Daftar Masalah</h4>
			</div>
			<div class="panel-body">
				<div><a id="modal-detil" href="#" data-toggle="modal" data-target="#detailModal"><i class="fas fa-folder-plus fa-lg"></i>&nbsp;Tambah Masalah</a></div>
				<table id='tabledata' class="table   table-hover"  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th class=".col-" data-field="no" data-sortable="true"> No</th>
							<th data-field="nama" data-sortable="true">Masalah</th>
							<th data-field="pma" data-sortable="true">Point</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($Masalah_list as $row) : $no++;?>
						<tr>
							<td id="id"><?php echo $no; ?></td>
							<td><?php echo $row['Masalah']; ?></td>
							<td><?php echo $row['Point']; ?></td>
							<td> 
								<a class="ubah btn btn-primary btn-xs" id="modal-ubah" href="#" data-toggle="modal" data-target="#ubahModal" data-id="<?php echo $row['id_masalah'];?>" data-info="<?php echo $row['Masalah'];?>"><span class="glyphicon glyphicon-edit" ></span></a>
								<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row['id_masalah'];?>"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
					<?php endforeach ?>

				</tbody>
			</table>
		</div>
	</div>
</div>
</div>


<div class="modal fade" id="detailModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Masalah Baru</li>
				</ol>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('Masalah')?>" class="form-horizontal" method="post" id="form">
					<div class="form-group">
						<label class="col-sm-3 col-form-label">Nama Masalah : </label>
						<div class=" col-sm-4">
							<input type="text" name="Masalah" class="form-control" id="txtMasalah">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 col-form-label">Point :</label>
						<div class=" col-sm-4">
							<select class="form-control" name="poin" id="sltPoint">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>
					<div class=" col-sm-4">
						<button type="submit" class="btn btn-primary">Tambah</button>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ubahModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Ubah Masalah</li>
				</ol>
			</div>
			<div class="modal-body">
				<form  class="form-horizontal" method="post" id="formubah">
					<div class="list-group">
						<div class="form-group">
							<label class="col-sm-4 col-form-label">Nama Masalah: </label>
							<input type="hidden" name="Masalah" id="idMasalah2">
							<div class=" col-sm-4">
								<input type="text" class="form-control" name="Masalah" id="txtMasalah2">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 col-form-label">Point :</label>
							<div class=" col-sm-4">
								<select class="form-control" name="poin" id="sltPoint2">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="simpan">Simpan</button>
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
				Anda yakin akan menghapus data dengan ID  : (<span id="mod"></span>) ?
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-primary" id="oke">Ya </button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close </button>
			</div>
		</div>

	</div>
</div>

<script>
	$(document).ready(function(){
		$("#oke").click(function(){
			var id = $("#mod").text();

			var data = 'id='+id;

			$.ajax({
				url : "<?php echo base_url('index.php/Masalah/hapus');?>",
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
		$("#simpan").click(function(){
			var id = document.getElementById("idMasalah2").value;
			var nama = document.getElementById("txtMasalah2").value;
			var point = document.getElementById("sltPoint2").value;
			var data = {'id':id, 'nama':nama, 'point':point};

			$.ajax({
				url : "<?php echo site_url('Masalah/ubah');?>",
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
</script>

<script>
	$("form").submit(function(){
		var data = document.getElementById("txtMasalah").value;
		var point = document.getElementById("sltPoint").value;  
		$.post("<?php echo site_url("Masalah/addNew"); ?>",
			{data: data, point:point},
			function(data,status){
				alert("Berhasil ditambahkan " + status);
				location.reload(true);
			})
	});

	$(document).ready(function(){

		$(".hapus").click(function(){
			var id = $(this).data('id');

			$(".modal-body #mod").text(id);

		});

	});

	$(document).ready(function(){

		$(".ubah").click(function(){
			var name = $(this).data('info');
			var id = $(this).data('id');
			document.getElementById("txtMasalah2").value = name;
			document.getElementById("idMasalah2").value = id;

		});

	});

</script>

