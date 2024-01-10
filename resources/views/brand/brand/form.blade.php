<div class="form-body">
    <div class="row">
		<div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('logo', 'image') !!}
    	    	{!! Form::file('image', null, ('required' == 'required') ? ['class' => 'form-control dropify', 'required' => 'required'] : ['class' => 'form-control dropify']) !!}
    </div>
</div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
