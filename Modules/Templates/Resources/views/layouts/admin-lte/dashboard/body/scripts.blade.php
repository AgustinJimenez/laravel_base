<script src="{{ asset('js/admin-lte-resources.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
 
  var app = new App({csrf_token:'{{ csrf_token() }}'});
  /*
    aplication.http( "{{ route('admin.media.edit', [1]) }}", function impresion()
    {
      console.log("IMPRESION===>", aplication.response);
    });
  */
  $("input").each(function()
  {
    $(this).attr("autocomplete", "off");
  })

</script>

@section('scripts')

  
@show