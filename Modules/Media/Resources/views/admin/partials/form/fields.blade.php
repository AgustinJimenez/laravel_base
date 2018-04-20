<form action="{{ route('admin.media.store') }}" class="dropzone">

    <div class="row">
    
        <div class="col-md-8 col-md-offset-2 fallback">
            <input name="file" type="file" multiple />
        </div>

    </div>
  
</form>

@section('scripts')
    <script src="{{ asset('js/dropzone.min.js') }}" type="text/javascript"></script>
@endsection