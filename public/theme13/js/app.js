document.documentElement.style.overflow = "hidden";
$(document).ready(function () {
  setTimeout(() => {
    $(".loader-container").fadeOut("slow");
    document.documentElement.style.overflow = "auto";
  }, 300);
});

function isMobile() {
  return window.innerWidth <= 992;
}

let topBtn = document.querySelector(".goto-top");
if (topBtn) {
  topBtn.onclick = () => window.scrollTo({ top: 0, behavior: "smooth" });
}

const gallery = document.getElementById("gallery");
if (gallery) {
  const lightbox = GLightbox({
    touchNavigation: true,
    loop: true,
  });
}

// show navbar on scroll up
window.addEventListener("wheel", function () {
  const header = this.document.getElementById("header");
  if (this.window.scrollY > 150) {
    header.classList.add("position-fixed");
  } else {
    header.classList.remove("position-fixed");
  }
});

$(document).ready(function () {
  // Append submenu buttons
  $("#navbar-menu ul .submenu > span").append(
    '<i class="ti ti-chevron-down"></i>'
  );
  $("#navbar-menu-mobile ul .submenu > span").append(
    '<i class="ti ti-chevron-down"></i>'
  );

  // toggle mobile menu
  $(".toggle-menu,.close-menu,.mobile-menu-overlay").click(function () {
    $(".mobile-menu").toggleClass("open");
  });

  // left sidebar open
  $(".show-offcanvas,.left-sidebar-close,.left-sidebar-overlay").click(
    function () {
      $(".left-sidebar").toggleClass("open");
    }
  );

  $(".submenu").on("click", function (e) {
    // On mobile, toggle submenu on click
    if (isMobile()) {
      if ($(this).hasClass("active")) {
        $(this).removeClass("active");
        $(this).find("ul").slideUp();
      } else {
        $("#navbar-menu-mobile ul li").removeClass("active");
        $("#navbar-menu-mobile ul li ul").slideUp();
        $(this).addClass("active");
        $(this).find("ul").stop().slideToggle();
        e.stopPropagation();
      }
    }
  });
});

// odometer
function custom_count() {
  var flag = true;
  $(".counter-inner").each(function () {
    if ($(this).isInViewport()) {
      // Here we check perticular section is in the viewport or number-counter-section
      if (flag) {
        /* FOR number counter(odometer)  */
        var arr = [],
          i = 0;
        $(".odometer").each(function () {
          arr[i++] = $(this).attr("data-count");
          odometer1.innerText = arr[0]; //here odometer is *id* of first number
          odometer2.innerText = arr[1]; //here odometer1 is *id* of second number
          odometer3.innerText = arr[2]; //here odometer1 is *id* of second number
          odometer4.innerText = arr[3]; //here odometer1 is *id* of second number
        });
        flag = false;
      }
    } else {
    }
  });
}

// for check the section in view port or not;
$.fn.isInViewport = function () {
  var elementTop = $(this).offset().top;
  var elementBottom = elementTop + $(this).outerHeight();

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(document).ready(function () {
  //  odometer section is on view-port or not
  custom_count();
  //resize-function
  $(window).resize(function () {
    custom_count();
  });

  $(window).on("scroll", function () {
    custom_count();
  });
});

let serviceSwiper = new Swiper(".ServiceSwiper", {
  navigation: {
    nextEl: ".service-next",
    prevEl: ".service-prev",
  },
  loop: true,
  autoplay: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
  },
});
let expertSwiper = new Swiper(".expertSwiper", {
  navigation: {
    nextEl: ".expert-next",
    prevEl: ".expert-prev",
  },
  loop: true,
  autoplay: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
  },
});

let expertSwiper3 = new Swiper(".expertSwiper3", {
  navigation: {
    nextEl: ".expert-next",
    prevEl: ".expert-prev",
  },
  loop: true,
  autoplay: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
  },
});

// client swiper
let clientSwiper = new Swiper(".clientSwiper", {
  navigation: {
    nextEl: ".client-next",
    prevEl: ".client-prev",
  },
  loop: true,
  autoplay: true,
});

// logo swiper
let logoSwiper = new Swiper(".logo-slider", {
  autoplay: true,
  loop: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    768: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 5,
      spaceBetween: 24,
    },
  },
});

