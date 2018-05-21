
function App
(
    config = {}, 
    debug = true, 
    template_container_id = "#template-content-container", 
    template_refresh_button_id = "#template-refresh-button", 
    template_back_button_id = "#template-back-button"
)
{
    let app = this;
    $.fn.dataTable.ext.errMode = 'none';
    app.config = config;
    app.debug = debug;
    app.response = '';
    app.datatables_list = [];
    app.template_content_container = $(template_container_id);
    app.buttons = 
    {
        refresh: $(template_refresh_button_id),
        back: $(template_back_button_id)
    };
    app.visited_urls = [];
    app.params = {}
    app.refresh_datatables = () => app.datatables_list.forEach(table => table.draw());
    app.visited_urls.get_last_url_visited = () => app.visited_urls.slice(-1)[0]
    /*
    {
        if( app.debug )
            console.log("LAST URL=", app.visited_urls.slice(-1)[0]);

        return app.visited_urls.slice(-1)[0];
    };
    */

    app.buttons.refresh.show_reload_animation = () => app.buttons.refresh.children("i").addClass('fa-spin');
    app.buttons.refresh.stop_reload_animation = () => app.buttons.refresh.children("i").removeClass('fa-spin');
    app.visited_urls.has_urls = () => app.visited_urls.length > 1;

    app.visited_urls.add_visited_url = url =>
    {

        if( url !== app.visited_urls.get_last_url_visited() )
        {
            app.visited_urls.push( url );

            if( app.debug )
                console.log("ADDING URL=("+url+") TO VISITED-URLS-LIST===>",app.visited_urls);
        }
            
    };

    app.visited_urls.add_visited_url( window.location.href );

    app.alert = (message, type = 'red') => $.alert
    ({
        title: 'AVISO',
        content: '<h4>'+message+"</h4>",
        type: type,// 'blue', 'red'
        backgroundDismiss: true
    });

    app.confirm =
    ( 
        content = "", 
        type = 'blue', 
        accept_callback = (() => {}), 
        cancel_callback  = (() => {}), 
        accept_text = 'OK', 
        cancel_text = 'CERRAR',
        accept_btn_class = 'btn-default', 
        cancel_btn_class = 'btn-default', 
        title = 'CONFIRMACIÓN' 
    ) =>
    {
        if( app.debug )
            console.log('provider_confirm(', content, type,/* accept_callback, cancel_callback,*/ accept_text, cancel_text, accept_btn_class, cancel_btn_class, title)
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

    app.response_error_handler = (type = "default") =>
    {
        switch(type)
        {
            case "default":

                let errors = [];
                if( app.response != undefined && app.response.error == true )
                    if( app.response.messages != undefined )
                        if( typeof app.response.messages == "string")
                            app.toast( app.response.messages );
                        else if( typeof app.response.messages == "object")
                        {
                            for (let key in app.response.messages)
                                for(let message of app.response.messages[key])
                                    errors.push(message);

                            app.toast( errors );   
                        }
                else
                    if( app.response != undefined && app.response.messages != undefined )
                        app.alert(app.response.messages, 'warning');
                    else
                        app.toast( "Ocurrio un error inesperado." );

            break;
            default:
                app.toast( "Ocurrio un error inesperado." );

        }
        
    }

    app.http = (  url = null, callback = null, params = {}, type = 'GET', headers = {} ) =>
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
            console.log("HTTP SENDING===>", 'type=',type, 'headers=', headers,'url=',  url,'params=', params/*, "callback=", callback */);

        app.buttons.refresh.show_reload_animation();

        $.ajax
        ({
            type: type,
            headers: headers,
            url: url,
            data: params,
            success: (data, textStatus, jQxhr) =>
            {

                if(data===undefined && app.debug)
                    app.toast("Resonpones is undefined");

                app.response = data;    

                if( app.debug && false )
                    console.log("GETTING", app.response  );
               
                console.log("REPONSE-LENGTH===>", app.response.length  );
                app.response_error_handler();
                console.log("REPONSE-LENGTH===>", app.response.length  );
                if(type=="GET")
                    app.visited_urls.add_visited_url(url);

                app.buttons.refresh.stop_reload_animation();
                
                if(callback!=null)
                    callback();
                else
                    app.actions.refresh_page();
            },
            error: (jqXhr, textStatus, errorThrown) =>
            {
                //app.response = jqXhr.responseJSON;
                app.response_error_handler();

                if( app.debug )
                    console.log( "ERROR: jqXhr ===> ", jqXhr, "ERROR: textStatus ===> ",textStatus, "ERROR: errorThrown ===> ",errorThrown  );
                    console.log("REPONSE-LENGTH===>", app.response.length  );
                app.buttons.refresh.stop_reload_animation();
            }
        });

    };


    

    app.buttons.refresh.click( event => app.http( app.visited_urls.get_last_url_visited(), app.actions.refresh_content ) );
    
    app.buttons.back.click( event =>
    {
        app.visited_urls.pop();
        app.http( app.visited_urls.get_last_url_visited(), app.actions.refresh_content );
    });

    app.toast = 
    (
        text, 
        icon = 'error', 
        heading = 'Warning', 
        Loader_bg = '#9EC600', 
        loader = true, 
        hideAfter = 5000, 
        allowToastClose = true, 
        stack = 4
    ) =>
    {
        $.toast
        ({
            heading: heading,
            position: 'top-right',//bottom-left - bottom-right - bottom-center - top-right - top-left - top-center - mid-center
            text: text,
            icon: icon,// success - error - warning - info
            loader: loader,        // Change it to false to disable loader
            loaderBg: Loader_bg, // To change the background
            showHideTransition: 'fade',//slide - fade - plain 
            hideAfter: hideAfter,// true - false - 5000
            allowToastClose: allowToastClose,
            stack: stack //how many maximum toasts you want to show
        });
    }

    app.actions =
    {
        delete_ajax: route => app.confirm( "Desea eliminar el registro?", "red", (() => {app.http(  route, null, {}, 'DELETE' )})) ,
        refresh_content: () =>
        {
            if(debug)
                console.log("RUNNING REFRESH-CONTENT / CONTENT===>", app.reponse );
            //REFRESH-CONTENT
            if( app.response === undefined )
                app.toast("No content to refreh.");

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
        refresh_page: () =>
        {
            let last_url = app.visited_urls.get_last_url_visited();

            if(last_url != undefined)
                app.http( last_url, app.actions.refresh_content );
        }

    };


    app.set_dynamic_content = () => 
    {
        $(document).on('submit', 'form', function(event)
        {
            if( $(this).attr('id') != 'template-form-logout' )
            {
                event.preventDefault();
                app.params = {};
                for( let field of $(this).serializeArray() )
                    app.params[field.name] = field.value;
                
                app.http( $(this).attr('action'), app.actions.refresh_content , app.params, $(this).attr("method") );
            }
        });

        document.onkeydown = (e = window.event) =>
        {
            if (e.keyCode == 116) 
            {
                e.preventDefault();
                app.actions.refresh_page();
            }
        };

        $(document).on('click', "a[href!='#']", function(event)
        {
            let clicked_link = $(this).attr("href");
            
            if(app.debug)
                console.log("clicked===>", clicked_link);

            
            app.http( clicked_link, app.actions.refresh_content );
            
            event.preventDefault();

        });
    }

    

    /*
    app.set_dropzone = 
    ( 
        id_selector_submit = "#btn-submit-dropzone"
    ) =>  
    {
        console.log("hello dropzone");
        Dropzone.options.myDropzone =  
        { 
            autoProcessQueue: false, 
            uploadMultiple: true, 
            init: function()  
            { 
                var submitBtn = document.querySelector(id_selector_submit); 
                myDropzone = this; 
                 
                submitBtn.addEventListener("click", function(e) 
                { 
                    e.preventDefault(); 
                    e.stopPropagation(); 
                    myDropzone.processQueue(); 
                }); 
                 
                this.on("complete", files => myDropzone.removeFile(files)); 
                this.on("success", () => myDropzone.processQueue.bind(myDropzone) ); 
            }
        }
    };
    */
    

    app.set_datatable = 
    (
        source = "", 
        columns = [{ data: 'actions', name: 'actions', orderable: false, searchable: false}], 
        request_handler = (request => {}), 
        response_handler = (response => response.data),
        selector = '.data-table',
        order = [[ 0, "asc" ]], 
        default_datas_count = 10,
        tool_bar = "<'toolbar'><'row'<'col-xs-12'<'col-xs-6'l><'col-xs-6'p>>r><'row'<'col-xs-12't>><'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>"
    ) => 
    {

        let new_datatable = $(selector).DataTable
        ({
            dom: tool_bar,
            deferRender: true,
            processing: true,
            serverSide: true,
            order: order,
            paginate: true,
            lengthChange: true,
            iDisplayLength: default_datas_count,
            filter: true,
            sort: true,
            info: true,
            autoWidth: true,
            paginate: true,
            initComplete: (()=>{}),
            //"drawCallback": reordenar_celdas(),
            ajax: 
            {
                url: source,
                type: "GET",
                headers: {'X-CSRF-TOKEN': app.csrf_token },
                data: request_handler,
                dataSrc: response_handler,
            },
            columns: columns,
            language: 
            {
                processing:     "Procesando...",
                search:         "Buscar",
                lengthMenu:     "Mostrar _MENU_ Elementos",
                info:           "Mostrando de _START_ a _END_ registros de un total de _TOTAL_ registros",
                //infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   ".",
                infoPostFix:    "",
                loadingRecords: "Cargando Registros...",
                zeroRecords:    "No existen registros disponibles",
                emptyTable:     "No existen registros disponibles",
                paginate: 
                {
                    first:      "Primera",
                    previous:   "<i class='fa fa-chevron-left'></i>",
                    next:       "<i class='fa fa-chevron-right'></i>",
                    last:       "Ultima"
                }
            } 
        });

        app.datatables_list.push(new_datatable);
    }

    $("input").each(function()
    {
        $(this).attr("autocomplete", "off");
    });

    

}