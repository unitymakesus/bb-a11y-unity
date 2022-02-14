import { CountUp } from 'countup.js';

/**
 * Initialize CountUp on group of elements.
 *
 * @param IntersectionObserverEntry wrapper
 */
const initCountUp = (wrapperElem) => {
  const numberElems = wrapperElem.target.querySelectorAll('.unity-numbers__count');

  numberElems.forEach(el => {
    const { number, numberSuffix, numberPrefix, numberSeparator, numberDecimalPlaces } = el.dataset;
    const countUpOptions = {
      decimalPlaces: parseInt(numberDecimalPlaces),
      duration: 1.5,
      suffix: numberSuffix || '',
      prefix: numberPrefix || '',
      separator: numberSeparator,
      useGrouping: true,
    };

    const countUp = new CountUp(el, number, countUpOptions);
    countUp.start();
  });
}

const numbersWrapper = document.querySelectorAll('.unity-numbers');
const numbersObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      initCountUp(entry);
      numbersObserver.unobserve(entry.target);
    }
  });
}, {
  threshold: 0.25
});

const flBuilderLayout = document.querySelector('.fl-builder-content');

document.addEventListener('DOMContentLoaded', () => {
  numbersWrapper.forEach(wrapper => {
    numbersObserver.observe(wrapper);
  });
});

flBuilderLayout.addEventListener('fl-builder.preview-rendered', () => {
  numbersWrapper.forEach(wrapper => {
    numbersObserver.observe(wrapper);
  });
});

flBuilderLayout.addEventListener('fl-builder.layout-rendered', () => {
  numbersWrapper.forEach(wrapper => {
    numbersObserver.observe(wrapper);
  });
});
