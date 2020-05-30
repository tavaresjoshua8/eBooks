<div class="form-group">
	{{ Form::label('category_id', trans('admin.categories.category')) }}
	{{ Form::select('category_id', $categories, session('category'), ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('folio', trans('admin.books.folio')) }}
	{{ Form::text('folio', null, ['class'=>'form-control', 'autofocus'=>'autofocus']) }}
</div>
<div class="form-group">
	{{ Form::label('name', trans('admin.name')) }}
	{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', trans('admin.slug')) }}
	{{ Form::text('slug', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('author', trans('admin.books.author')) }}
	{{ Form::text('author', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('translation', trans('admin.books.translation')) }}
	{{ Form::text('translation', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('editorial', trans('admin.books.editorial')) }}
	{{ Form::text('editorial', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('issue', trans('admin.books.issue')) }}
	{{ Form::text('issue', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('country', trans('admin.books.country')) }}
	{{ Form::text('country', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('year', trans('admin.books.year')) }}
	{{ Form::text('year', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('pages', trans('admin.books.pages')) }}
	{{ Form::text('pages', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('review', trans('admin.books.introduction')) }}
	{{ Form::textarea('review', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('pdf', trans('admin.books.pdf-path')) }}
    <div class="input-group mb-3" style="max-width:100%">
        {{ Form::text('pdf', null, ['class'=>'form-control', 'aria-describedby'=>"paste-addon"]) }}
        <div class="input-group-append">
            <button class="input-group-text" id="paste-addon">
                <i class="fad fa-clipboard"></i>
            </button>
        </div>
    </div>
</div>
<div class="custom-file mb-2">
    {{ Form::file('image', ['class'=>'custom-file-input', 'id'=>'image']) }}
    {{ Form::label('image', trans('admin.books.coverpage'), ['class'=>'custom-file-label']) }}
</div>
<div class="form-group">
	<button class="btn btn-sm btn-primary" type="submit">@lang('admin.save') <i class="fa fa-save"></i></button>
</div>

@push('scripts')
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function(){
	    navigator.permissions.query({
            name: 'clipboard-read'
        });
		var name = document.getElementById('name');
		var slug = document.getElementById('slug');
		var image = document.getElementById('image');

		name.onkeyup = function() {
			slug.value = strToSlug(name.value);
		}
        
        var paste = document.getElementById('paste-addon');
        paste.addEventListener('click', function(e){
            e.preventDefault();
            navigator.clipboard.readText()
             .then( text => {
                document.getElementById('pdf').value = text;
             })
             .catch(error => {
                alert(error);
             });
		});
		
		bsCustomFileInput.init()
	});

	function strToSlug(text) {
		text = text.replace(/^\s+|\s+$/g, '');
		text = text.toLowerCase();

		// remove accents, swap ñ for n, etc
	    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
	    var to   = "aaaaeeeeiiiioooouuuunc------";
	    for (var i=0, l=from.length ; i<l ; i++) {
	        text = text.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	    }

	    text = text.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
	        .replace(/\s+/g, '-') // collapse whitespace and replace by -
	        .replace(/-+/g, '-'); // collapse dashes

	    return text;
	}

	function firstWord(text) {
		return text.substr(0, text.indexOf(' '));
	}
</script>
@endpush