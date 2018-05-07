<form action="{{ route('admin.media.store') }}" method="POST" files="true" id="my-dropzone" class="dropzone">
    {!! csrf_field() !!}
    <div class="dz-message" >
        <h3>Drop your files here</h3>
    </div>
    <div class="dropzone-previews"></div>
    <button type="submit" class="btn btn-success pull-right" id="btn-submit-dropzone">Save</button>
</form>
