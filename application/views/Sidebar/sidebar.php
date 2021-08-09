<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<ul class="nav menu">

		<?php if ($this->session->userdata('level')=="ADMIN"){?>

			<li class="active">
				<a href="<?php echo base_url();?>index.php/home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a>
			</li>
			<li class="active">
				<a href="<?php echo base_url();?>index.php/ListTiket/AllTiket">
					<svg class="glyph stroked notepad "><use xlink:href="#stroked-notepad"/></svg> Daftar Tiket <span class="badge badge-light"><?php if(empty($jml_list_ticket)) { echo "0"; }else{ echo( $jml_list_ticket);} ?> </span>
				</a>
			</li>
			<li class="active">
				<a href="<?php  echo base_url('index.php/ApprovalTiket');?>">
					<svg class="glyph stroked email"><use xlink:href="#stroked-email"/></svg><use xlink:href="#stroked-male-user"></use></svg> Penerimaan Tiket <span class="badge badge-light"><?php if(empty($jml_approval_ticket)) { echo "0"; }else{ echo( $jml_approval_ticket);} ?></span> 
				</a>
			</li>
			<li class="active">
				<a href="<?php  echo base_url('index.php/AssignmentTiket');?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Tugas Tiket <span class="badge badge-light"><?php if(empty($jml_assigment_ticket)) { echo "0"; }else{ echo( $jml_assigment_ticket);} ?></span></a>
			</li>
			<li class="active">
				<a href="<?php  echo base_url('index.php/User');?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-male-user"/></svg> Pengguna
				</a>
			</li>
			<!-- <li class="active">
				<a href="<?php echo base_url('index.php/Kategori');?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-app-window"></use></svg> Kategori</a>
			</li> -->
			<li class="active">
				<a href="<?php echo base_url('index.php/Masalah');?>"><svg class="glyph stroked calendar"><use xlink:href="#stroked-app-window"></use></svg> Masalah</a>
			</li>



		<?php }else if($this->session->userdata('level')=="TEKNISI"){?>

			<li class="active">
				<a href="<?php echo base_url();?>index.php/home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a>
			</li>

			<li class="active">
				<a href="<?php echo base_url('index.php/AssignmentTiket/MyAssignment') ?>"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg> Tugas Tiket <span class="badge badge-light"><?php if(empty($jml_Assignment_ticket_teknisi)) { echo "0"; }else{ echo( $jml_Assignment_ticket_teknisi);} ?> </span>
				</a>
			</li>


		<?php }else if($this->session->userdata('level')=="USER"){?>

			<li class="active">
				<a href="<?php echo base_url();?>index.php/home"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Beranda</a>
			</li>

			<li class="active">
				<a href="<?php echo base_url('index.php/NewTiket') ?>"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg> Buat Tiket
				</a>
			</li>

			<li class="active">
				<a href="<?php echo base_url('index.php/ListTiket/MyTiket') ?>"><svg class="glyph stroked open letter"><use xlink:href="#stroked-open-letter"/></svg> Tiket Saya <span class="badge badge-light"><?php if(empty($jml_my_ticket)) { echo "0"; }else{ echo( $jml_my_ticket);} ?></span>
				</a>
			</li>

		<?php }?>
	</ul>
</div><!--/.sidebar-->