
import Lenis from "https://cdn.skypack.dev/@studio-freight/lenis@0.1.12";

// parallax
const els = document.querySelectorAll(".ukiyo");
els.forEach((el) => {
  const parallax = new Ukiyo(el);
});

// smooth scroll
const lenis = new Lenis({
  lerp: 0.08,
  smooth: true,
  direction: "vertical"
});

function raf() {
  lenis.raf();
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

