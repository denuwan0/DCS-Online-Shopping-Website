    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url();?>">Home</a>
                    <span class="breadcrumb-item active">Password Reset</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Search by Email</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
						<div class="col-md-6" id="searchDiv">
							<div class="col-md-6 form-group">
								<label>Email address</label>
								<input class="form-control" id="email" type="text" placeholder="Email address">
							</div>
							<div class="col-md-6 form-group">
								<label id="responce"></label>
							</div>
							
							<div class="col-md-6 form-group">
								<div class="">
									<button class="btn btn-primary py-2 px-4" type="button" id="emailSearchBtn">Search</button>
								</div>
							</div>
						</div>
						<div class="col-md-6" id="displayDiv" style="display:none;">
							<input class="form-control" type="hidden" placeholder="OTP" id="user_id">
							<div class="col-md-6 form-group">
								<label>OTP</label>
								<input class="form-control" type="text" placeholder="OTP" id="otp">
							</div>
							<div class="col-md-6 form-group">
								<label>Password</label>
								<input class="form-control" type="password" id="password_" placeholder="password" id="password_">
							</div>
							<div class="col-md-6 form-group">
								<label>Confirm Password</label>
								<input class="form-control" type="password" id="confirm_password" placeholder="confirm password" id="confirm">
							</div>
							<div class="col-md-12 form-group">
								<div class="">
									<button class="btn btn-primary py-2 px-4" type="button" id="updateBtn">Update</button>
								</div>
							</div>
						</div>
                    </div>
					
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Checkout End -->
<script>
$('#emailSearchBtn').click(function(e){
	e.preventDefault();
	$("#displayDiv").css("display", "none");	
	var email = "";
		
	email = $('#email').val();	
	
		
	if(typeof email !== 'undefined' && email !== '' )
	{
		var searchArr = [];
		
		searchArr.push({
			'email': email
		})
		
		var formData = new Object();
		formData = {
			searchArr:searchArr
		};
		
				
				
		$.ajax({
			type: "POST",
			//enctype: 'multipart/form-data',
			cache : false,
			async: true,
			dataType: "json",
			processData: false,
			contentType: false,
			data: JSON.stringify(formData),	
			url: API+"Online/searchByEmail/",
			success: function(data, result){
				console.log(data.user_id);	
				const notyf = new Notyf();
				if(data['message'] == 'Valid User!'){
					
					$('#user_id').val(data.user_id);
					
					notyf.success({
					  message: 'Valid User, OTP sent!',
					  duration: 5000,
					  icon: true,
					  ripple: true,
					  dismissible: true,
					  position: {
						x: 'right',
						y: 'top',
					  }
					  
					})
					
					$("#displayDiv").css("display", "block");
					
					/* window.setTimeout(function() {
						window.location = "<?php echo base_url() ?>subItem/view";
					}, 3000); */
				}
				else{
					notyf.error({
					  message: 'Invalid User!',
					  duration: 5000,
					  icon: true,
					  ripple: true,
					  dismissible: true,
					  position: {
						x: 'right',
						y: 'top',
					  }
					  
					})
					
					$("#displayDiv").css("display", "none");
				}
				
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				console.log(XMLHttpRequest);
				console.log(textStatus);		
				console.log(errorThrown);	
				const notyf = new Notyf();
			
				notyf.error({
				  message: 'Invalid User!',
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
		});
		
	}
	else{
		const notyf = new Notyf();
			
		notyf.error({
		  message: 'Please Fill email field!',
		  duration: 5000,
		  icon: true,
		  ripple: true,
		  dismissible: true,
		  position: {
			x: 'right',
			y: 'top',
		  }
		  
		})
		
		/* $(document).Toasts('create', {
			icon: 'fas fa-exclamation-triangle',
			class: 'bg-danger m-1',
			autohide: true,
			delay: 5000,
			title: 'An error has occured',
			body: 'Something went wrong'
		});	 */
	}
	
	
})



$('#updateBtn').click(function(e){
	e.preventDefault();
	
	var otp = "";
	var user_id = 0;
	var password = "";
	var confirm_password = "";
		
	otp = $('#otp').val();	
	user_id = $('#user_id').val();
	password = $('#password_').val();	
	confirm_password = $('#confirm_password').val();

		
	if(typeof otp !== 'undefined' && otp !== '' 
	&& typeof password !== 'undefined' && password !== '' 
	&& typeof confirm_password !== 'undefined' && confirm_password !== '' 
	&& typeof user_id !== 'undefined' && user_id !== '' )
	{
		
		if(password == confirm_password){
			var passArr = [];
		
			passArr.push({
				'otp': otp,
				'user_id': user_id,
				'password': password,
				'confirm_password': confirm_password
			})
			
			var formData = new Object();
			formData = {
				passArr:passArr
			};
			
					
					
			$.ajax({
				type: "POST",
				//enctype: 'multipart/form-data',
				cache : false,
				async: true,
				dataType: "json",
				processData: false,
				contentType: false,
				data: JSON.stringify(formData),	
				url: API+"Online/resetPass/",
				success: function(data, result){
					console.log(data);	
					const notyf = new Notyf();
					if(data['message'] == 'Password reset successfull!'){
						notyf.success({
						  message: 'Password reset successfull!',
						  duration: 5000,
						  icon: true,
						  ripple: true,
						  dismissible: true,
						  position: {
							x: 'right',
							y: 'top',
						  }
						  
						})
						
						//$("#displayDiv").css("display", "none");	
						
						window.setTimeout(function() {
							window.location = "<?php echo base_url() ?>";
						}, 3000);
					}
					else{
						notyf.error({
						  message: 'OTP validation failed!',
						  duration: 5000,
						  icon: true,
						  ripple: true,
						  dismissible: true,
						  position: {
							x: 'right',
							y: 'top',
						  }
						  
						})
						
						//$("#displayDiv").css("display", "none");
					}
					
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest);
					console.log(textStatus);		
					console.log(errorThrown);	
					const notyf = new Notyf();
				
					notyf.error({
					  message: 'Invalid User!',
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
			});
		}
		else{
			const notyf = new Notyf();
				
			notyf.error({
			  message: 'Password mismached!',
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
		
		
		
	}
	else{
		const notyf = new Notyf();
			
		notyf.error({
		  message: 'Please Fill required field!',
		  duration: 5000,
		  icon: true,
		  ripple: true,
		  dismissible: true,
		  position: {
			x: 'right',
			y: 'top',
		  }
		  
		})
		
		/* $(document).Toasts('create', {
			icon: 'fas fa-exclamation-triangle',
			class: 'bg-danger m-1',
			autohide: true,
			delay: 5000,
			title: 'An error has occured',
			body: 'Something went wrong'
		});	 */
	}
	
	
})
</script>