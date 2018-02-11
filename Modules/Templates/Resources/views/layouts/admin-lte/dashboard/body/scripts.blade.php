
<!-- 
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
-->
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
<script src="{{ asset('js/admin-lte-resources.js') }}" defer></script>
<script  type="text/javascript" defer>
$('input').each(function()
{
    $(this).attr('autocomplete', 'off');
});
</script>
@section('scripts')
@show