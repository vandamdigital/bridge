@if (empty($_COOKIE['enabl_consent']) && !is_page_template('cookies.blade.php'))
    <div class="notification notification--cookies">
        <div class="notification__body">
            @if($content = get_field('cookiebar_content', 'option'))
                <div class="notification__content body--small">
                    {!! $content !!}
                </div>
            @endif
            <div class="notification__buttons">
                @if($cookie_page = get_field('cookiebar_page', 'options'))
                    <a href="{{ $cookie_page['url'] }}" class="btn btn--green btn--text"
                       target="{{ $cookie_page['target'] ? : '_self' }}">{{ $cookie_page['title']  }}</a>
                @endif
                <button type="button" class="btn btn--green btn--text notification--cookies__btn-all">
                    {{ __('Accept', 'sage') }}
                </button>
            </div>
        </div>
    </div>
@endif
