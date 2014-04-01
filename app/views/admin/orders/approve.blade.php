@extends(Config::get('syntara::views.master'))
@section('content')
<div class="container">
    <div class="row">
          <div class="col-xs-4">
        	 	   @if(Session::has('message'))
                	<p class="alert">{{ Session::get('message') }}</p>
   				     @endif	
   				   <?php  $order_id =  $data['orders']['id'];?>

    			{{ Form::open('dashboard/order/approve_order') }}
                	<div class="form-group">
 						         <div>
 							            <label> Order Date </label>
 							              <?php echo Form::text('order.order_date',$data['orders']['order_date'],array('id'=>'order_date'));?>
						          </div>
						          <div>
							             <label> Order Note </label>
							             <?php echo Form::textarea('order.order_note',$data['orders']['order_note'],array('id'=>'order_note'));?>
						          </div>	
						          
                      <label>order by User</label>
								      <div class="form-group input-group">
                          <?php	echo Form::select('order.user_id', array($data['orders']['user_id']=>$data['orders']['user_id'])); ?>
 						           </div>
                      
                      <label>Add product</label>
                    	<div class="form-group input-group" >
                        	<div> 
                        		<lable> Product Name </label>
                        		<input type="text" id="product_name"  name="product[]" value="<?php echo $data['order_products']['product_name'];?>" class="form-control">
                       		</div>
                       		<div>
                       		<lable> Product Id </label>
                       		<input type="text" name="product_id[]" value="<?php echo $data['order_products']['product_id'];?>" class="form-control">
                       		</div>
                       		<div>
                       		<lable> Ordered Quantity </label>
                       		<input type="text" name="qty[]" placeholder="quantity" value="<?php echo $data['order_products']['quantity'];?>" class="form-control">
                       		</div>
                       		<div>
                       		<lable> Approve Quantity </label>
                       		<input type="text" name="apprv_qty[]"  value="<?php echo $data['order_products']['quantity'];?>" class="form-control">
                       		<input type="hidden" name="order_id" value ="<?php echo $order_id;?>" />
                        		</div>	
                       		<!-- <input type="text" name="apprv_qty[]" placeholder="approve_quantiy" class="form-control"> -->

                        <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+</button></span>
                    </div>
                    <label> Approve by user </label>
                    <div class="form-group input-group">
 							<?php	echo Form::select('approve_user_id', array(Sentry::getUser()->id=>Sentry::getUser()->username)); ?>
 						</div>

                </div>
           {{ Form::submit ('Approve',array('class'=>'btn btn-primary')) }} 	
           {{Form::close()}} 	
    	</div>        
	</div>
</div>



 <script src="{{ asset('assets/js/jquery-ui-v1.10.3/js/jquery-ui.js') }}"></script> 

 <script type="text/javascript"> 

	 $(function(){

	        $("#order_date").datepicker({ dateFormat: "yy/mm/dd" });
	 
	        $("#product_name").autocomplete({
					source: "/order/getProduct",
					minLength: 2,
					select: function( event, ui ) {
							alert ('test');
					}
			});
	 }); 


	 $( document ).on( 'click', '.btn-add', function ( event ) {
			event.preventDefault();

			var field = $(this).closest( '.form-group' );
			var field_new = field.clone();

	$(this)
		.toggleClass( 'btn-default' )
		.toggleClass( 'btn-add' )
		.toggleClass( 'btn-danger' )
		.toggleClass( 'btn-remove' )
		.html( '–' );

		field_new.find( 'input' ).val( '' );
		field_new.insertAfter( field );
} );

$( document ).on( 'click', '.btn-remove', function ( event ) {
	event.preventDefault();
		$(this).closest( '.form-group' ).remove();
});
</script>
@stop
