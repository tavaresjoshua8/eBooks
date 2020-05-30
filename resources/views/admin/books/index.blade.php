@extends('layouts.app')

@push('styles')
	{{-- DataTables --}}
	<link href="{{asset('vendor/DataTables/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header d-flex justify-content-between align-items-center">
						<span><i class="fa fa-list-ul"></i> {{ trans('admin.list') }} {{ trans('admin.books.books') }}</span>
						<a class="btn btn-sm btn-primary" href="{{ route('books.create') }}">{{ trans('admin.create') }} <i class="fa fa-plus-circle"></i></a>
					</div>
					{{-- /.card-header --}}

					<div class="card-body">
					    <div class="table-responsive-sm">
					        <table class="table table-striped table-hover" id="tableBooks">
    							<thead>
    								<tr>
    									<th width="10px">@lang('admin.books.folio')</th>
    									<th>@lang('admin.name')</th>
    									<th>@lang('admin.categories.category')</th>
    									<th width="70"></th>
    									<th width="70"></th>
    									<th width="70"></th>
    								</tr>
    							</thead>
    						</table>
					    </div>
					</div>
					{{-- /.card-body --}}
				</div>
				{{-- /.card --}}
			</div>
			{{-- /.col-md-12 --}}
		</div>
		{{-- /.row --}}
	</div>
	{{-- /.container --}}
@endsection

@push('header-scripts')
<script src="{{asset('vendor/DataTables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendor/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
@endpush

@push('scripts')
<script>
	$(document).ready( function () {
	    $('#tableBooks').DataTable({
	    	'serverSide': true,
	    	'ajax': "{{ url('api/datatables/books') }}",
	    	'columns': [
	    		{data: 'folio'},
	    		{data: 'name'},
	    		{data: 'category'},
	    		{data: 'show'},
	    		{data: 'edit'},
	    		{data: 'delete'},
	    	],
	    	'language' : {
	    		'processing': "@lang('datatables.processing')",
	    		'search': 	"@lang('datatables.search')",
	    		'lengthMenu': "@lang('datatables.lengthMenu')",
	    		'info': 		"@lang('datatables.info')",
	    		'infoEmpty': 	"@lang('datatables.infoEmpty')",
	    		'infoFiltered': "@lang('datatables.infoFiltered')",
	    		'infoPostFix':"@lang('datatables.infoPostFix')",
	    		'loadingRecords': "@lang('datatables.loadingRecords')",
	    		'zeroRecords': "@lang('datatables.zeroRecords')",
	    		'emptyTable': "@lang('datatables.emptyTable')",
	    		'paginate': {
	    			'first': 	"@lang('datatables.paginate.first')",
	    			'previous':"@lang('datatables.paginate.previous')",
	    			'next': 	"@lang('datatables.paginate.next')",
	    			'last': 	"@lang('datatables.paginate.last')",
	    		},
	    		'aria': {
	    			'sortAscending': "@lang('datatables.aria.sortAscending')",
	    			'sortDescending': "@lang('datatables.aria.sortDescending')",
	    		}
	    	}
	    });
	});
</script>
@endpush