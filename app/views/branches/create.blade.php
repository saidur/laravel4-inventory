@extends(Config::get('syntara::views.master'))

@section('content')
<script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/group.js') }}"></script>
<div class="container" id="main-container">
    <div class="row">
        <div class="col-lg-12">
            <section class="module">
                <div class="module-head">
                    <b>New Branch</b>
                </div>
                <div class="module-body">
                    <form class="form-horizontal" id="create-group-form" method="POST">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-branch">
                                    <label class="control-label">Name</label>
                                    <input class="col-lg-12 form-control" type="text" id="name" name="name">
                               </div>
                            </div>
                            <div class="col-lg-12">
                            	
                            		<label class="control-label">Description</label>
                                    <input class="col-lg-12 form-control" type="textarea" id="description" name="description">	


                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="control-group">
                                    <button id="create-group" class="btn btn-primary">{{ trans('syntara::all.create') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@stop





</div>