let logoSwiper2 = new Swiper(".logo-slider-2", {
  autoplay: {
    delay: 1,
  },
  speed: 5000,
  loop: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    1600: {
      slidesPerView: 4,
      spaceBetween: 24,
    },
  },
});

// banner 2 swiper
let banner2Swiper = new Swiper(".banner2-swiper", {
  pagination: {
    el: ".banner-two-pagination",
    clickable: true,
  },
  loop: true,
  effect: "fade",
  speed: 1200,
  // autoplay: {
  //   delay: 1000,
  // },
});

let banner3Swiper = new Swiper(".banner3-swiper", {
  navigation: {
    prevEl: ".banner3-prev",
    nextEl: ".banner3-next",
  },
  loop: true,
  effect: "fade",
  speed: 1200,
  autoplay: true,
});

// count 3 swiper
let counter3Swiper = new Swiper(".counter-swiper", {
  navigation: {
    prevEl: ".banner3-prev",
    nextEl: ".banner3-next",
  },
  loop: true,
  effect: "fade",
  speed: 1200,
  // autoplay: true,
});

let leagal2Swiper = new Swiper(".legal-swiper", {
  navigation: {
    prevEl: ".legal-prev",
    nextEl: ".legal-next",
  },
  loop: true,
  effect: "fade",
  speed: 1200,
  autoplay: true,
});

let succesStorySwiper = new Swiper(".success-story-swiper", {
  navigation: {
    prevEl: ".success-story-prev",
    nextEl: ".success-story-next",
  },
  loop: true,
  speed: 1200,
  centeredSlides: true,
  // autoplay: true,
  breakpoints: {
    1200: {
      slidesPerView: 1.6,
      spaceBetween: 24,
    },
  },
});

let solutionSwiper = new Swiper(".solution-swiper", {
  navigation: {
    prevEl: ".solution-prev",
    nextEl: ".solution-next",
  },
  loop: true,
  speed: 1200,
  autoplay: true,
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 16,
    },
    480: {
      slidesPerView: 1.4,
      spaceBetween: 16,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 1.4,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    1600: {
      slidesPerView: 2.3,
      spaceBetween: 24,
    },
  },
});

// client swiper2
let clientSwiper2 = new Swiper(".clientSwiper2", {
  navigation: {
    nextEl: ".client-next",
    prevEl: ".client-prev",
  },
  loop: true,
  autoplay: true,
  breakpoints: {
    580: {
      slidesPerView: 1.5,
      spaceBetween: 24,
    },
    800: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 1.4,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 1.4,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 1.8,
      spaceBetween: 24,
    },
    1600: {
      slidesPerView: 2.2,
      spaceBetween: 24,
    },
  },
});

// client swiper2
let clientSwiper4 = new Swiper(".clientSwiper4", {
  loop: true,
  autoplay: true,
  spaceBetween: 20,
  navigation: {
    nextEl: ".client-next",
    prevEl: ".client-prev",
  },
  breakpoints: {
    580: {
      slidesPerView: 1.3,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 1.5,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 1.6,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 1.8,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 2.1,
      spaceBetween: 24,
    },
    1600: {
      slidesPerView: 2.2,
      spaceBetween: 24,
    },
  },
});

// client swiper2
let clientSwiper3 = new Swiper(".clientSwiper3", {
  navigation: {
    nextEl: ".client-next",
    prevEl: ".client-prev",
  },
  loop: true,
  autoplay: true,
  breakpoints: {
    580: {
      slidesPerView: 1.3,
      spaceBetween: 24,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 1.4,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 1.5,
      spaceBetween: 24,
    },
  },
});

// client swiper2
let brandSwiper = new Swiper(".brand-swiper", {
  loop: true,
  autoplay: true,
  spaceBetween: 16,
  breakpoints: {
    320: {
      slidesPerView: 3,
      spaceBetween: 24,
    },
    480: {
      slidesPerView: 5,
      spaceBetween: 24,
    },
    768: {
      slidesPerView: 7,
      spaceBetween: 24,
    },
    992: {
      slidesPerView: 7,
      spaceBetween: 24,
    },
    1200: {
      slidesPerView: 10,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 11.5,
      spaceBetween: 24,
    },
  },
});

