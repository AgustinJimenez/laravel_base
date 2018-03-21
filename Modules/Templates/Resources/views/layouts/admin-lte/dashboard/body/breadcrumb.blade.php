@section('breadcrumb')
    <ol class="breadcrumb">
        <?php $template_url = ''; ?>
        @foreach( $template_requested_path = explode('/', request()->path()) as $key => $value )
        @php($template_url .= '/'.$value)
        @if( (int)$value == '' )
            <li @if( count($template_requested_path) == $key ) class="active"@endif> 

            <a href="{{ url( $template_url ) }}">
                {{ $value }}
            </a>
            </li>
        @endif 
        @endforeach
    </ol>
@show