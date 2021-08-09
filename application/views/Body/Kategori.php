
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
		<li class="active">Daftar Kategori</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Daftar Kategori</h4>
			</div>
			<div class="panel-body">
				<div><a id="modal-detil" href="#" data-toggle="modal" data-target="#detailModal"><i class="fas fa-folder-plus fa-lg"></i>&nbsp;Tambah Kategori</a></div>
				<table id='tabledata' class="table   table-hover"  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th class=".col-" data-field="id_tiket" data-sortable="true"> No</th>
							<th data-field="tgl_tiket" data-sortable="true">Kategori</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($kategori_list as $row) : $no++;?>
						<tr>
							<td id="id"><?php echo $no; ?></td>
							<td><?php echo $row['nama_kategori']; ?></td>
							<td> 
								<a class="ubah btn btn-primary btn-xs" id="modal-ubah" href="#" data-toggle="modal" data-target="#ubahModal" data-id="<?php echo $row['id_kategori'];?>" data-info="<?php echo $row['nama_kategori'];?>"><span class="glyphicon glyphicon-edit" ></span></a>
								<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row['id_kategori'];?>"><span class="glyphicon glyphicon-trash"></span></a>
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
					<li class="active">Kategori Baru</li>
				</ol>
			</div>
			<div class="modal-body">
				<form action="<?php echo site_url('Kategori')?>" class="form-horizontal" method="post" id="form">
					<div class="form-group row">
						<label class="col-sm-4 col-form-label">Nama Kategori : </label>
						<div class=" col-sm-4">
						<input type="text" name="Kategori" class="form-control" id="txtKategori">
					</div>
					<div class=" col-sm-4">
						<button type="submit" class="btn btn-primary">Tambah</button>
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

<div class="modal fade" id="ubahModal" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Ubah Kategori</li>
				</ol>
			</div>
			<div class="modal-body">
				<form  class="form-horizontal" method="post" id="formubah">
					<div class="list-group">
						<label class="col-sm-4 col-form-label">Nama Kategori: </label>
						<input type="hidden" name="Kategori" id="idKategori2">
						<div class=" col-sm-4">
						<input type="text" class="form-control" name="Kategori" id="txtKategori2">
						</div>
						<div class=" col-sm-4">
						<button type="button" class="btn btn-primary" id="simpan">Simpan</button>
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
				url : "<?php echo base_url('index.php/Kategori/hapus');?>",
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
			var id = document.getElementById("idKategori2").value;
			var nama = document.getElementById("txtKategori2").value;
			var data = {'id':id, 'nama':nama};

			$.ajax({
				url : "<?php echo site_url('Kategori/ubah');?>",
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
		var data = document.getElementById("txtKategori").value;  
		$.post("<?php echo site_url("Kategori/addNew"); ?>",
			{data: data},
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
			document.getElementById("txtKategori2").value = name;
			document.getElementById("idKategori2").value = id;

		});

	});

</script>

