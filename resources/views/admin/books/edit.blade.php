@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					{{ trans('admin.edit') }} {{ trans('admin.books.book') }} <i class="fa fa-edit"></i>
				</div>
				{{-- /.card-header --}}

				<div class="card-body">
					{!! Form::model($book, ['route' => ['books.update', $book->id], 'method'=>'PUT', 'files'=>true ]) !!}
						@include('admin.books.partials.form')
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