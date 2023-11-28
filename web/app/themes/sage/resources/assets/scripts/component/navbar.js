import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

const navbar = () => {
    const navLinks = gsap.utils.toArray('.navbar-menu a');
    const panels = gsap.utils.toArray('.section');

    panels.forEach((panel, i) => {
        ScrollTrigger.create({
            trigger: panel,
            start: 'top center',

            onEnter: () => {
                navLinks.forEach((e) => {
                    e.classList.remove('active');
                });
                navLinks[i].classList.add('active');
            },
            onEnterBack: () => {
                navLinks.forEach((e) => {
                    e.classList.remove('active');
                });
                navLinks[i].classList.add('active');
            },
        });
    });

    window.addEventListener('scroll', () => {
        const topHeader = document.querySelector('.navbar');
        const scrollTop = window.scrollY;

        if (scrollTop >= 100) {
            topHeader.classList.add('is-up');
        } else {
            topHeader.classList.remove('is-up');
        }
    });
};

export { navbar as default };
