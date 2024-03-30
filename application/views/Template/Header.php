<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DCS - Online Shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="<?php echo base_url();?>assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<!-- notyf css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/notyf.min.css">
	<!-- notyf js -->
	<script src="<?php echo base_url() ?>assets/js/notyf.min.js"></script>
	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/lib/jquery/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<script>
		var API = "http://localhost/API/";
		var web = "http://localhost/web/";
	</script>
</head>

<body>
	<div class="modal" id="lankaQrModal">
	  <div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<div class="col-md-12" style="text-align:center">
				<h4 class="">OTP Verification</h4>
				<p class="m-0" id="countDown">60</p>
				
			</div>
			
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal Body -->
		  <div class="modal-body">
			<input class="form-control" type="hidden" placeholder="OTP Code" id="user_id">
			<input class="form-control" type="text" placeholder="OTP Code" id="modalInput">
		  </div>

		  <!-- Modal Footer -->
		  <div class="modal-footer">
			<button type="button" id="modalSubmitBtn" class="btn btn-primary" data-dismiss="modal">Submit</button>
		  </div>

		</div>
	  </div>
	</div>
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <!--div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">About</a>
                    <a class="text-body mr-3" href="">Contact</a>
                    <a class="text-body mr-3" href="">Help</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div-->
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
					<button style="display:none;" class="btn btn-sm btn-dark" id="customerName"></button>
                    <div class="btn-group">
						
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">My Account</button>
                        <div class="dropdown-menu dropdown-menu-right" style="min-width:18rem">
							<div class="col-md-12" id="loggedOutDiv">
								<!--div class="row col-md-12 mb-2">
									<button class="col-md-12 ml-3" type="button" id="profileBtn">My Profile</button>
								</div-->
								
								<form name="sentMessage" id="contactForm"  novalidate="novalidate">
									<div class="control-group">
										<input type="text" class="form-control" id="username" placeholder="email" required="required" data-validation-required-message="Please enter your name" autocomplete="off" aria-invalid="false">
										<p class="help-block text-danger"></p>
									</div>
									<div class="control-group">
										<input type="password" class="form-control" id="password" placeholder="Password" required="required" data-validation-required-message="Please enter your email">
										<p class="help-block text-danger"></p>
									</div>
								</form>
								<div class="row col-md-12 mb-2">
									<a  class="col-md-12 ml-3 btn btn-default" style="background: gold;color: black;" type="button" id="signInBtn">Sign in</a>
								</div>
								<div class="row col-md-12 mb-2">
									<a href="http://localhost/web/Register" class="col-md-12 ml-3 btn btn-default" style="background: gold;color: black;" type="button" id="signOutBtn">Sign up</a>
								</div>
								<a href="http://localhost/web/PassReset" class="text-decoration-none">Reset Password</a>
							
							</div>
							<div class="col-md-12" id="loggedInDiv" style="display:none">
								<!--div class="row col-md-12 mb-2">
									<button class="col-md-12 ml-3" type="button" id="profileBtn">My Profile</button>
								</div-->
								<div class="row col-md-12 mb-2">
									<button class="col-md-12 ml-3" type="button" style="background: gold;" id="logOutBtn">Logout</button>
								</div>	
								
								<a href="http://localhost/web/PassReset" class="text-decoration-none">Reset Password</a>
							
							</div>
                        </div>
                    </div>
                    <div class="btn-group mx-2">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">LKR</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">LKR</button>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">EN</button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <button class="dropdown-item" type="button">EN</button>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex align-items-center d-block d-lg-none">
                    <a href="" class="btn px-0 ml-2">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <span class="badge text-dark border border-dark rounded-circle" style="padding-bottom: 2px;">0</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="<?php echo base_url();?>" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2"><?php echo $company_name;?></span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Enterprices</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <!--form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form-->
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Customer Service</p>
                <h5 class="m-0"><?php echo $company_contact;?></h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100" id="categoryDropDown">
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2"><?php echo $company_name;?></span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Online Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?php echo base_url()?>" class="nav-item nav-link active">Home</a>
                            <a href="<?php echo base_url().'Shop';?>" class="nav-item nav-link">Shop</a>
                            <!--a href="<?php echo base_url().'Product';?>" class="nav-item nav-link">Shop Detail</a-->
							<a href="<?php echo base_url().'Cart';?>" class="nav-item nav-link">Shopping Cart</a>                            
                            <!--a href="<?php echo base_url().'Contact';?>" class="nav-item nav-link">Contact</a-->
                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                            <a href="http://localhost/web/Cart" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i>
                                <span class="badge text-secondary border border-secondary rounded-circle cartCount" style="padding-bottom: 2px;">0</span>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->



<script>
function loadCategories(){
	$.ajax({
		type: "POST",
		cache : false,
		async: true,
		dataType: "json",
		url: API+"ItemCategory/fetch_all_active",
		success: function(data, result){
			console.log(data);
			var catDivHTML = '';
			
			$.each(data, function(index, item) {
				
				catDivHTML = '<a href="<?php echo base_url();?>Shop" class="nav-item nav-link">'+item.category_name+'</a>';
				
				$('#categoryDropDown').append(catDivHTML);
				
			});
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {						
			
			//console.log(errorThrown);
		}
	});
}
loadCategories();
var cartArr = [];

if(localStorage.getItem("customer_name") != null){
	$('#customerName').html('Welcome back '+localStorage.getItem("customer_name"));
	$('#customerName').css("display", "block");
	$('#loggedInDiv').css("display", "block");
	$('#loggedOutDiv').css("display", "none");
	
	if(localStorage.getItem("cartArr") != null ){
		cartArr = JSON.parse(localStorage.getItem("cartArr"));
		cartArr = getUniqueListBy(cartArr, 'item_id')

		function getUniqueListBy(arr, key) {
			return [...new Map(cartArr.map(item => [item[key], item])).values()]
		}

		console.log(cartArr);
		$('.cartCount').html(cartArr.length);
	}
	
}

$(document).on('click', '.addToCart', function(){
		if(localStorage.getItem("customer_name") == null){
			const notyf = new Notyf();
			
			notyf.error({
			  message: 'Please login to proceed!',
			  duration: 5000,
			  icon: true,
			  ripple: true,
			  dismissible: true,
			  position: {
				x: 'right',
				y: 'top',
			  }
			  
			})			
		}
		else{
				
				
				var item_id = $(this).attr('value');
				var item_price = $(this).attr('amount');
				var item_name = $(this).attr('item_name');
				var item_image = $(this).attr('item_image');
								
				
				cartArr.push({
					'item_id': item_id,
					'item_price': item_price,
					'item_name': item_name,
					'item_image': item_image,
					'item_qty': 1
				})
				let string = JSON.stringify(cartArr);
				localStorage.setItem("cartArr", string);
			
			//console.log(cartArr);	
			const notyf = new Notyf();
			
			notyf.success({
			  message: 'Item added to cart!',
			  duration: 5000,
			  icon: true,
			  ripple: true,
			  dismissible: true,
			  position: {
				x: 'right',
				y: 'top',
			  }
			  
			})		
			
			$('.cartCount').html(cartArr.length);
		}
		
		console.log(localStorage.getItem("cartArr"));
	})
</script>
    