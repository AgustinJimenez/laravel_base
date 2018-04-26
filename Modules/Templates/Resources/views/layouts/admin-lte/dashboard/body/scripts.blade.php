
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- 
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
-->
<!-- Bootstrap 3.3.7 -->
<!-- 
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
-->
<!-- Scripts -->
<script src="{{ asset('js/admin-lte-resources.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>

<script type="text/javascript" defer>

  var aplication = new App('{{ csrf_token() }}', true);
/*
  aplication.http( "{{ route('admin.media.edit', [1]) }}", function impresion()
  {
    console.log("IMPRESION===>", aplication.response);
  });
*/
  

</script>

<script type="text/javascript">
  //disable alll autocompletes
  $("input").each(function()
  {
    $(this).attr("autocomplete", "off");
  })

</script>
@section('scripts')
@show