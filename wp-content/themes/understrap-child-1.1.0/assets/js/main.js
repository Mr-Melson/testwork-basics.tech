var realty_swiper = new Swiper(".realty_swiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 2,
    breakpoints: {
      640: {
        slidesPerView: 3,
      },
      768: {
        slidesPerView: 4,
      },
    },
});

var gallery_swiper = new Swiper(".gallery_thumb_swiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
});
var gallery_swiper2 = new Swiper(".gallery_swiper", {
    loop: true,
    autoHeight: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",    
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: gallery_swiper,
    },
});