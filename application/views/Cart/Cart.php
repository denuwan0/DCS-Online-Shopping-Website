
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url();?>">Home</a>
                    <a class="breadcrumb-item text-dark" href="<?php echo base_url().'Shop';?>">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
	

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="itemsDiv" style="height: 50px; overflow-y: auto; overflow-x: hidden;">
                        
                        
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
               
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6 class="final_sub_total">0.00</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">FREE</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 class="final_grand_total">Rs. 0.00</h5>
                        </div>
                        <a href="<?php echo base_url().'Checkout';?>" class="btn btn-block btn-primary font-weight-bold my-3 py-3 checkoutBtn">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

<script>


var itemsDiv = '';
$.each(cartArr, function(index, item) {
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

$(document).on('click', '.btn-plus', function() {
	
	var item_price = parseFloat($(this).parent().parent().parent().parent().find('.item_price').text());
	var item_qty = parseFloat($(this).parent().parent().parent().find('.item_qty').val());
	//console.log(item_qty);
	var sub_total = parseFloat(item_price * item_qty).toFixed(2);
	//console.log(sub_total);
	$(this).parent().parent().parent().parent().find('.sub_total').text(sub_total);
	
	
	var sum = 0;
	$('.sub_total').each(function(){
		sum += parseFloat($(this).text());
	});
	
	$('.final_sub_total').text(sum.toFixed(2));
	$('.final_grand_total').text(sum.toFixed(2));
	
	//console.log(sum);
	
	//console.log($(this).parent().parent().parent().parent().find('.sub_total').text(sub_total));
});

$(document).on('click', '.btn-minus', function() {
	
	var item_price = parseFloat($(this).parent().parent().parent().parent().find('.item_price').text());
	var item_qty = parseFloat($(this).parent().parent().parent().find('.item_qty').val());
	//console.log(item_qty);
	var sub_total = parseFloat(item_price * item_qty).toFixed(2);
	//console.log(sub_total);
	$(this).parent().parent().parent().parent().find('.sub_total').text(sub_total);
	//console.log($(this).parent().parent().parent().parent().find('.sub_total').text(sub_total));
	var sum = 0;
	$('.sub_total').each(function(){
		sum += parseFloat($(this).text());
	});
	
	$('.final_sub_total').text(sum.toFixed(2));
	$('.final_grand_total').text(sum.toFixed(2));
});

$(document).on('click', '.btn-danger', function() {
	
	console.log($(this).parent().parent().remove())
	
	var sum = 0;
	$('.sub_total').each(function(){
		sum += parseFloat($(this).text());
	});
	
	$('.final_sub_total').text(sum.toFixed(2));
	$('.final_grand_total').text(sum.toFixed(2));
});

$(document).on('click', '.checkoutBtn', function() {
	var itemsArr = [];
	//console.log($(this).parent().parent().remove())
	
	$('.itemRaw').each(function(){
		console.log($(this).find('.item_qty').val());
		
		var item_id = $(this).find('.item_id').val();
		var item_price = $(this).find('.item_price').text();
		var item_name = $(this).find('.item_name').val();
		var item_image = $(this).find('item_image');
		var sub_total = $(this).find('.sub_total').text();
		var item_qty = $(this).find('.item_qty').val();
		
		itemsArr.push({
			'item_id': item_id,
			'item_price': item_price,
			'item_name': item_name,
			'item_image': item_image,
			'sub_total': sub_total,
			'item_qty': item_qty
		})
		
		//debugger
		
		let string2 = JSON.stringify(itemsArr);
		localStorage.setItem("itemsArr", string2);
		
	});
	
	//console.log(itemsArr);
});


var sum = 0;
$('.sub_total').each(function(){
	sum += parseFloat($(this).text());
});

//console.log(sum);

$('.final_sub_total').text(sum.toFixed(2));
$('.final_grand_total').text(sum.toFixed(2));
</script>