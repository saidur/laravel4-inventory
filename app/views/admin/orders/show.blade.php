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
 						
 						<label>order date</label>
 						<div class="form-group input-group">
                            <?php echo $data['orders']['order_date'];?>
                         </div>   
						<label>order note</label>
						<div class="form-group input-group">
                            <?php echo $data['orders']['note'];?>
                        </div>

						<label>User</label>
								
 				 		<div class="form-group input-group">
 							<?php echo $data['orders']['user_id']; ?>
 						</div>

 						

                    	<label>Order product</label>
                    	<?php 
                    		$order_products= $data['order_products'];
                    	?>
                    	<div class="form-group input-group" >
                        	<table class="table table-striped table-bordered">
						        <thead>
						            <tr>
						                <th>Product name </th>
						                <th>Quanity </th>
						                
						            </tr>
						        </thead>

						        <tbody>
						        
                                
						  		<tr>	
						  			<td> <?php echo $order_products->product_name;?></td>
						  			<td> <?php echo  $order_products->quantity;?> </td>
						  		</tr>	
            				
        </tbody>
    </table>	

                    </div>
                </div>
           
    	</div>        
	</div>
</div>
@stop