<div class="row upper-menu">
    
    <div style="float:right;">
        <a id="delete-item" class="btn btn-danger  groups">{{ trans('syntara::all.delete') }}</a>
        <a class="btn btn-info btn-new" href="{{ URL::route('createBranch') }}">{{ trans('syntara::all.new') }}</a>
    </div>
    
</div>
<table class="table table-striped table-bordered table-condensed">
<thead>
    <tr>
        <th class="col-lg-1" style="text-align: center;"><input type="checkbox" class="check-all"></th>
        <th class="col-lg-1" style="text-align: center;">Id</th>
        <th class="col-lg-2">{{ trans('syntara::all.name') }}</th>
        <!-- <th class="col-lg-7">{{ trans('syntara::navigation.permissions') }}</th> -->
        <th class="col-lg-1" style="text-align: center;">{{ trans('syntara::all.show') }}</th>
    </tr>
</thead>
<tbody>
    @foreach ($branches as $branch)
    <tr>
        <td style="text-align: center;">
            <input type="checkbox" data-group-id="">
        </td>
        <td style="text-align: center;"></td>
        <td></td>
       <td style="text-align: center;">&nbsp;<a href="">{{ trans('syntara::all.show') }}</a></td>
    </tr>
    @endforeach
</tbody>
</table>