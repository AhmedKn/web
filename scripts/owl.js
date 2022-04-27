    $("#news-slider").owlCarousel({
        items : 5,
        loop:true,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: true
        },
        600:{
            items:3,
            nav:true,
            dots: true
        },
        1000:{
            items:4,
            nav:true,
            dots: true
        }
    }
    });
    $("#best-slider").owlCarousel({
        items : 5,
        loop:true,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[980,2],
        itemsMobile : [600,1],
        navigation:true,
        navigationText:["",""],
        pagination:true,
        autoPlay:true,
        responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true,
            dots: true
        },
        600:{
            items:3,
            nav:true,
            dots: true
        },
        1000:{
            items:4,
            nav:true,
            dots: true
        }
    }
    });