<div class="form-group">
	{{ Form::label('name', trans('admin.name')) }}
	{{ Form::text('name', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('slug', trans('admin.slug')) }}
	{{ Form::text('slug', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('folder', trans('admin.categories.folder')) }}
	{{ Form::text('folder', null, ['class'=>'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('saveIn', trans('admin.categories.save') . '...') }}
	<label>
		{{ Form::radio('saveIn', 'ESPECIALIDAD') }} 
		@lang('home.especiality')
	</label>
	<label>
		{{ Form::radio('saveIn', 'ASIGNATURA') }}
		@lang('home.subjects')
	</label>
	<label>
		{{ Form::radio('saveIn', 'OTRAS', ['checked'=>'checked']) }} 
		@lang('home.others')
	</label>
</div>
<div class="form-group">
	<button class="btn btn-sm btn-primary" type="submit">{{ trans('admin.save') }} <i class="fa fa-save"></i></button>
</div>

@push('scripts')
<script type="text/javascript">
    String.prototype.capitalize = function(lower) {
        return (lower ? this.toLowerCase() : this).replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
    };
	document.addEventListener('DOMContentLoaded', function(){
		var name   = document.getElementById('name');
		var slug   = document.getElementById('slug');
		var folder = document.getElementById('folder');

		name.onkeyup = function() {
			slug.value   = strToSlug(name.value);
			folder.value = strToFolder(name.value);
		}

		bsCustomFileInput.init()
	});

	function strToSlug(text) {
		text = text.replace(/^\s+|\s+$/g, '');
		text = text.toLowerCase();
		
	    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
	    var to   = "aaaaeeeeiiiioooouuuunc------";
	    text = charsHelper(from, to, text);

	    text = text.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
	        .replace(/\s+/g, '-') // collapse whitespace and replace by -
	        .replace(/-+/g, '-'); // collapse dashes
	    return text;
	}
	
	function strToFolder(text) {
        text = text.capitalize(true)
        text = text.replace(/^\s+|\s+$/g, '');
        var from = "àáäâèéëêìíïîòóöôùúüûñç";
	    var to   = "aaaaeeeeiiiioooouuuunc";
	    text = charsHelper(from, to, text);
	    
	    text = text.replace(/\s+/g, '');
	    return text;
    }
    
    function charsHelper(from, to, text){
        // remove accents, swap ñ for n, etc
	    for (var i=0, l=from.length ; i<l ; i++) {
	        text = text.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
	    }
	    return text;
	}
</script>
@endpush