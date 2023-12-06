@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $text = $content['text'];
    $anchor = $content['anchor'];
@endphp

<section class="section section--hero" @if($slug)id="{{ $slug }}"@endif>
    <div class="container">
        @if ($title)
            <h1 class="big text-blueberry" data-effect2>{!! $title !!}</h1>
        @endif

        @if ($text)
            <div class="row justify-content-center" data-animate="fade-to-top" data-animate-delay=".6">
                <div class="col-md-10 col-lg-8 col-xxl-6">
                    <div class="hero-text">{!! $text !!}</div>
                </div>
            </div>
        @endif

        @if ($anchor)
            <a href="#talenten" class="btn hero-anchor" data-animate="fade-to-top">{!! $anchor !!}</a>
        @endif
    </div>
    <div id="scroll"></div>
</section>
