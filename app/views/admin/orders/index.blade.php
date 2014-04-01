@extends(Config::get('syntara::views.master'))

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-4">
        	 	@if(Session::has('message'))
                	<p class="alert">{{ Session::get('message') }}</p>
   				 @endif	
    			{{ Form::open('dashboard/order/store') }}
                	@if ($orders->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Reference id</th>
                <th>Date</th>
                <th>User</th>
                <th>Reason</th>
                <th>Details</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{{ $order->reference_id }}}</td>
                    <td>{{{ $order->order_date }}}</td>
                    <td>{{{ $order->note }}}</td>
                    <td>{{{ $order->user_id }}}</td>
                    <td> <a href="/dashboard/order/approve/<?php echo $order->id;?>"> Approve </a>
                    	| <a href="/dashboard/order/show/<?php echo $order->id;?>"> Details  </a>	
                    </td>
                    
                    <td>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no branches
@endif	
           
           		{{Form::close()}} 	
    	</div>        
	</div>
</div>


 <script src="{{ asset('assets/js/jquery-ui-v1.10.3/js/jquery-ui.js') }}"></script> 

 <script type="text/javascript"> 

	 $(function(){

	        
	 }); 


	 
</script>
@stop
