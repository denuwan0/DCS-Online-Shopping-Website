    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url();?>">Home</a>
                    <span class="breadcrumb-item active">Activation</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Account activation</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
						<div class="col-md-12 form-group">
                            <h4>Your account activation successfull! Please Login</h4>
                        </div>
						<div class="col-md-12 form-group">
                            <img src="<?php echo base_url();?>assets/img/login1.png" alt="Girl in a jacket" width="300" height="300">
                        </div>
						
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    <!-- Checkout End -->
<script>
	$('#registerBtn').click(function(e){
	e.preventDefault();
		
	var customer_name = 0;
	var customer_working_address = "";
	var customer_shipping_address = 0;
	var customer_old_nic_no = 0;
	var customer_contact_no = 0;
	var customer_email = "";
	var is_web = 1;
	
	var password = "";
	var confirm_password = "";
		
	customer_name = $('#customer_name').val();
	customer_working_address = $('#customer_working_address').val();
	customer_shipping_address = $('#customer_shipping_address').val();
	customer_old_nic_no = $('#customer_old_nic_no').val();
	customer_contact_no = $('#customer_contact_no').val();
	customer_email = $('#customer_email').val();
	
	password = $('#password').val();
	confirm_password = $('#confirm_password').val();
		
	//debugger;	
		
	if(typeof customer_name !== 'undefined' && customer_name !== '' 
	&& typeof customer_working_address !== 'undefined' && customer_working_address !== ''
	&& typeof customer_shipping_address !== 'undefined' && customer_shipping_address !== ''
	&& typeof customer_old_nic_no !== 'undefined' && customer_old_nic_no !== ''
	&& typeof customer_contact_no !== 'undefined' && customer_contact_no !== ''
	&& typeof customer_email !== 'undefined' && customer_email !== ''
	&& typeof password !== 'undefined' && password !== ''
	&& typeof confirm_password !== 'undefined' && confirm_password !== '')
	{
		if(password == confirm_password){
			var registerArr = [];
		
			registerArr.push({
				'customer_name': customer_name,
				'customer_working_address': customer_working_address,
				'customer_shipping_address': customer_shipping_address,
				'customer_old_nic_no': customer_old_nic_no,
				'customer_contact_no': customer_contact_no,
				'customer_email': customer_email
			})
			
			var formData = new Object();
			formData = {
				registerArr:registerArr
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
				url: API+"Online/register_user/",
				success: function(data, result){
					console.log(data);	
					const notyf = new Notyf();
					if(data['message'] == 'Data Saved!'){
						notyf.success({
						  message: 'User Registration Successfull! Please check your email.',
						  duration: 5000,
						  icon: true,
						  ripple: true,
						  dismissible: true,
						  position: {
							x: 'right',
							y: 'top',
						  }
						  
						})
						/* window.setTimeout(function() {
							window.location = "<?php echo base_url() ?>subItem/view";
						}, 3000); */
					}	
					
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					console.log(XMLHttpRequest);
					console.log(textStatus);		
					console.log(errorThrown);	
					const notyf = new Notyf();
				
					notyf.error({
					  message: 'Error!',
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
			  message: 'Password mismatched!',
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
		  message: 'Please Fill Required Fields!',
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