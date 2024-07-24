/* STICKY HEADER JS START HERE */
window.onload = function(e){ 
	var header = $(".start-style");
	var scroll = $(window).scrollTop();
	if (scroll >= 100) {
		header.removeClass('start-style').addClass("scroll-on");
	} else {
		header.removeClass("scroll-on").addClass('start-style');
	}
}
var header = $(".start-style");
$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 10) {
		header.removeClass('start-style').addClass("scroll-on");
	} else {
		header.removeClass("scroll-on").addClass('start-style');
	}
});
$("header .navbar-toggler").click(function(){
	$("header .navigation-wrap").toggleClass("Navbar_open")
});
/* STICKY HEADER JS END'S HERE */
/*BLUR BACKGROUND START HERE*/ 
 $("body").on("click", ".navbar-nav a", function () {
   $('body').removeClass('blur-body');
 });
 $("body").on("click", ".navbar-toggler", function () {
   if (window.innerWidth <= 991) {
       $('body').toggleClass('blur-body');
   }
 });
/*BLUR BACKGROUND END'S HERE*/ 
/*TOGGLE MENU START HERE*/ 
$(".nav-link").on("click", function () {
	$(".navbar-collapse").collapse("hide");
  });
/*TOGGLE MENU END'S HERE*/ 
/* active classs js START HERE*/ 
$(document).ready(function () {
    $(".tabActive a").click(function () {
        $(".tabActive a").removeClass("active");
        $(this).addClass("active");
    });
    $(function () {
		var path = window.location.href;
        var pop = [];
        $('.tabActive a').each(function () {
            var anchor = $(this).prop('href').split("/").pop();
            pop.push(anchor);
            var href = this.href.replace(".html","").replace(".php","");
            var navPath = path.replace(".html","").replace(".php","");
            if (href === navPath) {
                $(this).addClass('active');
            }
        });
        var anchor = $('.tabActive a[href*="' + pop[0] + '"]');
        if (path.split('/').pop() == "") {
            $(anchor).addClass("active")
        }
    });
});
/* active classs js END'S HERE*/ 
/* HEADER SLIDER START HERE */
var swiper = new Swiper(".mySwiper", {
	slidesPerView: 1,
	spaceBetween: 30,
	speed: 1500,
	loop: true,
	parallax: true,
	pagination: false,
	grabCursor: true,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
});
/* HEADER SLIDER END'S HERE */

/* COURSES SLIDER START HERE */
var swiper = new Swiper(".Courses_swiper", {
	slidesPerView: 4,
	spaceBetween: 30,
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
	},
	breakpoints: {
		320:{
			slidesPerView: 1,
		},
		768: {
			slidesPerView: 2,
		},
		992: {
			slidesPerView: 3,
		},
		1199: {
			slidesPerView: 4,
		}
	}
	// breakpoints: {
	// 	"@0.00": {
	// 	  slidesPerView: 1,
	// 	},
	// 	"@0.75": {
	// 	  slidesPerView: 2,
	// 	},
	// 	"@1.00": {
	// 	  slidesPerView: 3,
	// 	},
	// 	"@1.50": {
	// 	  slidesPerView: 4,
	// 	},
	//   },
});
/* COURSES SLIDER END'S HERE */

/* INSTA POST SLIDER START HERE */
var swiper = new Swiper(".gymSwiper", {
	slidesPerView: 4,
	spaceBetween: 20,
	// autoplay: {
    //     delay: 1000,
    //     disableOnInteraction: false
    // },
	loop: true,
	pagination: {
	  el: ".swiper-pagination",
	  clickable: true,
	},
	breakpoints: {
		320:{
			slidesPerView: 1,
		},
		376:{
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 3,
		},
		992: {
			slidesPerView: 4,
		}
	}
});
/* INSTA POST SLIDER END'S HERE */

/* CLIENT SLIDER START HERE */ 
var swiper = new Swiper(".clientSwiper", {
	slidesPerView: 3,
	centeredSlides: false,
	spaceBetween: 20,
		breakpoints: {
		320:{
			slidesPerView: 1,
		},
		767:{
			slidesPerView: 2,
		},						
		1199:{
			slidesPerView: 3,
		}			
	}
});
/* CLIENT SLIDER END'S HERE */

/* FOOTER ACCORDIAN START HERE */
$(window).bind("resize", function () {
	if ($(this).width() > 991) {
	  $(".footer-links .footer-title").removeAttr("data-bs-toggle");
	} else {
	  $('.footer-links .footer-title').attr('data-bs-toggle', 'collapse');
	}
  }).trigger('resize');
/* FOOTER ACCORDIAN END'S HERE */

/* active class js on schedule section */
$(".nav button").click(function(){
	// $(".nav button").removeClass("active");
	$(this).addClass("active");
});

$(window)
  .bind("resize", function () {
    if ($(this).width() > 991) {
	  $(".nav.nav-pills").removeClass("dropdown-menu")
	
    } else {
	  $(".nav.nav-pills").addClass("dropdown-menu")
    }
  })
  .trigger("resize");

  $(document).ready(function() {
  
	$(document).click(function() {
	   $('.dropdown-menu.show').removeClass('show');
	});
	
	$('body').on('click','.trigger-dropdown', function(e){
	  
	  e.stopPropagation();
	  
	 $(this).closest('.dropdown-wrapper').find('.dropdown-menu').toggleClass('show');
	});
	
	$(".horizontal-pills button").click(function(){
		var text = $(this).text();
		$('#trigger-dropdown').text(text)
	});

	$(".vertical-pills button").click(function(){
		var text = $(this).text();
		$('#trigger-dropdown-1').text(text)
	});
	
  });

/* PRELOADR JS */
$(window).on('load', function () {
    $("body").removeClass("hidden");
    $(".page_loader").fadeOut("slow")
});