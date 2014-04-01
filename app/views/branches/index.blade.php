@extends(Config::get('syntara::views.master'))
@section('content')
<div class="container" id="main-container">
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
</div>
@stop
