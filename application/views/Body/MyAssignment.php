
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
		<li class="active">Tugas Tiket</li>
	</ol>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Tugas Tiket</h4>
			</div>
			<div class="panel-body">
				<table id='tabledata' class="table   table-hover"  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
					<thead>
						<tr>
							<th data-field="id_tiket" data-sortable="true"> ID Tiket</th>
							<th data-field="tgl_tiket" data-sortable="true">Tanggal Tiket</th>
							<th data-field="pelapor" data-sortable="true">Pelapor</th>
							<th data-field="prioritas" data-sortable="true">SLA</th>
							<th data-field="status" data-sortable="true">Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 0; foreach($tabel as $row) : $no++;?>
						<tr>
							<td><a class="tiketid" href="#" data-toggle="modal" data-target="#detailModal" data-id="<?php echo $row['id_tiket']; ?>"><?php echo $row['id_tiket']; ?></a></td>
							<td><?php echo $row['tgl_tiket']; ?></td>
							<td><?php echo $row['pelapor']; ?></td>
							<td><?php echo $row['prioritas'];?></td>
							<td><?php echo $row['nm_status'];?></td>
							
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
					<li class="active">Detil Tiket</li>
				</ol>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<ul class="list-group" id="listdetailtiket"></ul>
					<ul class="list-group" id="historytiket"></ul>
					<!-- Teknisi input -->

					<div id='msg'></div>
					<div class="row">
						<label class="col-sm-6">Update Status</label>
						<label class="col-sm-6">Estimasi Penyelesaian(Day)</label>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php echo form_dropdown('id_status',$dd_status," " , ' id="id_status" required class="form-control" name="id_status"'); ?>
						</div>
						<div class="col-sm-6">
							<select class="form-control" id="estdd">
								<option value="0">-- PILIH --</option>
								<?php
								$i = 1;
								while($i<=7){?>
									<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php $i++;}?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3">
							<button type="button" class="btn btn-primary" id="progressbtn">Update</button>
						</div>
					</div>
					<div>
						<label>Progress</label>
						<div class="progress"></div>
					</div>
					<div>
						<label class='list-group-item active'for="pesan"><i class='far fa-comment-dots'></i>&nbsp;Chat</label>
						<ul class="list-group" id="pesan" style="height:200px;overflow: hidden;overflow-y:scroll;"></ul>
						<textarea id="textpesan" class="form-control" cols="20" rows="2"></textarea>
						<button id="chatbtn" type="button" class="btn btn-default">Kirim</button>
					</div>
				</div>
				<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
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
						CKEDITOR.instances.textpesan.setData('');
						$.get("<?php echo site_url("ListTiket/getPesan") ?>",{id:id},function(data,status){
							$("ul#pesan").html(data);
							$("ul#pesan").animate({scrollTop: $('ul#pesan').prop("scrollHeight")}, 1000);
						});
					});
			});

		});

		$(document).ready(function(){
			$(".tiketid").click(function(){
				var id = $(this).data("id");
				$.get("<?php echo site_url("AssignmentTiket/getDataById") ?>",{id:id},function(data,status){
					$("#listdetailtiket").html(data);
				})

				$.get("<?php echo site_url("AssignmentTiket/getHistory") ?>",{id:id},function(data,status){
					$("#historytiket").html(data);
				})
				$.get("<?php echo site_url("AssignmentTiket/getProgress") ?>",{id:id},function(data,status){
					$(".progress").html(data);
				})
				$('#detailModal').on('shown.bs.modal', function (e) {
					var id = $('#id_tiket').data("info");
					var idst = $('#idstatus').data('info');
					for (var i = 6; i < idst+1; i++) {
						$("#id_status option[value="+i+"]").hide();
					}	
				})
				$.get("<?php echo site_url("AssignmentTiket/getPesan") ?>",{id:id},function(data,status){
					$("ul#pesan").html(data);
				})
				$('#detailModal').on('hide.bs.modal', function (e) {
					var idst = $('#idstatus').data('info');
					for (var i = 6; i < idst+1; i++) {
						$("#id_status option[value="+i+"]").show();
					}
				})
			})
		})

		
		$(document).ready(function(){
			$("#progressbtn").click(function(){
				var id = $('#id_tiket').data('info');
				var st= $('#id_status').find(":selected").val();
				var est= $('#estdd').find(":selected").val();
				if(st!=""){
					$.post("<?php echo site_url("AssignmentTiket/UpdateStByTeknisi") ?>",
					{id:id, st:st, est:est},
					function(data,status){
						if (status=='success') {
							location.reload();
						}
					})
				}else{
					alert("Status Kosong");
				}
				
			})
		})




	</script>

