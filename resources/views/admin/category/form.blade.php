@push('before-css')
    <link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
@endpush


<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            	{!! Form::label('name', 'Name') !!}
            	{!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
   </div>
</div>
<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            	{!! Form::label('description', 'Description') !!}
            	<textarea class-"form-control" name="description" value="{!!$category->description!!}" id="summary-ckeditor">{!!$category->description!!}</textarea>
            </div>
        </div>
   </div>
</div>

<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
        <label for="image">Image</label>
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($category->image != '') ? "data-default-file = /$category->image" : ''}} {{ ($category->image == '') ? "required" : ''}} value="{{$category->image}}">
    
    </div>
    </div>
</div>
</div>

<div class="form-actions text-right pb-0">
	{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    
    <div class="col-md-12">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
