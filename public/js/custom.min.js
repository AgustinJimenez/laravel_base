
function App
(
    csrf_token, 
    debug = false, 
    ctx = "body", 
    template_container_id = "#template-content-container", 
    template_refresh_button_id = "#template-refresh-button", 
    template_back_button_id = "#template-back-button"
)
{
    let app = this;
    app.ctx = $(ctx);
    app.debug = debug;
    app.response = null;
    app.csrf_token = csrf_token;
    app.template_content_container = $(template_container_id);
    app.buttons = 
    {
        refresh: $(template_refresh_button_id),
        back: $(template_back_button_id)
    };
    app.events = {};
    app.visited_urls = [];

    app.visited_urls.get_last_url_visited = function()
    {
        //if( app.debug )
            //console.log("LAST URL=", app.visited_urls.slice(-1)[0]);

        return app.visited_urls.slice(-1)[0];
    };

    app.buttons.refresh.show_reload = function()
    {
        app.buttons.refresh.children("i").addClass('fa-spin');
    };

    app.buttons.refresh.stop_reload = function()
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

    app.f5_was_clicked = function()
    {
        let last_url = app.visited_urls.get_last_url_visited();

        if(last_url != undefined)
            app.http( last_url, app.events.refresh_content );
    }

    app.events.refresh_content = function()
    {
        app.template_content_container.stop().html( app.response );
    }

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

    app.confirm = function( content, type, accept_callback, cancel_callback, accept_text, cancel_text, accept_btn_class, cancel_btn_class, title )
    {
        if( app.debug )
            console.log('provider_confirm(', content, type, accept_callback, cancel_callback, accept_text, cancel_text, accept_btn_class, cancel_btn_class, title)
    
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
    };

    app.http = function(  url = null, callback = null, params = {}, type = 'GET', headers = {} )
    {
        //callback = (callback!=null)?callback:function(){};
        type = type.toUpperCase();
        headers['X-CSRF-TOKEN'] = app.csrf_token;
    
        if( type == 'DELETE' || type == 'PUT' )
        {
            params['_method'] = type;
            type = 'POST';
        }
    
        if( app.debug )
            console.log("HTTP SENDING===>", 'type=',type, 'headers=', headers,'url=',  url,'params=', params);

        app.buttons.refresh.show_reload();

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
                    console.log("GETTING", data, app.response.error  );
    
                if( app.response.error == undefined || app.response.error == true )
                {
                    if( app.response.messages != undefined )
                        app.alert( app.response.messages );
                }
                else
                {
                    if( app.response.messages != undefined )
                        app.alert(app.response.messages, 'blue');
                }

                if(type=="GET")
                    app.visited_urls.add_visited_url(url);

                app.buttons.refresh.stop_reload();

                callback();
            },
            error: function(jqXhr, textStatus, errorThrown) 
            {
                app.alert("Ocurrio un error inesperado.", 'red');

                app.buttons.refresh.stop_reload();
            }
        });

    };


    app.ctx.on('click', "a[href!='#']", function(event)
    {
        let clicked_link = $(this).attr("href");
        
        if(app.debug)
            console.log("LINK CLICKED!!!", clicked_link);

        
        app.http( clicked_link, app.events.refresh_content );
        
        event.preventDefault();

    });

    app.buttons.refresh.click(function(event)
    {
        app.http( app.visited_urls.get_last_url_visited(), app.events.refresh_content );
    });
    
    app.buttons.back.click(function(event)
    {
        app.visited_urls.pop();
        app.http( app.visited_urls.get_last_url_visited(), app.events.refresh_content );
    });

    $("body").on('submit', 'form', function(event)
    {
        event.preventDefault();

        let form_data = {};

        for( let field of $(this).serializeArray() )
            form_data[field.name] = field.value;
        
        app.http( $(this).attr('action'), app.events.refresh_content , form_data, $(this).attr("method") );
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
            app.f5_was_clicked();
        }
    }


}