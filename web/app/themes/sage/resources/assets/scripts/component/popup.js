const initPopup = () => {
    const { body } = document;
    const popups = document.querySelectorAll('.popup');

    if (!popups.length > 0) { return false; }

    popups.forEach((popup) => {
        const togglers = document.querySelectorAll('.popup-toggle');
        const close = popup.querySelector('.popup-close');
        const video = popup.querySelector('video');
        let isVisible = false;

        const modalCloseEvent = () => {
            body.classList.remove('popup-open');
            popup.classList.remove('active');
            video.pause();
            video.currentTime = 0;
        };

        const popupClose = () => {
            if (isVisible) {
                document.addEventListener('keyup', (event) => {
                    if (event.key === 'Escape' || event.key === 'Esc') {
                        modalCloseEvent();
                    }
                });

                close.addEventListener('click', (ev) => {
                    ev.preventDefault();
                    modalCloseEvent();
                });
            }

            isVisible = false;
        };

        const openPopup = (el) => {
            video.play();

            setTimeout(() => {
                body.classList.add('popup-open');
                el.classList.add('active');
                isVisible = true;
                popupClose();
            }, 150);
        };

        togglers.forEach((toggle) => {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                const sectionID = toggle.getAttribute('href');
                const sectionSelector = document.querySelector(`${sectionID}`);

                openPopup(sectionSelector);
            });
        });
    });
};

export { initPopup as default };
