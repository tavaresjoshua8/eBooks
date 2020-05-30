@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					{{ trans('admin.show') }} {{ trans('admin.categories.category') }}
				</div>
				{{-- /.card-header --}}

				<div class="card-body">
					<p><strong>ID: </strong> {{ $category->id }}</p>
					<p><strong>{{ trans('admin.name') }}: </strong> {{ $category->name }}</p>
					<p><strong>{{ trans('admin.categories.folder') }}:</strong> {{ $category->folder }}</p>
					<p><strong>{{ trans('admin.categories.savedAs') }}:</strong> {{ $category->saveIn }}</p>
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