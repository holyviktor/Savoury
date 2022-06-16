new Swiper(".swiper", {
    spaceBetween: 10,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 3.05,
    loop:true,
    breakpoints: {
        768:{
            slidesPerView: 5.05,
            spaceBetween: 20,
        },
        400:{
            slidesPerView: 3.05,
            spaceBetween: 15,
        },
        910:{
            slidesPerView: 5.05,
            spaceBetween: 30,
        }
    }
})
