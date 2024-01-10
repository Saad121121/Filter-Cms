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
</div><div class="col-md-12">
    <div class="form-group">
    	{!! Form::label('image', 'Image') !!}<input class="form-control dropify" name="image" type="file" id="image" {{ ($socialmedia->image != '') ? "data-default-file = /$socialmedia->image" : ''}} {{ ($socialmedia->image == '') ? "required" : ''}} value="{{$socialmedia->image}}">
 
        </div>
</div>
	</div>
</div>
<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

@push('js')
  
  <script src="{{asset('js/jquery.repeater.min.js')}}"></script>
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>
  <script>
      $(function() {
          $('.dropify').dropify();
      });
      !function(e,t,r){"use strict";r(".repeater-default").repeater(),r(".file-repeater, .contact-repeater").repeater({show:function(){r(this).slideDown()},hide:function(e){confirm("Are you sure you want to remove this item?")&&r(this).slideUp(e)}})}(window,document,jQuery);
      
      function getval(sel)
        {
            var globelsel = sel;
            let value = sel.value;

            // alert(value);
            
            $.ajax({
            url: "{{ route('get-attributes')}}",
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    value:value
                },
                success:function(response){
                    $(globelsel).parent().parent().find('.value').html('');
                    if(response.status){
                        var html = '';
                        for(var i = 0; i < response.message.length; i++){
                            html += '<option value="'+response.message[i].id+'">'+response.message[i].value+'</option>';
                        }
                        $(globelsel).parent().parent().find('.value').html(html);
                    }
                    else{

                    }
                },
                });
        }
  </script>
@endpush