@php
    $flexible_content = get_field( 'flexible_content' );
@endphp

@if($flexible_content)
    @foreach($flexible_content as $key => $content)
        @includeIf('partials.flexible-content.' . $content['acf_fc_layout'] . '')
    @endforeach
@endif