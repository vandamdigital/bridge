@php
    if (!isset($sizes['source'])) {
        $sizes = [
            'source' => [
                '1920px' => 'w-1920',
                '1280px' => 'w-1280',
                '768px'  => 'w-768',
                '568px'  => 'w-568',
            ],
        ];
    }

   if (!isset($alt)) {
      $alt = get_post_meta( $imageID, '_wp_attachment_image_alt', true );
   }

    if (!isset($class)) {
        $class = '';
    }
@endphp

<picture @if($class) class="{{ $class }}"@endif>
    @if(count($sizes['source']) > 1)
        @foreach($sizes['source'] as  $key => $value)
            <source srcset="<?= wp_get_attachment_image_src( $imageID, $value )['0']; ?>"
                    media="(min-width: <?= $key; ?>)">
            @if($loop->last)
                <img src="<?= wp_get_attachment_image_src( $imageID, $value )['0']; ?>" alt="{{ $alt }}"/>
            @endif
        @endforeach
    @else
        @foreach($sizes['source'] as  $key => $value)
            <img src="<?= wp_get_attachment_image_src( $imageID, $value )['0']; ?>" alt="{{ $alt }}"/>
        @endforeach
    @endif
</picture>