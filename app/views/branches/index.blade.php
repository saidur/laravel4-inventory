@extends(Config::get('syntara::views.master'))

@section('content')

<div class="container" id="main-container">
 @include('syntara::layouts.dashboard.confirmation-modal',  array('title' => trans('syntara::all.confirm-delete-title'), 'content' => trans('syntara::all.confirm-delete-message'), 'type' => 'delete-group'))
    <div class="row">

    	<div class="col-lg-10">
            <section class="module">
                <div class="module-head">
                    <b>All Branches</b>
                </div>
                <div class="module-body ajax-content">
                     @include('branches.list-branches')
                </div>
            </section>
        </div>


<p>{{ link_to_route('createBranch', 'Add new branch') }}</p> 

@if ($branches->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($branches as $branch)
				<tr>
					<td>{{{ $branch->name }}}</td>
					<td>{{{ $branch->description }}}</td>
                    
                    <td>
                       
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no branches
@endif

@stop
</div>
