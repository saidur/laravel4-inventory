@extends('layouts.scaffold')

@section('main')

<h1>Show Branch</h1>

<p>{{ link_to_route('branches.index', 'Return to all branches') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $branch->name }}}</td>
					<td>{{{ $branch->description }}}</td>
                    <td>{{ link_to_route('branches.edit', 'Edit', array($branch->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('branches.destroy', $branch->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
