@section('scripts')

  
@show

<script type="text/javascript" charset="utf-8">

  @if( config('custom.template.dynamic-content') )
    app.set_dynamic_content();
  @endif

  $('input').iCheck
  ({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });

</script>