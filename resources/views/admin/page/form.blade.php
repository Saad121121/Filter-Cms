<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('page_name', 'Page Name') !!}
                {!! Form::text('page_name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($page->image != '') ? "data-default-file = /$page->image" : ''}} {{ ($page->image == '') ? "required" : ''}} value="{{$page->image}}">
            </div>
        </div>
        @foreach($page->sections as $section)
        <div class="col-md-12">
            <div class="form-group">
                <label>{{$section->label}}</label>
                @if($section->type == 'image')
                <input type="file" name="{{$section->slug}}" class="dropify" data-default-file="{{ asset($section->value) }}">
                @elseif($section->type == 'textarea')
                <textarea name="{{$section->slug}}" id="costom-summary-ckeditor-{{$section->id}}">{{$section->value}}</textarea>
                @push('js')

                <script>
                    if($('#costom-summary-ckeditor-{{$section->id}}').length != 0){
                        CKEDITOR.replace( 'costom-summary-ckeditor-{{$section->id}}' );
                    }
                </script>

                @endpush
                @elseif($section->type == 'video')
                <img alt="" class="img-responsive" id="banner1" 
                src="{{ asset($section->value) }}" style=" width: 30%; "> 
                <input type="file" name="{{$section->slug}}" class="dropify" {{ ($section->value != '') ? "data-default-file = /$section->value" : ''}} {{ ($section->value == '') ? "required" : ''}} value="{{$section->value}}">
                @else($section->type == 'text')
                <input type="text" name="{{$section->slug}}" value="{{$section->value}}" class="form-control">
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>


<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>