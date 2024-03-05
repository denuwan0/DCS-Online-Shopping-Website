    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url();?>">Home</a>
                    <span class="breadcrumb-item active">Register</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Your Details</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="row">
						<div class="col-md-6 form-group">
                            <label>NIC No.</label>
                            <input class="form-control" type="text" placeholder="NIC No.">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" placeholder="First Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" placeholder="Last Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>E-mail</label>
                            <input class="form-control" type="text" placeholder="example@email.com">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile No</label>
                            <input class="form-control" type="text" placeholder="94 712 917 184">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>NIC Address</label>
                            <input class="form-control" type="text" placeholder="Address line 1">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Shipping Address</label>
                            <input class="form-control" type="text" placeholder="Address line 2">
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <div class="">
                                <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Register</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Checkout End -->
<script>
	$('#submit').click(function(e){
	e.preventDefault();
		
	var sub_item_id = 0;
	var sub_item_name = "";
	var sub_item_category = 0;
	var sub_item_image_url = "";
	var is_active_inv_sub_item = 0;
		
	sub_item_name = $('#sub_item_name').val();
	sub_item_category = $('#sub_item_category').val();
	sub_item_image_url = $('#sub_item_image_url').prop('files')[0];
	is_active_inv_sub_item = $("#is_active_inv_sub_item").is(':checked')? 1 : 0;
	
	
		
	if(typeof sub_item_name !== 'undefined' && sub_item_name !== '' && typeof sub_item_category !== 'undefined' && sub_item_category !== ''
	&& typeof sub_item_image_url !== 'undefined' && sub_item_image_url !== '')
	{
		
		var formData = new FormData();
        formData.append('sub_item_name',sub_item_name);
		formData.append('sub_item_category',sub_item_category);
		formData.append('sub_item_image_url',sub_item_image_url);
		formData.append('is_active_inv_sub_item',is_active_inv_sub_item);
				
		$.ajax({
			type: "POST",
			//enctype: 'multipart/form-data',
			cache : false,
			async: true,
			dataType: "json",
			processData: false,
			contentType: false,
			data: formData,	
			url: API+"subItem/insert/",
			success: function(data, result){
				console.log(data);	
				const notyf = new Notyf();
				if(data['message'] == 'Data Saved!'){
					notyf.success({
					  message: data['message'],
					  duration: 5000,
					  icon: true,
					  ripple: true,
					  dismissible: true,
					  position: {
						x: 'right',
						y: 'top',
					  }
					  
					})
					window.setTimeout(function() {
						window.location = "<?php echo base_url() ?>subItem/view";
					}, 3000);
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