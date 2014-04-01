@extends(Config::get('syntara::views.master'))

@section('content')

<div class="container" id="main-container">
 @include('syntara::layouts.dashboard.confirmation-modal',  array('title' => trans('syntara::all.confirm-delete-title'), 'content' => trans('syntara::all.confirm-delete-message'), 'type' => 'delete-group'))
    <div class="row">

        <div class="col-lg-10">
            <section class="module">
                <div class="module-head">
                    <b>All Products</b>
                </div>
                
            </section>
        </div>


<p>{{ link_to_route('product.create', 'Add new Product') }}</p> 

 @if ($products->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Branch</th>
                <th>quantity</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{{ $product->name }}}</td>
                    <td>{{{ $product->category_id }}}</td>
                    <td>{{{ $product->branch_id }}}</td>
                    <td>{{{ $product->quantity }}}</td>
                    <td>{{{ $product->description }}}</td>
                    
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
