const counters = document.querySelectorAll('.elementor-counter-number');

counters.forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-target');
    const current = +counter.innerText;
    const increment = target / 100;

    if (current < target) {
      counter.innerText = Math.ceil(current + increment);
      setTimeout(updateCount, 60);
    } else {
      counter.innerText = target;
    }
  };

  updateCount();
});
