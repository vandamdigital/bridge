@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $text = $content['text'];
    $imageLeft = $content['image_left'];
    $image = $content['image'];
    $imageRight = $content['image_right'];
@endphp

<section class="section section--text-image" @if($slug)id="{{ $slug }}"@endif data-animate="fade-to-top">
    <div class="container">
        <div class="text-image">
            <div class="text-image__images">
                @if ($imageLeft)
                    <figure class="image-left">
                        @include('components.picture', ['imageID' => $imageLeft])
                    </figure>
                @endif

                @if ($image)
                    <figure class="image">
                        @include('components.picture', ['imageID' => $image])
                    </figure>
                @endif

                @if ($imageRight)
                    <figure class="image-right">
                        @include('components.picture', ['imageID' => $imageRight])
                    </figure>
                @endif
            </div>

            <div class="text-image__content">
                @if ($title)
                    <h2 class="text-image__title">{!! $title !!}</h2>
                @endif

                @if ($text)
                    <div class="text-image__text">{!! $text !!}</div>
                @endif
            </div>
        </div>
    </div>
</section>
