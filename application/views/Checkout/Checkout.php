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
	
	<div class="modal" id="lankaQrModalCheckout">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Lanka QR</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body" style="align-self: center;">
			<img height="200px" width="200px" src="<?php echo base_url();?>assets/img/lankaQR.jpg" alt="Modal Image"/>
		  </div>
		  <div class="modal-footer">
			<h6 class="">*Please enter your NIC as payment reference</h6>			
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<div class="modal" id="bankAccModalCheckout">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title">Bank account details</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		  </div>
		  <div class="modal-body" style="align-self: left;">
				<div class="d-flex justify-content-between mb-3">
					<h6>Account no: 12121212</h6>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<h6>Name: account_name</h6>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<h6>Bank: HNB</h6>
				</div>
				<div class="d-flex justify-content-between mb-3">
					<h6>Branch: Kadawata</h6>
				</div>			

		  </div>
		  <div class="modal-footer">
			<h6 class="">*Please enter your NIC as payment reference</h6>			
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  </div>
		</div>
	  </div>
	</div>

    <!-- Checkout Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">Products</h6>
						<div class="checkoutProducts">
							
						</div>                        
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 id="final_sub_total"></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="final_grand_total"></h5>
                        </div>
                    </div>
                </div>
                
            </div>
			<div class="col-lg-4">
                
                <div class="mb-3">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                    <div class="bg-light p-30">
                        
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
                        <button class="btn btn-block btn-primary font-weight-bold py-3" id="PayNowBtn">View Payment Details</button>
                    </div>
                </div>
				<div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order</span></h5>
                    <div class="bg-light p-30">
                        
                        <div class="form-group">
                            <div class="custom-control">
								<label class="" for="banktransfer">Reference :</label>
                                <input type="text" id="payReference" class="text-center" value="">                                
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3" id="saveOrderBtn">Submit Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
<script>

function loadBankDetails(){
	$.ajax({
		type: "POST",
		cache : false,
		async: true,
		dataType: "json",
		url: API+"bankAcc/fetch_all_active_join/",
		success: function(data, result){
			
			$('#account_no').html(data[0].account_no);
			$('#account_name').html(data[0].account_name);
			$('#bank_name').html(data[0].bank_name);
			$('#b_branch_address').html(data[0].b_branch_address);
			
			console.log(data[0]);
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {						
			
			//console.log(errorThrown);
		}
	});
}
loadBankDetails();


console.log(itemsArr = JSON.parse(localStorage.getItem("itemsArr")));

var itemsDiv = '';
var sum = 0;

$.each(itemsArr, function(index, item) {
	console.log(item);
	itemsDiv += '<div class="d-flex justify-content-between">'+
					'<p>'+item.item_name+'</p>'+
					'<p class="">'+item.sub_total+'</p>'+
				'</div>';
				
	sum += parseFloat(item.sub_total);
})

$('#final_sub_total').html('Rs. '+sum.toFixed(2));
$('#final_grand_total').html('Rs. '+sum.toFixed(2));

console.log(sum);

$('.final_sub_total').text(sum.toFixed(2));
$('.final_grand_total').text(sum.toFixed(2));

$('.checkoutProducts').html(itemsDiv);

$('#PayNowBtn').click(function(){
	var payType = $('input[name=payment]:radio:checked').attr('id');
	
	if(payType == 'banktransfer'){
		 $("#lankaQrModalCheckout").modal('hide');
		 $("#bankAccModalCheckout").modal('show');
	}
	else if(payType == 'lankaQr'){
		 $("#bankAccModalCheckout").modal('hide');
		 $("#lankaQrModalCheckout").modal('show');
	}
	
})


$('#saveOrderBtn').click(function(e){
	e.preventDefault();
	
	var itemHeaderArr = [];
	var user_id = localStorage.getItem("user_id");
	var customer_id = localStorage.getItem("customer_id");	
	var payReference = $('#payReference').val();		
	var payment_method = $('input[name=payment]:radio:checked').attr('id');
	var total = sum;
			
		
	if(typeof user_id !== 'undefined' && user_id !== '' 
	&& typeof customer_id !== 'undefined' && customer_id !== ''
	&& typeof payReference !== 'undefined' && payReference !== ''
	&& typeof payment_method !== 'undefined' && payment_method !== '')
	{
		
		itemHeaderArr.push({
			'user_id': user_id,
			'customer_id': customer_id,
			'payReference': payReference,
			'payment_method': payment_method,
			'total': total
		})
		
		var formData = new Object();
		formData = {
			itemsArr:itemsArr,
			itemHeaderArr:itemHeaderArr
		};
		
		console.log(formData);
				
				
		$.ajax({
			type: "POST",
			//enctype: 'multipart/form-data',
			cache : false,
			async: true,
			dataType: "json",
			processData: false,
			contentType: false,
			data: JSON.stringify(formData),
			url: API+"Online/saveOrder/",
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