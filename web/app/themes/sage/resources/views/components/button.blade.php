@php
    if (!isset($class)) {
        $class = '';
    }
@endphp

<a href="{{ $item['url'] }}" class="btn {{ $class }}" target="{{ $item['target'] ? $item['target'] : '_self' }}" title="{{ $item['title'] }}">{{ $item['title'] }}</a>