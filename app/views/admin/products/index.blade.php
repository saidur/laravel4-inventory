@extends(Config::get('syntara::views.master'))

@section('content')

{{ 
    GridRender::setGridId("myFirstGrid")
            ->enablefilterToolbar()
            ->setGridOption('url',URL::to('product/index'))
            ->setGridOption('rowNum',5)
            ->setGridOption('shrinkToFit',false)
            ->setGridOption('sortname','id')
            ->setGridOption('caption','LaravelJqGrid example')
            ->setNavigatorOptions('navigator', array('viewtext'=>'view'))
            ->setNavigatorOptions('view',array('closeOnEscape'=>false))
            ->setFilterToolbarOptions(array('autosearch'=>true))
            ->setGridEvent('gridComplete', 'function(){alert("Grid complete event");}') 
            ->setNavigatorEvent('view', 'beforeShowForm', 'function(){alert("Before show form");}')
            ->setFilterToolbarEvent('beforeSearch', 'function(){alert("Before search event");}') 
            ->addColumn(array('index'=>'id', 'width'=>55))
            ->addColumn(array('name'=>'product','width'=>100))
            ->addColumn(array('name'=>'amount','index'=>'amount', 'width'=>80, 'align'=>'right'))
            ->addColumn(array('name'=>'total','index'=>'total', 'width'=>80))
            ->addColumn(array('name'=>'note','index'=>'note', 'width'=>55,'searchoptions'=>array('attr'=>array('title'=>'Note title'))))
            ->renderGrid(); 
}}
@stop