<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Login</title>
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<link  href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
	<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/util.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.7.0/css/font-awesome.min.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>fonts/font-awesome-4.7.0/css/font-awesome.css" >
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">






	

</head>
<body>


<?php echo $this->session->flashdata("msg");?>

		
	<div class="limiter">
			<?php  
				            // fungsi untuk menampilkan pesan
				            // jika alert = "" (kosong)
				            // tampilkan pesan "" (kosong)
				            if (empty($_GET['alert'])) { ?>
				              	<div></div>
				            <?php
				            }
				            // jika alert = 1
				            // tampilkan pesan Gagal "username atau password salah, cek kembali username dan password Anda"
				            elseif ($_GET['alert'] == 1) { ?>
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong><i class="ace-icon fa fa-times-circle"></i> Gagal Login! </strong><br>
									username atau password salah, cek kembali username dan password Anda.
									<br>
								</div>
							<?php
							} 
							// jika alert = 2
				            // tampilkan pesan Sukses "Anda telah berhasil logout"
				            elseif ($_GET['alert'] == 2) { ?>
					        	<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>
									</button>
									<strong><i class="ace-icon fa fa-check-circle"></i> Sukses! </strong><br>
									Anda telah berhasil logout.
									<br>
								</div>
				            <?php
				            }
				            ?>
		<div class="container-login100">
<!-- 
			<div class="login100-more" style="background-image: url(<?php echo base_url();?>images/Helpdesk.jpg);background-size: cover;background-repeat: no-repeat;background-position: center;"></div> -->
			<img class="login100-more" style="background-size: cover;" src="<?php echo base_url();?>images/Helpdesk.jpg">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action="<?php echo site_url('login/login');?>" method="POST">
					<span class="login100-form-title p-b-59">
						<h2>LOGIN</h2>
					</span>
					<br>
					<br>

					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
					</div>

				<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
					<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					

					

				

							<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Sign in
						</button>
					</div>
						<br>
					</br>
				</form>
				</div>
			</div>
		</div>
	</div>
	
	<script>
	
		(function ($){
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })


    /*==================================================================
    [ Validate after type ]*/
    $('.validate-input .input100').each(function(){
        $(this).on('blur', function(){
            if(validate(this) == false){
                showValidate(this);
            }
            else {
                $(this).parent().addClass('true-validate');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
           $(this).parent().removeClass('true-validate');
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    


})(window.jQuery);

	</script>
	
</body>
</html>
