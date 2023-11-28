@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $text = $content['text'];
    $link = $content['link'];
@endphp

<section class="section section--intro" @if($slug)id="{{ $slug }}"@endif data-animate="fade-to-top">
    <div class="container">
        <div class="row justify-content-md-center">
            @if($text)
                <div class="col-lg-8 col-xxl-9">
                    <div class="intro-text" data-splitting data-effect1>
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
