<script src="{{ asset('js/admin-lte-resources.js') }}" type="text/javascript"></script>

@if( config('custom.template.ajax') )
  <script src="{{ asset('js/custom.min.js') }}" type="text/javascript"></script>
@endif
<script type="text/javascript">

  @if( config('custom.template.ajax') )
    var app = new App({csrf_token:'{{ csrf_token() }}'});
  @endif

  $('input').iCheck
  ({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });

  $("input").each(function()
  {
    $(this).attr("autocomplete", "off");
  })

</script>

@section('scripts')

  
@show