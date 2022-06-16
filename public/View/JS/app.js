new Swiper(".swiper", {
    spaceBetween: 10,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    slidesPerView: 2,
    loop:true,


    breakpoints: {
        768:{
            slidesPerView: 3,
            spaceBetween: 25,
        }
    }
})
