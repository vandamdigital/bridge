const cookieBar = document.querySelector('.notification--cookies');

const setCookie = (cname, cvalue, exdays) => {
    const d = new Date();

    d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);

    const expires = `expires=${d.toUTCString()}`;

    document.cookie = `${cname}=${cvalue};path=/;${expires};`;
};

const getCookie = (cname) => {
    const name = `${cname}=`;
    const decodedCookie = decodeURIComponent(document.cookie);
    const ca = decodedCookie.split(';');

    for (let i = 0; i < ca.length; i += 1) {
        let c = ca[i];

        while (c.charAt(0) === ' ') {
            c = c.substring(1);
        }

        if (c.indexOf(name) === 0) {
            return c.substring(name.length, c.length);
        }
    }

    return '';
};

const loadAcceptedScripts = () => {
    const cookieTypesToLoad = JSON.parse(getCookie('enabl_consent'));

    if (!cookieTypesToLoad.length) {
        return;
    }

    [].forEach.call(cookieTypesToLoad, (cookieType) => {
        if (cookieType === 'statistics' || cookieType === 'marketing') {
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                event: `cookiewall_${cookieType}`,
            });
        }
    });
};

const setStyleWidth = () => {
    const getCssVariable = (variable) => parseInt(
            getComputedStyle(document.documentElement).getPropertyValue(
                variable
            ),
            10
        );
    const setWidth = () => {
        const cssVariables = {
            brand: getCssVariable('--width-brand'),
            spacerRight: getCssVariable('--spacer-navbar-r'),
            spacerLeft: getCssVariable('--spacer-navbar-l'),
        };
        const spacing = cssVariables.brand
            + cssVariables.spacerRight
            + cssVariables.spacerLeft
            + 100;

        if (window.innerWidth >= 1024) {
            const cookieBarWidth = window.innerWidth - spacing;
            document.documentElement.style.setProperty(
                '--width-cookiebar',
                `${cookieBarWidth}px`
            );
        }
    };

    setWidth();

    window.onresize = () => {
        setWidth();
    };
};

const initCookieBar = () => {
    const btnSelected = document.querySelector(
        '.notification--types__btn-selected'
    );

    // Stop this function from executing if no cookieBar is found in the DOM
    if (getCookie('enabl_consent').length > 0) {
        loadAcceptedScripts();
    } else if (cookieBar) {
        setStyleWidth();
        cookieBar.classList.add('notification--cookies--unaccepted');

        const acceptAllCookies = () => {
            const acceptedCookieTypes = [
                'necessary',
                'statistics',
                'marketing',
            ];

            cookieBar.classList.remove('notification--cookies--unaccepted');

            setCookie(
                'enabl_consent',
                JSON.stringify(acceptedCookieTypes),
                30
            );

            loadAcceptedScripts();

            // Wait until the animation had a chance to finish
            setTimeout(() => {
                // Let's remove the cookieBar from the DOM, since we don't need it anymore
                cookieBar.parentElement.removeChild(cookieBar);
            }, 300);
        };

        // Initiate the eventListener so the user can accept cookies.
        document
            .querySelector('.notification--cookies__btn-all')
            .addEventListener('click', acceptAllCookies);
    }

    if (btnSelected) {
        // Let's create a function that we can bind to our eventListener
        const acceptSelectedCookies = () => {
            // Get a nodelist of all the selected checkboxes
            const checkboxesSelected = document.querySelectorAll(
                '.section--notification-types input:checked'
            );

            // Building an array of all accepted cookie types
            const acceptedCookieTypes = [];

            [].forEach.call(checkboxesSelected, (checkbox) => {
                acceptedCookieTypes.push(checkbox.value);
            });

            // Setting the cookie with a stringified version of the array we just built
            setCookie(
                'enabl_consent',
                JSON.stringify(acceptedCookieTypes),
                30
            );

            // Now that the cookie is set, let's start loading the scripts
            loadAcceptedScripts();
        };

        if (getCookie('enabl_consent').length > 0) {
            const userCookies = getCookie('enabl_consent');

            // Get a nodelist of all the selected checkboxes
            const checkboxes = document.querySelectorAll(
                '.section--notification-types input'
            );
            [].forEach.call(checkboxes, (checkbox) => {
                checkbox.checked = userCookies.includes(checkbox.value);
            });
        }

        btnSelected.addEventListener('click', acceptSelectedCookies);
    }
};

export { initCookieBar as default, setCookie };
