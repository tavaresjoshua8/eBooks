@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					@lang('admin.show')  @lang('admin.books.book') 
				</div>
				{{-- /.card-header --}}

				<div class="card-body">
					<p><strong>@lang('admin.books.folio'): </strong> {{ $book->folio }}</p>
					<p><strong>@lang('admin.name'): </strong> {{ $book->name }}</p>
					<p><strong>@lang('admin.categories.category'): </strong> {{ $category->name }}</p>
					<p><strong>@lang('admin.slug'): </strong> {{ $book->slug }}</p>
					<p><strong>@lang('admin.books.author'): </strong> {{ $book->author }} </p>
					<p><strong>@lang('admin.books.translation'): </strong> {{ $book->translation }} </p>
					<p><strong>@lang('admin.books.editorial'): </strong> {{ $book->editorial }} </p>
					<p><strong>@lang('admin.books.issue'): </strong> {{ $book->issue }} </p>
					<p><strong>@lang('admin.books.country'): </strong> {{ $book->country }} </p>
					<p><strong>@lang('admin.books.year'): </strong> {{ $book->year ? $book->year : __('s.f.') }} </p>
					<p><strong>@lang('admin.books.pages'): </strong> {{ $book->pages }} </p>
					<p><strong>@lang('admin.books.introduction'): </strong> {{ $book->review }}</p>
					<p><strong>@lang('admin.books.pdf'): </strong><a target="_blank" href="{{ $book->pdf }}">{{ $book->pdf }}</a></p>
					<p><strong>@lang('admin.books.image-path'):</strong><a href="{{ asset($book->image) }}"> {{ asset($book->image) }}</a></p>
					<img src="{{ asset($book->image) }}" class="img-fluid">
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