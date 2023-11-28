@php
    $image = $item['image'];
    $name = $item['name'];
    $function = $item['function'];
    $phone = $item['phone'];
    $email = $item['email'];
@endphp

<div class="card card--person">
    @if ($image)
        <figure class="card-figure">
            @include('components.picture', ['imageID' => $image])
        </figure>
    @endif

    <div class="card-content">
        @if ($name || $function)
            <div>
                @if ($name)
                    <div class="card-name h5">{!! $name !!}</div>
                @endif

                @if ($function)
                    <div class="card-function">{!! $function !!}</div>
                @endif
            </div>
        @endif

        @if ($phone || $email)
            <div class="card-links">
                @if ($phone)
                    <a href="tel:{!! $phone !!}" class="card-link h6" target="_blank" title="{!! $phone !!}">{!! $phone !!}</a>
                @endif

                @if ($email)
                    <a href="mailto:{!! $email !!}" class="card-link card-link--email h6" target="_blank" title="{!! $email !!}">{!! $email !!}</a>
                @endif
            </div>
        @endif
    </div>
</div>
