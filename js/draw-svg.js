document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);

    const path = document.querySelector(".features-icon path");
    const length = path.getTotalLength();

    // Hide the path initially
    path.style.strokeDasharray = length;
    path.style.strokeDashoffset = length;

    // Animate when scrolled into view
    gsap.to(path, {
      strokeDashoffset: 0,
      duration: 2,
      ease: "power2.inOut",
      scrollTrigger: {
        trigger: path,
        start: "top",
        toggleActions: "play none none none"
      }
    });
  });