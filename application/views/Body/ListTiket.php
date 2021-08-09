<?php echo $this->session->flashdata("msg");?>

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

</style>
<?php  
if ($this->session->userdata('level')=="ADMIN") { ?>
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Daftar Tiket</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Daftar Tiket <span><a href="<?php echo site_url('ListTiket/printListTiket');?>" class="btn btn-danger">PDF</a></span></h4>
				</div>
				<div class="panel-body">
					<table id='tabledata' class="table table-hover "  data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="false" data-sort-name="name" data-sort-order="desc">

						<thead>
							<tr>
								<th data-field="id_tiket" data-sortable="true"> ID Tiket</th>
								<th data-field="tgl_tiket" data-sortable="true">Tanggal Tiket</th>
								<th data-field="pelapor" data-sortable="true">Pelapor</th>
								<th data-field="status" data-sortable="true">Status</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0; foreach($tabel as $row) : $no++; ?>
							<tr>
								<td><a class="tiketid" href="#" data-toggle="modal" data-target="#detailModal" data-id="<?php echo $row['id_tiket']; ?>"><?php echo $row['id_tiket']; ?></a></td>
								<td><?php echo $row['tgl_tiket']; ?></td>
								<td><?php echo $row['pelapor']; ?></td>
								<td><?php echo $row['nm_status']; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php }else if ($this->session->userdata('level')=="USER") { ?>
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Tiket Saya</li>
		</ol>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Tiket Saya <span><a href="<?php echo site_url('ListTiket/printListTiket');?>" class="btn btn-danger">PDF</a></span></h4>
				</div>
				<div class="panel-body">
					<table id='tabledata' class="table table-hover "  data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="id_tiket" data-sortable="true"> ID Tiket</th>
								<th data-field="tgl_tiket" data-sortable="true">Tanggal Tiket</th>
								<th data-field="status" data-sortable="true">Status</th>
								<th data-field="progress" data-sortable="true">Progress (%)</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0; foreach($tabel as $row) : $no++; ?>
							<tr>
								<td><a class="tiketid" href="#" data-toggle="modal" data-target="#detailModal" data-id="<?php echo $row['id_tiket']; ?>"><?php echo $row['id_tiket']; ?></a></td>
								<td><?php echo $row['tgl_tiket']; ?></td>
								<td><?php echo $row['nm_status']; ?></td>
								<td><?php echo $row['progress'].'%'; ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<!-- Modal -->
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
				<ul class="list-group" id="listdetailtiket">
				</ul>

				<ul class="list-group" id="historytiket">
				</ul>

				<ul class="list-group" id="teknisitiket">
				</ul>
				<div id='msg'></div>
				<?php 
				if ($this->session->userdata('level')=="ADMIN") {?>
					<label >Pilih Teknisi</label>
					<div  class="row" id="setTeknisi">
						<div class="col-sm-9">
							<?php echo form_dropdown('id_teknisi',$dd_teknisi," " , ' id="id_teknisi" required class="form-control" name="id_teknisi"'); ?>
						</div>
						<div class="col-sm-3">
							<button id="teknisibtn" type="button" class="btn btn-primary">Update</button>
						</div>
					</div>
				<?php }?>
				
				</br>
				<?php 
				if ($this->session->userdata('level')=="USER") {
					echo "<div id='feedbackbtn'></div>";
				}?>

				<div>
					<label class='list-group-item active'for="pesan"><i class='far fa-comment-dots'></i>&nbsp;Chat</label>
					<ul class="list-group" id="pesan" style="height:200px;overflow: hidden;overflow-y:scroll;"></ul>
					<textarea id="textpesan" class="form-control" cols="20" rows="2"></textarea>
					<button id="chatbtn" type="button" class="btn btn-default">Kirim</button>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script>

		$(document).ready(function(e){
			CKEDITOR.replace('textpesan');

		});
		$(document).ready(function() {
				for (instance in CKEDITOR.instances) {
				CKEDITOR.instances[instance].updateElement();
			}
			$("#chatbtn").click(function(){
				var id = $('#id_tiket').data("info");
				var pesan = CKEDITOR.instances.textpesan.getData();
				var data = {'id':id,'pesan':pesan};
				$.post("<?php echo base_url('index.php/ListTiket/submit_message');?>",
					{'id':id,'pesan':pesan},
					function(data,status) {
						$.get("<?php echo site_url("ListTiket/getPesan") ?>",{id:id},function(data,status){
							$("ul#pesan").html(data);
							CKEDITOR.instances.textpesan.setData('');
							document.getElementById("textpesan").value="";
							$("ul#pesan").animate({scrollTop: $('ul#pesan').prop("scrollHeight")}, 1000);
						});
					});
			});

		})
		
		$(document).ready(function(){
			$(".tiketid").click(function(){
				var id = $(this).data("id");
				$.get("<?php echo site_url("ListTiket/getDataById") ?>",{id:id},function(data,status){
					$("#listdetailtiket").html(data);
				})

				$.get("<?php echo site_url("ListTiket/getHistory") ?>",{id:id},function(data,status){
					$("#historytiket").html(data);
				})
				$(document).ready(function(){
					$('#feedbackbtn').html("<label class='list-group-item active'><i class='fas fa-flag'></i>&nbsp;Feedback</label> <li class='list-group-item'><button type='button' class='btn btn-success' onclick='sendFeedback(this.value)' value='Positif'><i class='fas fa-plus-circle'></i></button> <button type='button' class='btn btn-danger'onclick='sendFeedback(this.value)' value='Negatif'><i class='fas fa-minus-circle'></i></button></li></br>");
				});
				$('#detailModal').on('shown.bs.modal', function (e) {
					var id = $('#id_tiket').data("info");
					
				})
				$.get("<?php echo site_url("ListTiket/getPesan") ?>",{id:id},function(data,status){
					$("ul#pesan").html(data);
				})
			})
		})

		function sendFeedback(id){
			var idtiket = $('#id_tiket').data('info');
			var data = {'feed':id,'id':idtiket};
			$.ajax({
				type:'post',
				url : "<?php echo base_url('index.php/ListTiket/Feedback')?>",
				data : data,
				success: function(){
					$('#msg').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Terimakasih Telah Memberikan Feedback.</div>");
				},
				error:function(){
					$('#msg').html("<div class='alert bg-danger' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Error, Gagal membuat tiket.</div>");
				}

			});
			return false;
		}
		$(document).ready(function(){
		$("#teknisibtn").click(function(){
			var id = $('#id_tiket').data('info');
			var Teknisi = $('#id_teknisi').find(":selected").val();
			$.post("<?php echo site_url("AssignmentTiket/updateTeknisi") ?>",
				{id:id, teknisi:Teknisi},
				function(data,status){
					if (status=='success') {
						$('#setTeknisi').remove();
					$('#msg').html("<div class='alert bg-success' role='alert' style='border-radius:0;'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Teknisi Updated.</div>");
					}
				});
			return false;
		});
	});

	</script>