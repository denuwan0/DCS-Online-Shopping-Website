    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url();?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url().'Cart';?>">Cart</a>
                    <span class="breadcrumb-item active">Checkout</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
	<div class="modal" id="lankaQrModal">
	  <div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Lanka QR</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal Body -->
		  <div class="modal-body">
			<!-- Image goes here -->
			<img src="<?php echo base_url();?>assets/img/lankaQR.jpg" alt="Modal Image">
		  </div>

		  <!-- Modal Footer -->
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>

		</div>
	  </div>
	</div>
	<div class="modal" id="bankAccModal">
	  <div class="modal-dialog">
		<div class="modal-content">

		  <!-- Modal Header -->
		  <div class="modal-header">
			<h4 class="modal-title">Scan QR code</h4>
			
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>

		  <!-- Modal Body -->
		  
		  <div class="modal-body" style="    align-self: center;">
		  
			<!-- Image goes here -->
			<img src="<?php echo base_url();?>assets/img/lankaQR.jpg" style="max-height: 200px; max-width: 200px" alt="Modal Image">
			
		  </div>

		  <!-- Modal Footer -->
		  <div class="modal-footer">
		  <h6 class="">*Please enter your NIC as payment refference</h6>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>

		</div>
	  </div>
	</div>

    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!--div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
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
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to NIC address</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--div class="collapse mb-5" id="shipping-address">
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
                </div-->
            <!--/div-->
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
                        <div class="d-flex justify-content-between">
                            <p>Acro Jack / Pipe Support</p>
                            <p>Rs. 35000.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Column box 8ft</p>
                            <p>Rs. 30000.00</p>
                        </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rs. 65000.00</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rs. 65000.00</h5>
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="col-lg-4">
                
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        <!--div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div-->
                        <!--div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div-->
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input payment" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
						<div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input payment" name="payment" id="lankaQr">
                                <label class="custom-control-label" for="lankaQr">Lanka QR</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" id="PayNowBtn">Pay Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
<script>
console.log(itemsArr = JSON.parse(localStorage.getItem("itemsArr")));

var itemsDiv = '';
$.each(itemsArr, function(index, item) {
	console.log(item);
	itemsDiv += '<tr class="itemRaw">'+
					'<input type="hidden" class="item_id" value="'+item.item_id+'">'+
					'<input type="hidden" class="item_name" value="'+item.item_name+'">'+
					'<td class="align-middle" align="left"><img src="'+item.item_image+'" alt="" style="width: 50px;">'+item.item_name+'</td>'+
					'<td class="align-middle item_price">'+item.item_price+'</td>'+
					'<td class="align-middle">'+
						'<div class="input-group quantity mx-auto" style="width: 100px;">'+
							'<div class="input-group-btn">'+
								'<button class="btn btn-sm btn-primary btn-minus" >'+
								'<i class="fa fa-minus"></i>'+
								'</button>'+
							'</div>'+
							'<input type="text" class="form-control form-control-sm bg-secondary border-0 text-center item_qty" value="'+item.item_qty+'">'+
							'<div class="input-group-btn">'+
								'<button class="btn btn-sm btn-primary btn-plus">'+
									'<i class="fa fa-plus"></i>'+
								'</button>'+
							'</div>'+
						'</div>'+
					'</td>'+
					'<td class="align-middle sub_total">'+item.item_price+'</td>'+
					'<td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>'+
				'</tr>';
})

$('#itemsDiv').html(itemsDiv);

$('#PayNowBtn').click(function(){
	var payType = $(this).parent().parent().find('.payment').attr('id');
	console.log( $('input[name=payment]:radio:checked').attr('id'));
	if(payType == 'banktransfer'){
		 $("#bankAccModal").modal('show');
	}
	if(payType == 'lankaQr'){
		 $("#lankaQrModal").modal('show');
	}
	
})


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