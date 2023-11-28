const initPersonSlider = () => {
    const sections = document.querySelectorAll('.footer-persons');

    if (!sections.length > 0) return;

    if (window.innerWidth < 900) {
        Array.from(sections).forEach((section) => {
            import('tiny-slider/src/tiny-slider').then((root) => {
                root.tns({
                    container: section,
                    items: 1.25,
                    gutter: 20,
                    loop: false,
                    controls: false,
                    nav: false,
                    center: false,
                    mouseDrag: true,
                    autoplayButtonOutput: false,
                    responsive: {
                        768: {
                            items: 3,
                        },
                    },
                });
            });
        });
    }
};

export { initPersonSlider as default };
