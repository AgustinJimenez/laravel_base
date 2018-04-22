<script type="text/javascript" charset="utf-8" defer>

    function provider_submit_form( form_element, event, callback )
    {
        TMP_DATA = {};
        form_element.serializeArray().forEach(function(element, index)
        {
            TMP_DATA[element.name] = element.value;
        });

        provider_http( form_element.attr("action"), form_element.attr("method"), TMP_DATA, null, callback );
        event.preventDefault();
    }

    function provider_refresh_table()
    {
        DATATABLE_TABLE.draw();
    }

    function provider_http(  url, callback, params, type, headers )
    {
        url = url || null;
        type = type || 'GET';
        params = params || {};
        headers = headers || {};
        callback = callback || function(){};

        headers['X-CSRF-TOKEN'] = '{{ csrf_token() }}';


        if( type == 'DELETE' || type == 'PUT' )
        {
            params['_method'] = type;
            type = 'POST';
        }
        //console.log("HTTP SENDING===>", 'type=',type, 'headers=', headers,'url=',  url,'params=', params)
        $.ajax
        ({
            type: type,
            headers: headers,
            url: url,
            data: params,
            success: function(data, textStatus, jQxhr) 
            {
                PROVIDER_TMP_RESPONSE = data;

                //console.log("GETTING", data, (PROVIDER_TMP_RESPONSE.error == undefined || PROVIDER_TMP_RESPONSE.error == true)  );

                if ( PROVIDER_TMP_RESPONSE.error == undefined || PROVIDER_TMP_RESPONSE.error == true )
                {
                    if( PROVIDER_TMP_RESPONSE.messages != undefined )
                        provider_show_alert(PROVIDER_TMP_RESPONSE.messages, 'red');
                }
                else
                {
                    if( PROVIDER_TMP_RESPONSE.messages != undefined )
                        provider_show_alert(PROVIDER_TMP_RESPONSE.messages, 'blue');
                        
                    callback();
                }
                
                provider_refresh_table();
            },
            error: function(jqXhr, textStatus, errorThrown) 
            {
                provider_show_bootstrap_alert_messages("Ocurrio un error inesperado.", 'danger');
                console.log(jqXhr, textStatus, errorThrown);
            }
        });
    }

    function provider_show_alert(message, type)
    {
        $.alert
        ({
            title: 'MENSAJE',
            content: '<h4>'+message+"</h4>",
            type: type,// 'blue', 'red'
            backgroundDismiss: true
        });
    }

    function provider_show_bootstrap_alert_messages(message, type, container)
    {
        container = (container != undefined) ? container : DIV_ALERT_MESSAGES_CONTAINER; 
        let html = '<div class="alert alert-'+type+'">'+
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                            message+
                    '</div>';
                    
        container.hide().html( html ).fadeIn('slow');
    }

    function provider_confirm( content, type, accept_callback, cancel_callback, accept_text, cancel_text, accept_btn_class, cancel_btn_class, title )
    {
        //console.log('provider_confirm(', content, type, accept_callback, cancel_callback, accept_text, cancel_text, accept_btn_class, cancel_btn_class, title)
        type = type | 'blue';//'blue', 'red'

        $.confirm
        ({
            title: title | 'CONFIRMACIÓN',
            content: content | '',
            backgroundDismiss: true,
            type: type,
            buttons: 
            {
                accept: 
                {
                    text: (accept_text | 'OK'),
                    btnClass: (accept_btn_class | 'btn-default'),
                    action: (accept_callback | function(){})
                },
                cancel: 
                {
                    text: (cancel_text | 'CERRAR'),
                    btnClass: (cancel_btn_class | 'btn-default'),
                    action: (cancel_callback | function(){})
                }
            }
        });
    }

</script>