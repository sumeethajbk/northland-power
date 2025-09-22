document.querySelectorAll('.techno-grid').forEach(card => {
  const arrow = card.querySelector('.arrow');
  const p = card.querySelector('.techno-grid-desc p');

  p.innerHTML = p.textContent.split(' ')
    .map(w => `<span style="display:inline-block">${w}</span>`).join(' ');

  const spans = p.querySelectorAll('span');

  gsap.set(spans, {opacity: 0, y: 20});
  gsap.set(arrow, {rotation: 0});

  const tl = gsap.timeline({paused: true})
    .to(spans, {opacity: 1, y: 0, duration: 0.4, stagger: 0.1});

  card.addEventListener('mouseenter', () => {
    gsap.to(arrow, {rotation: -45, duration: 0.4});
    tl.play();
  });

  card.addEventListener('mouseleave', () => {
    gsap.to(arrow, {rotation: 0, duration: 0.4});
    tl.reverse();
  });
});