// window.addEventListener("scroll", function() {
//     const scroll = window.scrollY;
//     const box1 = document.getElementById("box1");
//     const box2 = document.getElementById("box2");
//     const box3 = document.getElementById("box3");
  
//     if (box1) box1.style.top = `${scroll}px`;
//     if (box2) box2.style.top = `${scroll / 1.5}px`;
//     if (box3) box3.style.top = `${scroll / 3}px`;
//     if (box1) {
//         // Calculate opacity based on scroll position
//         const maxScroll = 1600; // Set this value based on when you want it fully transparent
//         const opacity = Math.max(1 - scrollY / maxScroll, 0);

//         // Apply opacity to make box1 dissolve
//         box1.style.opacity = opacity;
//     }
//   });


  
function createParallaxGallery({
    galleryId,
    trackId,
    cardClass,
    easing = 0.05,
  }) {
    const gallery = document.getElementById(galleryId); 
    const track = document.getElementById(trackId);
    const cards = document.querySelectorAll(`.${cardClass}`);
    let startY = 0;
    let endY = 0;
    let raf;
  
    const lerp = (start, end, t) => start * (1 - t) + end * t;
  
    function updateScroll() {
      startY = lerp(startY, endY, easing);
      gallery.style.height = (track.offsetHeight) + "px"; 
      track.style.transform = `translateY(-${startY}px)`;
      activateParallax();
      raf = requestAnimationFrame(updateScroll);
      if (startY.toFixed(1) === window.scrollY.toFixed(1)) cancelAnimationFrame(raf);
    }
  
    function startScroll() {
      endY = window.scrollY;
      cancelAnimationFrame(raf);
      raf = requestAnimationFrame(updateScroll);
    }
  
    function parallax(card) {
      const wrapper = card.querySelector('.card-image-wrapper');
      const diff = card.offsetHeight - wrapper.offsetHeight;
      const { top } = card.getBoundingClientRect();
      const progress = top / window.innerHeight;
      const yPos = diff * progress;
      wrapper.style.transform = `translateY(${yPos}px)`;
    }
  
    const activateParallax = () => cards.forEach(parallax);
  
    function init() {
      activateParallax();
      startScroll();
    }
  
    window.addEventListener('load', updateScroll, false);
    window.addEventListener('scroll', init, false);
    window.addEventListener('resize', updateScroll, false);
  }
  
  createParallaxGallery({
    galleryId: 'gallery',
    trackId: 'gallery-track',
    cardClass: 'cards',
    easing: 0.05,
  });
  
  createParallaxGallery({
    galleryId: 'main2',
    trackId: 'home',
    cardClass: 'contents',
    easing: 0.05,
  });

  $(function() {
    var text = $(".text");
    $(window).scroll(function() {
      var scroll = $(window).scrollTop();
  
      if (scroll >= 3200) {
        text.removeClass("hidden");
      } else {
        text.addClass("hidden");
      }
    });
  });
  
  