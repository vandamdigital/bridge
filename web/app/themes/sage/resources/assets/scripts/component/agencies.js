const initAgencies = () => {
    const sections = document.querySelectorAll('.section--agencies');

    if (!sections.length > 0) return;

    Array.from(sections).forEach((section) => {
        const agencies = section.querySelectorAll('.agencies-item');
        const images = section.querySelectorAll('.agencies-images__item');

        if (!agencies.length > 0) return;

        const activeItem = (index) => {
            Array.from(agencies).forEach((agency) => {
                agency.classList.remove('active');

                if (agency.dataset.index === index) {
                    agency.classList.add('active');
                }
            });

            Array.from(images).forEach((image) => {
                image.classList.remove('active');

                if (image.dataset.index === index) {
                    image.classList.add('active');
                }
            });
        };

        Array.from(agencies).forEach((agency) => {
            agency.addEventListener('mouseenter', () => {
                const { index } = agency.dataset;

                activeItem(index);
            });
        });
    });
};

export { initAgencies as default };