let triumphSwiper = new Swiper(".triumph-swiper", {
  navigation: {
    nextEl: ".service-next",
    prevEl: ".service-prev",
  },
  loop: true,
  autoplay: true,
  speed: 1000,
  breakpoints: {
    320: {
      slidesPerView: 1,
    },
    992: {
      slidesPerView: 1.4,
      spaceBetween: 24,
    },
    1400: {
      slidesPerView: 1.8,
      spaceBetween: 24,
    },
  },
});

// brand swiper home 4
let brand4Swiper = new Swiper(".brand-swiper-4", {
  navigation: {
    prevEl: ".brand-prev",
    nextEl: ".brand-next",
  },
  loop: true,
  autoplay: true,
  effect: "fade",
  speed: 1200,
});

const expertCards = document.querySelectorAll(".expert-card");

// Loop through each "expert-card" element
expertCards.forEach((card) => {
  // Find the "social-btn" button and the links within this card
  const socialBtn = card.querySelector(".social-btn");
  const links = card.querySelector(".links");
  // Add a mouseover event listener to the "social-btn" button
  socialBtn.addEventListener("mouseover", () => {
    links.classList.add("active");
    socialBtn.querySelector("i").classList.remove("ti-plus");
    socialBtn.querySelector("i").classList.add("ti-minus");
  });
  links.addEventListener("mouseover", function () {
    links.classList.add("active");
    socialBtn.querySelector("i").classList.remove("ti-plus");
    socialBtn.querySelector("i").classList.add("ti-minus");
  });
  links.addEventListener("mouseout", function () {
    links.classList.remove("active");
    socialBtn.querySelector("i").classList.add("ti-plus");
    socialBtn.querySelector("i").classList.remove("ti-minus");
  });
  // Add a mouseout event listener to the "social-btn" button
  socialBtn.addEventListener("mouseout", () => {
    // Remove the "active" class from each link within this card
    links.classList.remove("active");
    socialBtn.querySelector("i").classList.add("ti-plus");
    socialBtn.querySelector("i").classList.remove("ti-minus");
  });
});

const expertCards2 = document.querySelectorAll(".expert-card-2");

// Loop through each "expert-card" element
expertCards2.forEach((card) => {
  // Find the "social-btn" button and the links within this card
  const socialBtn = card.querySelector(".social-btn");
  const links = card.querySelector(".links");
  // Add a mouseover event listener to the "social-btn" button
  socialBtn.addEventListener("mouseover", () => {
    console.log("hover on btn");
    links.classList.add("active");
  });
  links.addEventListener("mouseover", function () {
    links.classList.add("active");
  });
  links.addEventListener("mouseout", function () {
    links.classList.remove("active");
  });
  // Add a mouseout event listener to the "social-btn" button
  socialBtn.addEventListener("mouseout", () => {
    // Remove the "active" class from each link within this card
    links.classList.remove("active");
  });
});

// show hide comment
const comments = document.querySelectorAll(".write-comment");
if (comments) {
  comments.forEach((comment) => {
    const replyBtn = comment.querySelector(".reply-btn");
    const commentInput = comment.querySelector(".comment-input");
    replyBtn.addEventListener("click", function () {
      commentInput.classList.toggle("active");
      replyBtn.classList.toggle("text-primary");
    });
  });
}

// nice select
let country = document.getElementById("country");
if (country) {
  NiceSelect.bind(document.getElementById("country"));
}

// Show current year on footer
const yearEl = document.getElementById("year");
if (yearEl) {
  yearEl.innerText = new Date().getFullYear();
}

function setActiveMenu() {
  // add active menu
  const submenuLinks = document.querySelectorAll(".menu li a");
  // Loop through each submenu link
  submenuLinks.forEach(function (link) {
    // Get the current URL
    const currentUrl = window.location.href;
    // Get the href attribute of the submenu link
    const href = link.getAttribute("href");
    // Check if the current URL matches the submenu link's href

    if (currentUrl.includes(href)) {
      // Add the 'active' class to the parent menu-btn
      link.classList.add("active");
      const submenu = link.parentElement.parentElement;
      const menuBtn = submenu.previousElementSibling;
      menuBtn.classList.add("active");
    }
  });
}

setActiveMenu();

// show menu on resize
window.addEventListener("resize", function () {
  const submenulist = this.document.querySelectorAll(".submenu-dropdown");
  if (this.window.innerWidth > 991) {
    submenulist.forEach((item) => item.classList.add("d-block"));
  } else {
    submenulist.forEach((item) => item.classList.remove("d-block"));
  }
});
