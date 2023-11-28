@php
    $sections = get_field('flexible_content');
    $persons = get_field('persons', 'options');
    $button = get_field('navbar_button', 'options');
@endphp

<nav class="navbar">
    @if($sections)
        <div class="navbar-menu">
            @foreach($sections as $section)
                @php
                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $section['section'])));
                @endphp

                @if($slug)
                    <a href="#{!! $slug !!}">{!! $section['section'] !!}</a>
                @endif
            @endforeach

            @if ($persons)
                <a href="#contact">Contact</a>
            @endif
        </div>
    @endif

    <a class="navbar-brand back-to-top" href="{{ home_url('/') }}">
        @include('assets.logo')
    </a>

    @if ($button && $button['url'])
        <div class="navbar-button">
            @include('components.button', ['item' => $button])
        </div>
    @endif
</nav>
