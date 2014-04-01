@extends(Config::get('syntara::views.master'))
@section('content')
<div class="col-lg-6 col-md-12 center">
      <div class="bs-callout bs-callout-warning">
            <h4>Product Grid</h4>
            <p>Select Products.</p>
            @if(Session::has('message'))
                <p class="alert">{{ Session::get('message') }}</p>
            @endif
            <p>{{ link_to_route('product.create', 'Add new Product') }}</p> 

      </div>    
        {{         
                GridRender::setGridId("ProductGrid")
                                        ->enablefilterToolbar()
                 ->setGridOption('url',URL::to('dashboard/product/grid'))
                 ->setGridOption('rowNum',5)
                 ->setGridOption('width',500)
                 ->setGridOption('height',172)
                 ->setGridOption('rowList',array(5,10,15,20))
                 ->setGridOption('caption','Products')
                 ->setGridOption('viewrecords',true)
                 ->setNavigatorOptions('navigator', array('viewtext'=>'view'))
                 ->setNavigatorOptions('view',array('closeOnEscape'=>false))
                 ->setFilterToolbarOptions(array('autosearch'=>true))                 
                 ->setNavigatorEvent('view', 'beforeShowForm', 'function(){alert("Before show form");}')
                 ->setFilterToolbarEvent('beforeSearch', 'function(){alert("Before search event");}')
                 ->addColumn(array('label'=>'ID', 'name'=>'id', 'index'=>'id', 'width'=>55, 'align'=>'center'))
                 ->addColumn(array('label'=>'Name','index'=>'products.name','width'=>100))
                 ->addColumn(array('label'=>'Description #','index'=>'products.description', 'width'=>180, 'align'=>'center'))
                 ->addColumn(array('label'=>'Category #','index'=>'categories.name', 'width'=>180, 'align'=>'center'))
                 ->renderGrid();
        }}
</div>

<script type='text/javascript'>
        

        function onSelectRowEvent(id)
        {                 
            var row = $(this).getRowData(id)        
            $('#id').val(row['id']);
            $('#ProductGrid')[0].clearToolbar();
        
        }

        function ontest ()
        {

            alert('test');
        }


        function onLoadCompleteEvent(data)
        {                                  
         $(this).jqGrid('footerData','set', {'quantity': 'Total:', 'total': $(this).jqGrid('getCol', 'total', false, 'sum')});        
        }
        
    

        function beforeClearEvent()
        {
                $('#gs_invoice-id').val($('#id').val());                
                $('#ProductGrid').setGridParam({'postData':{"filters":"{'groupOp':'AND','rules':[{'field':'Products.id','op':'eq','data':'"+$('#id').val()+"'}]}"}});
        }                
</script>

@stop