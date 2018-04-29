
function App
(
    config = {}, 
    debug = false, 
    template_container_id = "#template-content-container", 
    template_refresh_button_id = "#template-refresh-button", 
    template_back_button_id = "#template-back-button"
)
{
    let app = this;
    app.config = config;
    app.debug = debug;
    app.response = null;
    app.template_content_container = $(template_container_id);
    app.buttons = 
    {
        refresh: $(template_refresh_button_id),
        back: $(template_back_button_id)
    };
    app.visited_urls = [];
    app.params = {}

    app.visited_urls.get_last_url_visited = function()
    {
        //if( app.debug )
            //console.log("LAST URL=", app.visited_urls.slice(-1)[0]);

        return app.visited_urls.slice(-1)[0];
    };

    app.buttons.refresh.show_reload_animation = function()
    {
        app.buttons.refresh.children("i").addClass('fa-spin');
    };

    app.buttons.refresh.stop_reload_animation = function()
    {
        app.buttons.refresh.children("i").removeClass('fa-spin');
    };

    app.visited_urls.has_urls = function()
    {
        return app.visited_urls.length > 1;
    };

    app.visited_urls.add_visited_url = function(url)
    {

        if( url !== app.visited_urls.get_last_url_visited() )
        {
            app.visited_urls.push( url );

            if( app.debug )
                console.log("ADDING URL=("+url+") TO VISITED-URLS-LIST===>",app.visited_urls);
        }
            
    };

    app.visited_urls.add_visited_url( window.location.href );

    app.alert = function(message, type = 'red')
    {
        $.alert
        ({
            title: 'AVISO',
            content: '<h4>'+message+"</h4>",
            type: type,// 'blue', 'red'
            backgroundDismiss: true
        });
    };

    app.confirm = function
    ( 
        content = "", 
        type = 'blue', 
        accept_callback = (function(){}), 
        cancel_callback  = (function(){}), 
        accept_text = 'OK', 
        cancel_text = 'CERRAR',
        accept_btn_class = 'btn-default', 
        cancel_btn_class = 'btn-default', 
        title = 'CONFIRMACIÓN' 
    )
    {
        if( app.debug )
            console.log('provider_confirm(', content, type, accept_callback, cancel_callback, accept_text, cancel_text, accept_btn_class, cancel_btn_class, title)
        //'blue', 'red'
        $.confirm
        ({
            title: title,
            content: content,
            backgroundDismiss: true,
            type: type,
            buttons: 
            {
                accept: 
                {
                    text: accept_text,
                    btnClass: accept_btn_class,
                    action: accept_callback
                },
                cancel: 
                {
                    text: cancel_text,
                    btnClass: cancel_btn_class,
                    action: cancel_callback
                }
            }
        });

    };

    app.response_error_handler = function(type = "default")
    {
        switch(type)
        {
            case "default":

                let errors = "";
                if( app.response != undefined && app.response.error == true )
                    if( app.response.messages != undefined )
                        if( typeof app.response.messages == "string")
                            app.alert( app.response.messages );
                        else if( typeof app.response.messages == "object")
                        {
                            for (let key in app.response.messages)
                                for(let message of app.response.messages[key])
                                    errors += "\n- "+message;

                            app.alert( errors );   
                        }
                else
                    if( app.response != undefined && app.response.messages != undefined )
                        app.alert(app.response.messages, 'blue');
                    else
                        app.alert( "Ocurrio un error inesperado." );

            break;
            default:
                app.alert( "Ocurrio un error inesperado." );

        }
        
    }

    app.http = function(  url = null, callback = (function(){}), params = {}, type = 'GET', headers = {} )
    {
        type = type.toUpperCase();

        if(app.config.csrf_token!=undefined)
            headers['X-CSRF-TOKEN'] = app.config.csrf_token;
    
        if( type == 'DELETE' || type == 'PUT' )
        {
            params['_method'] = type;
            type = 'POST';
        }
    
        if( app.debug )
            console.log("HTTP SENDING===>", 'type=',type, 'headers=', headers,'url=',  url,'params=', params);

        app.buttons.refresh.show_reload_animation();

        $.ajax
        ({
            type: type,
            headers: headers,
            url: url,
            data: params,
            success: function(data, textStatus, jQxhr) 
            {
                app.response = data;

                if( app.debug )
                    console.log("GETTING", app.response  );
                
                app.response_error_handler();

                if(type=="GET")
                    app.visited_urls.add_visited_url(url);

                app.buttons.refresh.stop_reload_animation();
                
                if(callback!=null)
                    callback();
                else
                    app.actions.refresh_page();
            },
            error: function(jqXhr, textStatus, errorThrown) 
            {
                app.response = jqXhr.responseJSON;
                app.response_error_handler();

                if( app.debug )
                    console.log( "ERROR: jqXhr ===> ", jqXhr, "ERROR: textStatus ===> ",textStatus, "ERROR: errorThrown ===> ",errorThrown  );

                app.buttons.refresh.stop_reload_animation();
            }
        });

    };


    $(document).on('click', "a[href!='#']", function(event)
    {
        let clicked_link = $(this).attr("href");
        
        if(app.debug)
            console.log("LINK CLICKED!!!", clicked_link);

        
        app.http( clicked_link, app.actions.refresh_content );
        
        event.preventDefault();

    });

    app.buttons.refresh.click(function(event)
    {
        app.http( app.visited_urls.get_last_url_visited(), app.actions.refresh_content );
    });
    
    app.buttons.back.click(function(event)
    {
        app.visited_urls.pop();
        app.http( app.visited_urls.get_last_url_visited(), app.actions.refresh_content );
    });

    app.actions = 
    {
        delete_ajax: function(route)
        {
            app.confirm( "Desea eliminar el registro?", "red", (function(){app.http(  route, (()=>{}), {}, 'DELETE' )}))
        },
        refresh_content: function()
        {
            app.template_content_container.stop().html( app.response );
            $("input[type=text]").each(function()
            {
                $(this).attr("autocomplete", "off").attr("oninvalid", "this.setCustomValidity('Por favor, completar el campo')").attr("oninput", "setCustomValidity('')");
            });
            $('input').iCheck
            ({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue',
            increaseArea: '60%' // optional
            });
        },
        refresh_page: function()
        {
            let last_url = app.visited_urls.get_last_url_visited();

            if(last_url != undefined)
                app.http( last_url, app.actions.refresh_content );
        }

    };

    $(document).on('submit', 'form', function(event)
    {
        event.preventDefault();

        app.params = {};

        for( let field of $(this).serializeArray() )
            app.params[field.name] = field.value;
        
        app.http( $(this).attr('action'), app.actions.refresh_content , app.params, $(this).attr("method") );
    });

    document.onkeydown = function(e)
    {
        e = e || window.event;
        /*
        if (e.keyCode == 38) 
        {
            // up arrow
        }
        else if (e.keyCode == 40) 
        {
            // down arrow
        }
        else if (e.keyCode == 37) 
        {
            //left_arrow_was_clicked();
        }
        else if (e.keyCode == 39) 
        {
        // right arrow
        }
        else if (e.keyCode == 13) 
        {
            //enter_was_clicked();
        }
        */
        if (e.keyCode == 116) 
        {
            e.preventDefault();
            app.actions.refresh_page();
        }
    }


}