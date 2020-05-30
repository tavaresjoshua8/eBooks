<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: #fff; border:1px solid rgba(0,0,0,.2);">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $book->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <strong>@lang('web.categories.category'):</strong> {{ $book->category->name }}
                <br>
                <strong>@lang('web.books.folio'):</strong> {{ $book->folio }}
                <hr>
                <strong>@lang('web.books.author'):</strong> {{ $book->author }}<br>
                <strong>@lang('web.books.editorial'):</strong> {{ $book->editorial }}<br>
                <strong>@lang('web.books.issue'):</strong> {{ $book->issue }}<br>
                <strong>@lang('web.books.year'):</strong> {{ $book->year ? $book->year : __('s.f.') }}<br>
                <strong>@lang('web.books.pages'):</strong> {{ $book->pages }}<br>
                <strong>@lang('web.books.country'):</strong> {{ $book->country }}</br>
                <strong>@lang('web.books.translation'):</strong> {{ $book->translation }}<br>
                <hr>
                <strong>@lang('web.books.introduction'):</strong> <p><q>{{ $book->review }}</q></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('web.close').</button>
                <a class="btn btn-primary" href="{{ $book->pdf }}" target="_blank">@lang('web.open').</a>
            </div>
        </div>
    </div>
</div> 