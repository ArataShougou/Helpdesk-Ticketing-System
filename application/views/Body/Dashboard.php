		

<style>
	
.widget-left {

	border-radius: 0;	
}

.page-header{
	margin: 0;
}

.panel{
	margin-top: 10px;
}

/*.easypiechart {

margin: 20px auto 5px auto;
}*/
</style>		
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Beranda <Strong><?php echo $this->session->userdata('level');?></Strong></li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Halo, <Strong><?php echo $this->session->userdata('nama');?></Strong></h1>
	</div>
</div><!--/.row-->


<?php if($this->session->userdata('level') === "USER"){ ?>
<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-ticket-alt fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo  $jml_tiket_user;?></div>
					<div class="text-muted">Total Tiket</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-tasks fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_tiket_diproses;?></div>
					<div class="text-muted">Tiket Diproses</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-check fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_tiket_selesai;?></div>
					<div class="text-muted">Tiket Selesai</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-3">
		<div class="panel panel-red panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
				<i class="far fa-window-close fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					 <div class="large"><?php echo $jml_tiket_ditolak;?></div>
					<div class="text-muted">Tiket Ditolak</div>
				</div>
			</div>
		</div>
	</div>

</div>




 <div class="row">
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-teal panel-widget">
				<div class=" widget-left">
				<i class="fas fa-plus-circle fa-3x"></i>
				</div>
			<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_feedback_positiv;?>" ><span class="percent"><?php echo ceil($jml_feedback_positiv);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Umpan Balik</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-red panel-widget">
				<div class=" widget-left">
				<i class="fas fa-minus-circle fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_feedback_negativ;?>" ><span class="percent"><?php echo ceil($jml_feedback_negativ);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Umpan Balik</div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->

<?php } ?>
<!--/.row-->

<?php if($this->session->userdata('level') === "ADMIN"){?>

<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-ticket-alt fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo  $jml_tiket_admin;?></div>
					<div class="text-muted">Total Tiket</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-user fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_user;?></div>
					<div class="text-muted">Total Pengguna</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-user-cog fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_teknisi;?></div>
					<div class="text-muted">Total Teknisi</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-xs-6 col-md-3">
	<div class="panel panel-blue panel-widget">
				<div class=" widget-left">
				<i class="fas fa-check fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $jml_presentase_tiket_selesai;?>" ><span class="percent"><?php echo ceil($jml_presentase_tiket_selesai);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Tiket Selesai</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
	<div class="panel panel-orange panel-widget">
				<div class=" widget-left">
				<i class="fas fa-tasks fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $jml_presentase_tiket_proses;?>" ><span class="percent"><?php echo ceil($jml_presentase_tiket_proses);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Tiket Diproses</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
	<div class="panel panel-teal panel-widget">
				<div class=" widget-left">
				<i class="fas fa-vote-yea fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_presentase_tiket_approval;?>" ><span class="percent"><?php echo ceil($jml_presentase_tiket_approval);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Tiket Menunggu Penerimaan</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-3">
	<div class="panel panel-red panel-widget">
				<div class=" widget-left">
				<i class="far fa-window-close fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_presentase_tiket_ditolak;?>" ><span class="percent"><?php echo ceil($jml_presentase_tiket_ditolak);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Tiket Ditolak</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fas fa-plus-circle fa-3x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_positiv_All);?>%</div>
							<div class="text-muted">Umpan Balik</div>
						</div>
					</div>
				</div>

			</div>


			<div class="col-xs-6 col-md-6">
				

				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<i class="fas fa-minus-circle fa-3x"></i>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo ceil($jml_feedback_negativ_All);?>%</div>
							<div class="text-muted">Umpan Balik</div>
						</div>
					</div>
				</div>

			</div>			

		</div><!--/.row-->

<!--/.row-->
<?php } ?>


<?php if($this->session->userdata('level') === "TEKNISI"){ ?>

	<div class="row">
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-blue panel-widget ">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-clipboard-list fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					 <div class="large"><?php echo  $jml_tugas_teknisi;?></div>
					<div class="text-muted">Total Tugas</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-orange panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-tasks fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_tugas_diproses_teknisi;?></div> 
					<div class="text-muted">Tiket Diproses</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-6 col-lg-4">
		<div class="panel panel-teal panel-widget">
			<div class="row no-padding">
				<div class="col-sm-3 col-lg-5 widget-left">
					<i class="fas fa-check fa-3x"></i>
				</div>
				<div class="col-sm-9 col-lg-7 widget-right">
					<div class="large"><?php echo $jml_tugas_selesai_teknisi;?></div>
					<div class="text-muted">Tiket Selesai</div>
				</div>
			</div>
		</div>
	</div>

</div>




 <div class="row">
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-teal panel-widget">
				<div class=" widget-left">
				<i class="fas fa-plus-circle fa-3x"></i>
				</div>
			<div class="panel-body easypiechart-panel">
				 <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo $jml_feedback_positiv_All;?>" ><span class="percent"><?php echo ceil($jml_feedback_positiv_All);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Umpan Balik</div>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-md-6">
		<div class="panel panel-red panel-widget">
				<div class=" widget-left">
				<i class="fas fa-minus-circle fa-3x"></i>
				</div>
				<div class="panel-body easypiechart-panel">
				<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $jml_feedback_negativ_All;?>" ><span class="percent"><?php echo ceil($jml_feedback_negativ_All);?>%</span></div>
				<div class="text-muted" style="color:#9fadbb;">Umpan Balik</div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->

<?php } ?>


</div><!--/.col-->
</div><!--/.row-->
	</div>	<!--/.main-->