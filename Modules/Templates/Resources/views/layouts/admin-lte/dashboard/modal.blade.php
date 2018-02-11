<div id="modal-container">

</div>
<script type="text/javascript">
    /*
    open_generic_modal( 
        "SUSCRIPCIONES", 
        response, 
        null
    );
    */
    function open_generic_modal
    ( 
        button,
        type = 'delete',
        title_content = null,
        body_content = null
    )
    {

        if( type == 'delete' )
        {
            modal = 
            '<div class="modal modal-danger fade in" id="generic-modal" style="display: block;">'+
                '<div class="modal-dialog">'+
                    '<div class="modal-content">'+
                    '<div class="modal-header">'+
                        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                        '<span aria-hidden="true">×</span></button>'+
                        '<h4 class="modal-title text-center">' + title_content + '</h4>'+
                    '</div>'+
                    '<div class="modal-body text-center">'+
                        body_content+
                   '</div>'+
                    '<div class="modal-footer">'+
                        '<form action="' + button.attr("href") + '" method="POST">'+
                            '{{ csrf_field() }}'+
                            '<input type="hidden" name="_method" value="DELETE">'+
                            '<button type="submit" class="btn btn-danger btn-outline pull-right">OK</button>'+
                        '</form>'+
                        '<button type="button" class="btn btn-danger btn-outline pull-right" data-dismiss="modal">Close</button>'+
                   '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'
        }

        if( title_content != null )
            $("#modal-container").html( modal );

        $("#modal-container").find("#generic-modal").modal("show");

    }

</script>