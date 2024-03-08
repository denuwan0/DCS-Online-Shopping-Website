


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <h5 class="text-secondary text-uppercase mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i><?php echo $company_address;?></p>
                <p class="mb-2"><a target="_blank" href="https://wa.me/94712917184?text=Hello!,%20Could%20you%20please%20assist%20me%20choosing%20products?"><i class="fa fa-comment mr-3" ></i>Whatsapp</a></p>
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i><?php echo $company_contact;?></p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Quick Shop</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <!--a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a-->
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-secondary" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">My Account</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Sign in</a>
                            <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Sign up</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="text-secondary text-uppercase mb-4">Follow Us</h5>
                        <div class="d-flex">
                            <a  target="_blank" class="btn btn-primary btn-square mr-2" href="https://web.facebook.com/palanchii"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-secondary">
                    &copy; <a class="text-primary" href="#"><?php echo $company_name;?></a>. All Rights Reserved. 
                </p>
            </div>
            <!--div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="<?php echo base_url();?>assets/img/payments.png" alt="">
            </div-->
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="<?php echo base_url();?>assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="<?php echo base_url();?>assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="<?php echo base_url();?>assets/js/main.js"></script>
	<script>
	$(document).on('click', '#signInBtn', function(){
		var username = $('#username').val();
		var password = $('#password').val();
		logIn(username, password);
		
	})
	
	function logIn(username, password){
		
		var formData = new FormData();
        formData.append('username',username);
		formData.append('password',password);
		$("#lankaQrModal").modal('show');
		$.ajax({
			type: "POST",
			async: true,
			dataType: "json",
			data: formData,	
			processData: false,     
			contentType: false,     
			cache: false,
			url: API+"SysUser/login/",
			success: function(data, result){			
				console.log(data);	
				countDown();	
				$("#lankaQrModal").modal('show');
								
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {						
				console.log(textStatus);					
			}
		});	
	}
	
	/* $('#lankaQrModal').on('shown.bs.modal', function () {
		var timer = $(this).data('timer') ? $(this).data('timer') :20000;
		
		$(this).delay(timer).fadeOut(200, function () {
			$(this).modal('hide');
		});
		
		
	}) */
	
	function countDown() {
		
		var counter = 60;
		var interval = setInterval(function() {
			counter--;
			// Display 'counter' wherever you want to display it.
			 $('#countDown').html(counter);
			if (counter == 0) {
				// Display a login box
				clearInterval(interval);
				$("#lankaQrModal").modal('hide');
			}
		}, 1000);
	};
	</script>
</body>

</html>