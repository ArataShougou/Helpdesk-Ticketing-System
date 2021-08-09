
<style>
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
		<li class="active">Penerimaan Tiket</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Penerimaan Tiket</h4>
			</div>
			<div class="panel-body">
				<table id='tabledata' class="table table-hover"  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="id_tiket" > ID Tiket</th>
							<th data-field="tgl_tiket" >Tanggal Tiket</th>
							<th data-field="pelapor" >Pelapor</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($tabel as $row) : $no++; ?>
						<tr>
							<td><a class="tiketid" href="#" data-toggle="modal" data-target="#detailModal" data-id="<?php echo $row['id_tiket']; ?>"><?php echo $row['id_tiket']; ?></a></td>
							<td><?php echo $row['tgl_tiket']; ?></td>
							<td><?php echo $row['pelapor']; ?></td>
							<!-- <td><?php echo $row->progress;?></td> -->
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>


<div id="detailModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		
		<div class="modal-content">
			<div class="modal-header">
				<ol class="breadcrumb">
					<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
					<li class="active">Detil Penerimaan</li>
				</ol>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<ul class="list-group" id="listdetailtiket"></ul>
					<ul class="list-group" id="historytiket"></ul>
					<label class="list-group-item active">Aksi</label>
					<ul class="list-group-item">
						<button class="approvebtn btn btn-success" data-id="<?php echo $row['id_tiket'];?>" value="3">Terima</button>
						<button  class="approvebtn btn btn-danger" data-id="<?php echo $row['id_tiket'];?>" value="2">Tolak</button>
					</ul>
				</br>
					<div>
					<label class='list-group-item active'for="pesan"><i class='far fa-comment-dots'></i>&nbsp;Chat</label>
					<ul class="list-group" id="pesan" style="height:200px;overflow: hidden;overflow-y:scroll;"></ul>
					<textarea id="textpesan" class="form-control" cols="20" rows="2"></textarea>
					<button id="chatbtn" type="button" class="btn btn-default">Kirim</button>
				</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" style="display: none;">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(e){
			CKEDITOR.replace('textpesan');

		});

		$(document).ready(function() {
			$("#chatbtn").click(function(){
				var id = $('#id_tiket').data("info");
				var pesan = CKEDITOR.instances.textpesan.getData();
				var data = {'id':id,'pesan':pesan};
				$.post("<?php echo base_url('index.php/ListTiket/submit_message');?>",
					{'id':id,'pesan':pesan},
					function(data,status) {
						document.getElementById("textpesan").value = " ";
						$.get("<?php echo site_url("ListTiket/getPesan") ?>",{id:id},function(data,status){
							$("ul#pesan").html(data);
							CKEDITOR.instances.textpesan.setData('');
							document.getElementById("textpesan").value="";
							$("ul#pesan").animate({scrollTop: $('ul#pesan').prop("scrollHeight")}, 1000);
						})
					})
			});

		})

		$(document).ready(function(){
			$(".tiketid").click(function(){
				var id = $(this).data("id");
				$.get("<?php echo site_url("ApprovalTiket/getDataById") ?>",{id:id},function(data,status){
					$("#listdetailtiket").html(data);
				})

				$.get("<?php echo site_url("ApprovalTiket/getHistory") ?>",{id:id},function(data,status){
					$("#historytiket").html(data);
				})
				$.get("<?php echo site_url("ApprovalTiket/getPesan") ?>",{id:id},function(data,status){
					$("ul#pesan").html(data);
				})
			})
		})

		$(document).ready(function(){
			$(".approvebtn").click(function(){
				var id = $('#id_tiket').data('info');
				var st = $(this).val();
				var data = {'id':id,'data':st};

				$.ajax({
					type:'post',
					datatype:'json',
					url : "<?php echo base_url('index.php/ApprovalTiket/Approve')?>",
					data :data,
					success: function(){
						location.reload();
					},
					error:function(){
						alert('Error');
					}
				})
			})
		})
	</script>
