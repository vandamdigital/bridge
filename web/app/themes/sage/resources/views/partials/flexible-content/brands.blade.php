@php
    $section = $content['section'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section)));
    $title = $content['title'];
    $button = $content['button'];
    $brands = $content['brands'];
@endphp

@if ($brands)
    <section class="section section--brands" @if($slug)id="{{ $slug }}"@endif>
        <div class="container">
            @if ($title)
                <h2 class="brands-title">{!! $title !!}</h2>
            @endif
        </div>

        <div class="slider" style="--data-count: {{ count($brands) * 3 }}">
            <div class="slide-track">
                @foreach (range(1, 3) as $a)
                    @foreach($brands as $key => $item)
                        <div class="slide">
                            @include('components.picture', ['imageID' => $item])
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="brands-bottom">
                @if ($button && $button['url'])
                    @include('components.button', ['item' => $button])
                @endif
            </div>
        </div>
    </section>
@endif
