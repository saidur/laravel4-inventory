@extends(Config::get('syntara::views.master'))
@section('content')
	<div class="container" id="main-container">
		@if(Session::has('message'))
	                <p class="alert">{{ Session::get('message') }}</p>
	    @endif	
	 	
	 	{{ Form::open('dashboard/product/store') }}
			<?php echo Form::field('product.name');?>
	 		{{ Form::field('product.description','textarea') }}
			<?php
			echo Form::select('product.category_id', Form::prepOptions(Category::all(), array('id', 'name')), 'Select Category');
			echo Form::select('product.branch_id', Form::prepOptions(Branch::all(), array('id', 'name')), 'Select Store');
			?>
			{{ Form::field('product.price','text') }}
			{{ Form::submit ('Submit',array('class'=>'btn btn-primary')) }} 
		{{Form::close()}} 

	</div>
	@stop
