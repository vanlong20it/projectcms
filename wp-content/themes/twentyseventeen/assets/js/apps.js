document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide", {
    direction: "ttb",
    height: "100vh",
    autoplay: true,
    type: "loop",
    type: "fade",
    rewind: true,
    speed: 2000,
    rewindSpeed: 1000,
    arrows: false
  }).mount();
});
