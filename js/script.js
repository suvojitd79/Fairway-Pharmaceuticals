jQuery(document).ready(function($) {
  // Code for Top Slider
  $("#mainSlider").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1,
    animateOut: "slideOutDown",
    animateIn: "flipInX"
  });

  //Testimonial Section
  $(".testimonials-carousel").owlCarousel({
    autoplay: true,
    dots: true,
    loop: true,
    items: 1
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });
});

//Fuction to show an alert that medicine booking is coming soon.
function comingSoon() {
  alert("Order Medicine is coming soon, Please keep checking. Thanks !");
}
