@extends('layouts.app') 

@section('content')
	<div class="container-fluid">
	    {{--
	    @if( isset($category) )
	        <h1 class="text-center mb-lg-5 d-none d-md-block">{{ $category }}</h1>
	    @endif
	    --}}
		<center>
			<div class="row">
				@forelse ($books as $book)
				<div class="col-sm-5 col-md-4 col-lg-3 mx-auto mb-sm-3 my-auto" style="min-height:424px; overflow:hidden;">
					{{-- Card than contain all the book information --}}
					<div class="card bg-light mb-3 flip w-100" style="border-style: solid;border-color: #DDDDDD;border-width: 10px;height: 444px">
					        <div class="flip-1 card-img-top w-100 h-100">
				   				{{-- Book Presentation --}}
			        			<img class="card-img-top w-100 h-100" src="{{ asset($book->image) }}" alt="Card image cap">
			        		</div>
			        		{{-- /.flip-1 --}}
						    <div class="flip-2 w-100 h-100">
							    {{-- Book Title --}}
							    <h5 class="card-title p-3 text-justify">{{ substr($book->name, 0, strpos($book->name, '.') ? strpos($book->name, '.')+1 :  strlen($book->name) ) }}</h5>
							    <hr>
							    {{-- Book Introduction --}}
								<p class="card-text text-justify p-3"><q>{{ str_limit($book->review, 250) }}</q></p>
								<hr>
								{{-- More about the book --}}
								<button class="btn btn-primary about" data-slug="{{ $book->slug }}">@lang('web.more').</button>
			    			</div>
			    			{{-- /.flip-2 --}}
				   	</div>
				   	{{-- /.card --}}
				</div>
				{{-- /.col-sm-3 --}}
				@if(! isset( $_COOKIE['tip'] ) && $loop->index == 0)
				<div style="position: fixed; top: 0; left: 0;margin-top:80px; z-index:9;">
				    <div role="alert" id="bookToast" aria-live="assertive" aria-atomic="true" data-delay="6000" class="toast">
			            <div class="toast-header bg-primary text-white">
			                <i class="far fa-info-circle"></i>
			                <strong class="mr-auto ml-2">Tips</strong>
			                <small>eBooks</small>
			                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			                    <span aria-hidden="true">&times;</span>
			                </button>
			            </div>
			            {{-- /.toast-header --}}
			            <div class="toast-body">
			                @lang('web.tip')
			            </div>
			            {{-- /.toast-body --}}
			        </div>
			        {{-- /.toast --}}
			    </div>
			    {{-- /.toast-container --}}
			    <script>
			    document.cookie = "tip=true; expires=<?php echo time()+86400 ?>";
			    setTimeout(function(){
			        $("#bookToast").toast("show");
			    },3000);
			    </script>
				@endif
				@empty
				<div class="col-sm-12">
					<div class="card bg-light mb-3">
						
						<img class="card-img-top" src="{{asset('imgs/error.png')}}" alt="Error Image" style="max-width: 18rem;">

						<div class="card-body">
							<h5 class="card-title">@lang('web.ups')! :c</h5>
							<p class="card-text">@lang('web.empty')</p>
						</div>
						{{-- /.card-body --}}
					</div>
					{{-- /.card --}}
				</div>
				{{-- /.col-sm-12 --}}
				@endforelse
			</div>
			{{-- /.row --}}
		</center>
		<div class="d-flex">
		    <div class="mx-auto">
		        {{ $books->render() }}
		        {{--
		        @if ($books->hasPages())
                    <ul class="pagination">
                        {{-- Previous Page Link -}}
                        @if ($books->onFirstPage())
                            <li class="page-item disabled"><span class="page-link">«</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $books->previousPageUrl() }}" rel="prev">«</a></li>
                        @endif
                
                        @if($books->currentPage() > 3)
                            <li class="page-item d-none d-sm-flex"><a class="page-link" href="{{ $books->url(1) }}">1</a></li>
                        @endif
                        @if($books->currentPage() > 4)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        @foreach(range(1, $books->lastPage()) as $i)
                            @if($i >= $books->currentPage() - 2 && $i <= $books->currentPage() + 2)
                                @if ($i == $books->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $books->url($i) }}">{{ $i }}</a></li>
                                @endif
                            @endif
                        @endforeach
                        @if($books->currentPage() < $books->lastPage() - 3)
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                        @endif
                        @if($books->currentPage() < $books->lastPage() - 2)
                            <li class="page-item d-none d-sm-flex"><a class="page-link" href="{{ $books->url($books->lastPage()) }}">{{ $books->lastPage() }}</a></li>
                        @endif
                
                        {{-- Next Page Link -}}
                        @if ($books->hasMorePages())
                            <li class="page-item"><a class="page-link" href="{{ $books->nextPageUrl() }}" rel="next">»</a></li>
                        @else
                            <li class="page-item disabled"><span class="page-link">»</span></li>
                        @endif
                    </ul>
                @endif
                --}}
		    </div>
		</div>
		<div id="modal"></div>
	</div>
	{{-- /.container-fluid --}}
@endsection

@push('styles')
<style>
    .pagination{
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }
</style>
@endpush

@push('scripts')
<script type="text/javascript">
$(".about").on("click", function(){
    var button = $(this);
    var slug = button.attr("data-slug");
    button.html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>@lang('web.loading')...');
    button.addClass("disabled");
    button.attr("disabled","disabled");
    $.ajax({
		type: "POST",
		url: "{{route('about')}}",
		data: {"slug" : slug, "_token" : '{{ csrf_token() }}'},
		success : function(response){
			$("#modal").html(response);
			$("#bookModal").modal("show");
			button.html("@lang('web.more')");
            button.removeClass("disabled");
            button.removeAttr("disabled");
		}
	}); 
});
</script>
@endpush