@php
    $cookie_types = [
        (object)['name' => __('Functional', 'sage'), 'slug' => 'necessary'],
        (object)['name' => __('Statistics', 'sage'), 'slug' => 'statistics'],
        (object)['name' => __('Marketing', 'sage'), 'slug' => 'marketing'],
    ];
@endphp

<section class="section section--notification-types">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10" data-animate="fade-to-top">
                @if($title = get_field('cookiebar_title', 'option'))
                    <div class="page-header">
                        <h3>{!! $title !!}</h3>
                    </div>
                @endif
                <div class="row align-items-end">
                    <div class="col-md-6">
                        @foreach($cookie_types as $key => $type)
                            <label class="custom-control custom-control--checkbox">
                                <input type="checkbox" class="custom-control__input" value="{{ $type->slug }}" checked @if($type->slug === 'necessary') disabled @endif>
                                <span class="custom-control__indicator">
                                    <i class="checkmark"></i>
                                </span>
                                <span class="custom-control__text">
                                    {!! $type->name !!}
                                </span>
                            </label>
                        @endforeach
                    </div>

                    <div class="col-auto ml-md-auto">
                        <button type="button" class="btn btn--green notification--types__btn-selected">
                            {{ __('Save preferences', 'sage') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
