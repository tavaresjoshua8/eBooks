@extends('layouts.app')

@section('content')
<div class='embed-responsive embed-responsive-21by9'>
    <iframe class="embed-responsive-item" src='{{ $book->pdf }}/preview' allowfullscreen>
    	<p>@lang('web.no-pdf-plugin')<a>@lang('web.dowload-pdf').</a></p>
    </iframe>
</div>
@endsection