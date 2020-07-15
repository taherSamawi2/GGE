/* JS Document */

/******************************

 [Table of Contents]


 ******************************/

// Select Landing Page Element

let landingPage = document.querySelector(".landing-page");

// Get Array Of Imgs

let imagsArray = ["01.jpg", "02.jpg", "03.jpg", "04.jpg"];

setInterval(() => {
    //Get Random Number
    let randomNumber = Math.floor(Math.random() * imagsArray.length);
    // Change Background Image Url
    landingPage.style.backgroundImage = 'url("imgs/' + imagsArray[randomNumber] + '")';
}, 5000);


// Toggle Menu
let toggleBtn = document.querySelector('.toggle-menu');
let menuItems = document.querySelector('.links');


toggleBtn.onclick = function (e) {
    // Stop Propagation
    e.stopPropagation();
    // Toggle Class "menu-active" on Button
    this.classList.toggle('menu-active');

    // Toggle Class "open" on Links
    menuItems.classList.toggle('open');
};

// Stop Propagation On Menu
menuItems.onclick = function (e) {
    e.stopPropagation();
};
document.addEventListener("click", (e) => {
    if (e.target !== toggleBtn && e.target !== menuItems) {
        if (menuItems.classList.contains('open')) {
            // Toggle Class "menu-active" on Button
            toggleBtn.classList.toggle('menu-active');

            // Toggle Class "open" on Links
            menuItems.classList.toggle('open');
        }
    }
});



/* JS Document */

/******************************

 [Table of Contents]

 1.



 ******************************/

$(function() {
    "use strict";

    // When the user clicks on the button, scroll to the top of the document

    var scrollButton = $("#scroll-to-top");
    $(window).scroll(() => {
        $(this).scrollTop() >= 600 ? scrollButton.show() : scrollButton.hide();
    });

    scrollButton.click(() => {
        $("html,body").animate({ scrollTop: 0 }, 600);
    });



    var header = $('.header-area');

    $(document).on('scroll', function()
    {
        if($(window).scrollTop() > 91)
        {
            header.addClass('scrolled');
        }
        else
        {
            header.removeClass('scrolled');
        }
    });




    $("nav .menu-icons").click(() => {
        $("nav").toggleClass("active");
    });

    $(".video-carousel").owlCarousel({
        rtl: true,
        autoplay: true,
        autoplayHoverPause: true,
        items: 2,
        nav: false,
        dots: true,
        loop: true,
        margin:15,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ],
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            485: {
                items: 1
            },
            728: {
                items: 2
            },
            960: {
                items: 2
            },
            1200: {
                items: 2
            }
        }
    });
    $(".card-news-carousel").owlCarousel({
        rtl: true,
        autoplay: true,
        autoplayHoverPause: true,
        items: 1,
        nav: false,
        dots: true,
        loop: true,
        navText: [
            '<i class="fa fa-angle-left"></i>',
            '<i class="fa fa-angle-right"></i>'
        ],
        lazyLoad: true,
        responsive: {
            0: {
                items: 1
            },
            485: {
                items: 1
            },
            728: {
                items: 1
            },
            960: {
                items: 1
            },
            1200: {
                items: 1
            }
        }
    });
});
