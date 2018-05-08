<form action="{{ route('admin.media.store') }}" method="POST" files="true" id="my-dropzone" class="dropzone">
    {!! csrf_field() !!}
    <div class="dz-message" >
        <h3>Drop your files here</h3>
    </div>
    <div class="dropzone-previews"></div>
    <button type="submit" class="btn btn-success pull-right" id="btn-submit-dropzone">Save</button>
</form>

<script type="text/javascript" charset="utf-8">

Dropzone.options.myDropzone = 
{
    autoProcessQueue: false,
    uploadMultiple: true,
    init: function() 
    {
        var submitBtn = document.querySelector("#btn-submit-dropzone");
        myDropzone = this;
        
        submitBtn.addEventListener("click", function(e)
        {
            e.preventDefault();
            e.stopPropagation();
            myDropzone.processQueue();
        });
        
        this.on("complete", function(files) 
        {
            myDropzone.removeFile(files);
            app.refresh_datatables();
        });

        this.on("success", 
            myDropzone.processQueue.bind(myDropzone)
        );
    }
};

</script>
