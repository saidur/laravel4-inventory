@extends(Config::get('syntara::views.master'))

@section('content')

<div class="container" id="main-container">

 {{ Form::open('dashboard/product/store') }}

	{{ Form::field ('product.name')}} 
 	{{ Form::field('product.description','textarea') }}

<?php
$categories = DB::table('categories')->orderBy('name')->get();
?>
{{ Form::select('product.category_id', Form::prepOptions($categories, array('id', 'name')), 'Select Category')}}

{{ Form::submit ('Submit',array('class'=>'btn btn-primary')) }} 


{{Form::close()}} 
</div>
@stop
