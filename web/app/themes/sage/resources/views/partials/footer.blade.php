@php
    $company = get_field('company_name', 'options');
    $top = get_field('back_to_top', 'options');
    $facebook = get_field('facebook', 'options');
    $instagram = get_field('instagram', 'options');
    $twitter = get_field('twitter', 'options');
    $linkedin = get_field('linkedin', 'options');
@endphp

<footer class="footer" data-animate="fade-to-top">
    <div class="container">
        <div class="footer-top">
            @if ($top)
                <div class="back-to-top">
                    <button class="h2">{!! $top !!}</button>
                </div>
            @endif
        </div>

        <div class="footer-bottom" id="contact">
            @if ($company)
                <div class="footer-copy">&copy; {!! $company !!} {{ date('Y') }}</div>
            @endif

            @if (App\custom_menu_object('footer_navigation'))
                <div class="footer-nav">
                    @foreach(App\custom_menu_object('footer_navigation') as $item)
                        @include('partials.navbar.item', ['item' => $item])
                    @endforeach
                </div>
            @endif

            <div class="footer-social">
                @if ($facebook)
                    <a href="{!! $facebook !!}" target="_blank" title="Facebook"><i class="icon-facebook"></i></a>
                @endif

                @if ($instagram)
                    <a href="{!! $instagram !!}" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                @endif

                @if ($twitter)
                    <a href="{!! $twitter !!}" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                @endif

                @if ($linkedin)
                    <a href="{!! $linkedin !!}" target="_blank" title="LinkedIn"><i class="icon-linkedin"></i></a>
                @endif
            </div>
        </div>
    </div>
</footer>
