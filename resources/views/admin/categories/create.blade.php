@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					@lang('admin.create') @lang('admin.categories.category') <i class="fa fa-plus"></i>
				</div>
				{{-- /.card-header --}}

				<div class="card-body">
					{!! Form::open(['route' => 'categories.store']) !!}
						@include('admin.categories.partials.form')
					{!! Form::close() !!}
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