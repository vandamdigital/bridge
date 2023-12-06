@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $text = $content['text'];
    $afbeelding = $content['afbeelding_links'];
    $link = $content['link'];
@endphp

<section class="section section--intro" @if($slug)id="{{ $slug }}"@endif data-animate="fade-to-top">
    <div class="container">
        <div class="row">
            @if($text)
                <div class="col-lg-4">
                    @include('components.picture', ['imageID' => $afbeelding])
                </div>
            @endif
            @if($text)
            <div class="col-lg-8">
                    <div class="intro-text">
                        @if ($title)
                            <h3 class="intro-text__title" data-animate="fade-to-right">{!! $title !!}</h3>
                        @endif
                        {!! $text !!}

                        @if ($link && $link['url'])
                            @include('components.button', ['item' => $link])
                        @endif
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>
