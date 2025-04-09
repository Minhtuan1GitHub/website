var swiper = new Swiper(".mySwiper", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  initialSlide: 4, //hien thi anh o slide thu ..
  loop: true, //cuon vo han

  slidesPerView: 6, //hien thi bao nhieu hinh
  coverflowEffect: {
    rotate: 50,
    stretch: 0,
    depth: 100,
    modifier: 1,
    slideShadows: true,
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true, //cho phep nhan nut tron
  },
});

