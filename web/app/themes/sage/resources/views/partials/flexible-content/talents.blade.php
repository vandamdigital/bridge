@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $text = $content['text'];
    $image = $content['image'];
    $persons = $content['persons'];
@endphp

<section class="section section--text-image" @if($slug)id="{{ $slug }}"@endif data-animate="fade-to-top">
    <div class="container">
       <div class="text-image">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if ($title)
                <h2 class="text-image__title">{!! $title !!}</h2>
                @endif

                @if ($text)
                <p>{!! $text !!}</p>
                @endif
            </div>
            {{-- <div class="col-lg-6">
                @if ($image)
                    <figure class="image">
                        @include('components.picture', ['imageID' => $image])
                    </figure>
                @endif
            </div> --}}
        </div>            
        </div>
        @if ($persons)
        <div class="footer-persons">
            @foreach ($persons as $person)
                @include('components.card.person', ['item' => $person])
            @endforeach
        </div>
        @endif    


    </div>
</section>
