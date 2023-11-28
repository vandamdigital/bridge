import scrollY from '../util/scrollY';

const backToTop = () => {
    const elems = document.querySelectorAll('.back-to-top, .back-to-top button');

    if (!elems) { return false; }

    elems.forEach((elem) => {
        elem.addEventListener('click', (ev) => {
            ev.preventDefault();

            scrollY(0, 1500, 'easeInOutQuint');
        });

        window.addEventListener('scroll', () => {
            if (window.scrollY > 150) {
                elem.classList.add('active');
            } else {
                elem.classList.remove('active');
            }
        });
    });
};

export { backToTop as default };
