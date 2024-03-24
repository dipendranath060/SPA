/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Init Milestones
3. Init Testimonials Slider


******************************/

$(document).ready(function()
{
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var ctrl = new ScrollMagic.Controller();

	initMilestones();
	initTestSlider();


	/* 

	2. Init Milestones

	*/

	function initMilestones()
	{
		if ($('.counter-stat').length !== 0) {
			$('.counter-stat').counterUp({
				delay: 10,
				time: 1000
			});
		}
	}

	/* 

	3. Init Testimonials Slider

	*/

	function initTestSlider()
	{
		if($('.test_slider').length)
		{
			var testSlider = $('.test_slider');
			testSlider.owlCarousel(
			{
				autoplay:false,
				loop:true,
				dots:true,
				smartSpeed:1200,
				margin:20,
				responsiveClass:true,
				responsive:{
					0:{
						items:1,
					},
					767:{
						items:2
					}
				}
			});
		}
	}

});