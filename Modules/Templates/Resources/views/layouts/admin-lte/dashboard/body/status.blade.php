@section('status')
 
    @if (session('status'))
    <br>
    <div class="container-fluid">
        <div class="callout callout-success">
            {{ session('status') }}
        </div>
    </div>
    @endif
    
    <?php
        $TEMPLATE_type = session()->has('success') ? 'success' : ( session()->has('error') ? 'error' : ( session()->has('warning') ? 'warning' : null ) );
        $TEMPLATE_alert_class = ($TEMPLATE_type == 'success') ? 'alert-success' : ( $TEMPLATE_type == 'error' ? 'alert-danger' : 'alert-warning' );
    ?>

    @if( isset($TEMPLATE_type) and $TEMPLATE_type )
        <div class="alert {{ $TEMPLATE_alert_class }} fade in alert-dismissable">
        
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            @if( is_array( $TEMPLATE_session_messages = session()->get($TEMPLATE_type) ) )
                <ul>
                @foreach ($TEMPLATE_session_messages as $message)
                    <li>{{ $message }}</li>
                @endforeach
                </ul>
                
            @else
                {{ $TEMPLATE_session_messages }}
            @endif

        </div>
    @endif

@show

@section('error')
    @if( $errors->any() )
        <br>
        <div class="alert alert-danger fade in alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <ul>
            @foreach ($errors->all() as $error)
                <li>ERROR: {{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
@show