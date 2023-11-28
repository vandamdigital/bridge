import LazyLoad from 'vanilla-lazyload';

export default function lazyLoading() {
    const pageLazyLoad = new LazyLoad({ // eslint-disable-line no-unused-vars
        elements_selector: '[loading=eager], [loading=lazy]',
        use_native: true, // ← enables hybrid lazy loading
    });
}
