@extends(Config::get('syntara::views.master'))

@section ('content')

	<h1> All Categories </h1>
	<p>{{ link_to_route ('categories.create','Add Categories') }} </p>

	@if ($categories->count ())
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th> Name </th>
						<th> Description </th>

					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)

						<tr>
								<td> {{{ $category->name }}}</td>
								<td> {{{ $category->description }}} </td>
								<td> {{link_to_route('categories.edit','Edit', array ($category->id),array('class'=>'btn btn-info'))}}
								<td> 
									{{ Form::open(array('method' => 'DELETE', 'route' => array('categories.destroy', $category->id))) }}
                            			{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        			{{ Form::close() }}
								</td>
						</tr>	

					@endforeach
				</tbody>	

			</table>	

	@else 
		There are no categories 

	@endif 	
@stop 