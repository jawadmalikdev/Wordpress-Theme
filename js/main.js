/**
 * Javascript for slick slider
 * Javascript for tabs
 * Javascript for video popup
 * 
 * @package Wpbrigade
 */

jQuery(document).ready(function ($) {

    $(".slick-slider-wrap").slick(
        {
            autoplay: false,
            dots: true,
            infinite: true,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            rows: 0,
            prevArrow: '<span class="prev-arrow"><img src="http://localhost/practise/wp-content/themes/wp-brigade/assets/icon-prev-post.png" alt=""></span>',
            nextArrow: ' <span class="next-arrow"><img src="http://localhost/practise/wp-content/themes/wp-brigade/assets/icon-next-post.png"" alt=""></span>'
        }
    );

    // custom sports slider
    $(".sports-container").slick(
        {
            autoplay: false,
            dots: true,
            infinite: true,
            arrows: true,
            slidesToShow: 4,
            slidesToScroll: 4,
            rows: 0,
            prevArrow: '<span class="prev-arrow-sport"><img src="http://localhost/practise/wp-content/themes/wp-brigade/assets/icon-prev-post.png" alt=""></span>',
            nextArrow: ' <span class="next-arrow-sport"><img src="http://localhost/practise/wp-content/themes/wp-brigade/assets/icon-next-post.png" alt=""></span>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        }
    );
    $(".close-icon").click(function () {
        $(".top-bar").hide();
    });



});


//video pop up main slider
var video_element = document.getElementsByClassName("video-player")
const video_iframe = document.getElementById("video_iframe");
const video_overlay = document.getElementById("video-overlay");
const close_overlay = document.getElementById("video-overlay__close");

for (var i = 0; i < video_element.length; i++) {
    video_element[i].addEventListener('click', open_popup);
}


close_overlay.addEventListener("click", close_popup);

function open_popup() {
    video_overlay.classList.add("video-overlay--active");
    var vid_id = this.dataset.link;
    video_iframe.src = `https://www.youtube.com/embed/${vid_id}?autoplay=0&mute=1`;

}
function close_popup() {
    video_overlay.classList.remove("video-overlay--active");
}

//tab javascript code

const tabs = document.querySelectorAll('[data-tab-target]');
const tabContents = document.querySelectorAll('[data-tab-content]');
console.log('hello world');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        console.log("hello world");
        const target = document.querySelector(tab.dataset.tabTarget);

        // remove active class from every tabcontent
        tabContents.forEach(tabContent => {
            tabContent.classList.remove('active');
        });

        // remove active class from every tab
        tabs.forEach(tab => {
            tab.classList.remove('active');
        })

        target.classList.add('active');
        tab.classList.add('active');
    });

});