 <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<style>
.scrollable-div {
      height: 800px; /* Set the desired height */
      overflow-y: auto; /* Enable vertical scrollbar if content exceeds the height */
      border: 1px solid #ccc; /* Optional: Add border for visual clarity */
    }

    /* Add some content for demonstration purposes */
    .content {
      padding: 10px;
    }
</style>

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by Category</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form id="categorySelect">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input categoryBox" checked id="all">
                            <label class="custom-control-label categoryBox" for="all" >All</label>
                            <!--span class="badge border font-weight-normal">1000</span-->
                        </div>
                    </form>
                </div>
                <!-- Price End -->
                
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8 scrollable-div">
                <div class="row pb-3 content">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4" >
                            
                        </div>
                    </div>
                    
                   
                    <!--div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div-->
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->
<script>
function loadCategories(){
	$.ajax({
		type: "POST",
		cache : false,
		async: true,
		dataType: "json",
		url: API+"ItemCategory/fetch_all_active",
		success: function(data, result){
			//console.log(data);
			var catDivHTML = '';
			
			$.each(data, function(index, item) {
				
				catDivHTML = '<div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">'+
								'<input type="checkbox" class="custom-control-input categoryBox" checked id="'+item.item_category_id+'">'+
								'<label class="custom-control-label" for="'+item.item_category_id+'">'+item.category_name+'</label>'+
							'</div>';
				
				$('#categorySelect').append(catDivHTML);
				
			});
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {						
			
			//console.log(errorThrown);
		}
	});
}
loadCategories();

var prodArr = [];

function loadProducts(){
	$.ajax({
		type: "POST",
		cache : false,
		async: true,
		dataType: "json",
		url: API+"Online/products",
		success: function(data, result){
			
			var catDivHTML = '';
			
			console.log(data);
			$.each(data, function(index, item) {
				prodArr.push(item);
				catDivHTML = '<div class="col-lg-4 col-md-6 col-sm-6 pb-1 product" category="cat'+item.item_category+'">'+
								'<div class="product-item bg-light mb-4" >'+
									'<div class="product-img position-relative overflow-hidden">'+
										'<img style="max-wdth:100px; max-height:200px; " class="img-fluid w-100" src="'+item.item_image_url+'" alt="">'+
										'<div class="product-action">'+
											'<a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>'+
												'<a class="btn btn-outline-dark btn-square" href="<?php echo base_url();?>product/detail/'+item.item_id+'"><i class="fa fa-search"></i></a>'+
										'</div>'+
									'</div>'+
									'<div class="text-center py-4">'+
										'<a class="h6 text-decoration-none text-truncate" href="">'+item.item_name+'</a>'+
										'<div class="d-flex align-items-center justify-content-center mt-2">'+
											'<h5>'+item.max_sale_price+'</h6>'+
										'</div>'+
										'<div class="d-flex align-items-center justify-content-center mb-1">'+
											
										'</div>'+
									'</div>'+
								'</div>'+
							'</div>';
				
				$('.content').append(catDivHTML);
				
			});
			
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {						
			
			//console.log(errorThrown);
		}
	});
}
loadProducts();



$(document).on('change', '.categoryBox', function() {
	var catId = $(this).attr('id');
		
    if($(this).is(':checked')){
        //console.log('checked');
		changeProducts(true, catId);
    } else {
        //console.log('un-checked');
		changeProducts(false, catId);
    }
});

function changeProducts(status, catId){
		
	$('.product').each(function(){
		var category = $(this).attr('category');
		var this_ = $(this);
		var catName = 'cat'+catId;
		
		if(catId == 'all' && status == true){
			$('.product').css('display', 'block');
			$('.categoryBox').attr('checked','checked');
		}
		if(catId == 'all' && status == false){
			$('.product').css('display', 'none');	
			$('.categoryBox').removeAttr('checked');
		}
		if(category == catName && status == true){
			this_.css('display', 'block');	
		}
		if(category == catName && status == false){
			$(this).css('display', 'none');
		}
	})
}



//loadProductsByCat();
</script>