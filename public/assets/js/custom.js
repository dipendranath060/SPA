/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Init Home Slider
3. Init Milestones


******************************/

$(document).ready(function () {
    "use strict";

    /* 

	1. Vars and Inits

	*/

    var ctrl = new ScrollMagic.Controller();

    initHomeSlider();
    initMilestones();

    /* 

	2. Init Home Slider

	*/

    function initHomeSlider() {
        if ($(".home_slider").length) {
            var homeSlider = $(".home_slider");
            homeSlider.owlCarousel({
                items: 1,
                autoplay: true,
                loop: true,
                nav: false,
                smartSpeed: 1200,
                mouseDrag: false,
                dotsContainer: "home_slider_custom_dots",
            });

            /* Custom dots events */
            if ($(".home_slider_custom_dot").length) {
                $(".home_slider_custom_dot").on("click", function () {
                    $(".home_slider_custom_dot").removeClass("active");
                    $(this).addClass("active");
                    homeSlider.trigger("to.owl.carousel", [
                        $(this).index(),
                        300,
                    ]);
                });
            }

            /* Change active class for dots when slide changes by nav or touch */
            homeSlider.on("changed.owl.carousel", function (event) {
                $(".home_slider_custom_dot").removeClass("active");
                $(".home_slider_custom_dots li")
                    .eq(event.page.index)
                    .addClass("active");
            });
        }
    }

    /* 

	3. Init Milestones

	*/

    function initMilestones() {
        if ($(".counter-stat").length !== 0) {
            $(".counter-stat").counterUp({
                delay: 10,
                time: 1000,
            });
        }
    }
});
