import registerGsapPlugins from '../component/registerGsapPlugins';
import calculateHeight from '../util/height';
import accordion from '../component/accordion';
import customSelect from '../form/custom-select';
import validate from '../form/validation';
import dataAnimate from '../util/dataAnimate';
import lazyLoading from '../component/lazy-load';
import initAgencies from '../component/agencies';
import backToTop from '../component/back-to-top';
import initPersonSlider from '../component/person-slider';
import initPopup from '../component/popup';
import scrollTo from '../component/scrollTo';
import navbar from '../component/navbar';

export default () => {
    registerGsapPlugins();
    calculateHeight();
    accordion();
    customSelect();
    validate();
    dataAnimate();
    lazyLoading();
    initAgencies();
    backToTop();
    initPersonSlider();
    initPopup();
    scrollTo();

    navbar();
};
