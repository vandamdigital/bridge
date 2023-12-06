@php
    $image = $item['image'];
    $name = $item['name'];


    $email = $item['email'];
@endphp

<div class="card card--person">
    @if ($image)
        <figure class="card-figure">
            @include('components.picture', ['imageID' => $image])
        </figure>
    @endif

    <div class="card-content">
        @if ($name)
            <div>
               
                    <div class="card-name h5">{!! $name !!}</div>
          

            </div>
        @endif

        @if ($email)
            <div class="card-links">

         
                    <a href="mailto:{!! $email !!}" class="card-link card-link--email h6" target="_blank" title="{!! $email !!}">{!! $email !!}</a>
         
            </div>
        @endif
    </div>
</div>
