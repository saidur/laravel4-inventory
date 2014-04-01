@extends(Config::get('syntara::views.master'))

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-4">
        	 	@if(Session::has('message'))
                	<p class="alert">{{ Session::get('message') }}</p>
   				 @endif	
    			{{ Form::open('dashboard/order/store') }}
                	<div class="form-group">
 						<?php echo Form::field('order.order_date','date',array('id'=>'order_date'));?>
						
						{{ Form::field('order.note','textarea') }}

						<label>User</label>
						<?php 
							$userid = Sentry::getUser()->id;
							$username = Sentry::getUser()->username;
						?>		
 				 		<div class="form-group input-group">
 							<?php	echo Form::select('order.user_id', array(Sentry::getUser()->id=>Sentry::getUser()->username)); ?>
 						</div>

 						<?php
							//echo Form::select('order.branch_id', Form::prepOptions(Branch::all(), array('id', 'name')), 'Select Store');
						?>

                    	<label>Add product</label>
                    	<div class="form-group input-group" >
                        	<input type="text" id="product_name"  name="product[]" placeholder="product name" class="form-control">
                       		<input type="text" name="product_id[]" placeholder="product_id" class="form-control">
                       		<input type="text" name="qty[]" placeholder="quantity" class="form-control">

                        <span class="input-group-btn"><button type="button" class="btn btn-default btn-add">+</button></span>
                    </div>
                </div>
           {{ Form::submit ('Submit',array('class'=>'btn btn-primary')) }} 	
           {{Form::close()}} 	
    	</div>        
	</div>
</div>



<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<!-- <script src="//code.jquery.com/jquery-1.9.1.js"></script>-->
<!-- <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->


 <script src="{{ asset('assets/js/jquery-ui-v1.10.3/js/jquery-ui.js') }}"></script> 
<!-- <script src="{{ asset('assets/js/jquery-ui-v1.10.3/css/black-tie/jquery-ui-1.10.3.custom.css') }}"></script> 
-->
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
