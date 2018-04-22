<script type="text/javascript" charset="utf-8" defer>
	var config = 
	{
		datatable:
		{
			order: [[ 0, "asc" ]],
			ajax_source: '{!! route('admin.media.index_ajax') !!}',
			send_request: function (request) 
            {
                //request.categoria_id = INPUT_SELECT_CATEGORIA.val();
                //request.nombre = INPUT_TEXT_NOMBRE.val();
                //request.proceso_id = INPUT_SELECT_PROCESO.val();
            },
            data_source: function ( json ) 
            {
                return json.data;
            },
            initComplete: function()
            {
                //set_icheckbox();
            },
            columns: 
            [
                { data: 'thumbnail', name: 'thumbnail', orderable: true, searchable: false},
                { data: 'filename', name: 'filename', orderable: true, searchable: false},
                { data: 'actions', name: 'actions', orderable: false, searchable: false}
            ],
            default_datas_count: 10,
            tool_bar: '<"toolbar">' + "<'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r>"+
                        "<'row'<'col-xs-12't>>"+
                        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>"




		}//end datatable
	}

</script>