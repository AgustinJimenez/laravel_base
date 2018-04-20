
{!! Form::open(['route'=> 'admin.media.store', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
    <div class="dz-message" >
        <h3>Drop your files here</h3>
    </div>
    <div class="dropzone-previews"></div>
    <button type="submit" class="btn btn-success pull-right" id="submit">Save</button>
{!! Form::close() !!}


@section('scripts')
    <script src="{{ asset('js/dropzone.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        Dropzone.options.myDropzone = 
        {
            autoProcessQueue: false,
            uploadMultiple: true,
            
            init: function() 
            {
                var submitBtn = document.querySelector("#submit");
                myDropzone = this;
                
                submitBtn.addEventListener("click", function(e)
                {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
                
                this.on("complete", function(file) 
                {
                    myDropzone.removeFile(file);
                });
 
                this.on("success", 
                    myDropzone.processQueue.bind(myDropzone)
                );
            }
        };
    </script>
@endsection