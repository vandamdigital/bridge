import Lenis from '@studio-freight/lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Splitting from 'splitting';

const initTextAnimation = () => {
    Splitting();

    const effect1 = [...document.querySelectorAll('[data-splitting][data-effect1]')];
    const effect2 = [...document.querySelectorAll('[data-splitting][data-effect2]')];
    let lenis;

    const initSmoothScrolling = () => {
        lenis = new Lenis({
            lerp: 0.2,
            smooth: true,
        });

        lenis.on('scroll', () => ScrollTrigger.update());

        const scrollFn = (time) => {
            lenis.raf(time);
            requestAnimationFrame(scrollFn);
        };
        requestAnimationFrame(scrollFn);
    };

    const scroll = () => {
        effect1.forEach((title) => {
            gsap.fromTo(title, {
                transformOrigin: '0% 50%',
            }, {
                ease: 'none',
                rotate: 0,
                scrollTrigger: {
                    trigger: title,
                    start: 'top bottom',
                    end: 'top top',
                    scrub: true,
                },
            });

            gsap.fromTo(title.querySelectorAll('.word, img, .btn'), {
                'will-change': 'opacity',
                opacity: 0.1,
            },
            {
                ease: 'none',
                opacity: 1,
                stagger: 0.05,
                scrollTrigger: {
                    trigger: title,
                    start: 'top bottom-=20%',
                    end: 'center top+=20%',
                    scrub: true,
                },
            });
        });

        effect2.forEach((title) => {
            const chars = title.querySelectorAll('.char');
            chars.forEach((char) => gsap.set(char.parentNode, { perspective: 1000 }));

            gsap.fromTo(chars, {
                'will-change': 'opacity, transform',
                transformOrigin: '50% 100%',
                opacity: 0,
                rotationX: 90,
            },
            {
                ease: 'power4',
                opacity: 1,
                stagger: {
                    each: 0.03,
                    from: 'random',
                },
                rotationX: 0,
            });
        });
    };

    scroll();
};

export { initTextAnimation as default };
