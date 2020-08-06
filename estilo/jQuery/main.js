(function($) {
    "use strict"; // Inicio de use strict
  
    // Desplazamiento suave usando jQuery easing
    $(document).on('click', 'a.scroll-to-top', function(e) {
      var $anchor = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($anchor.attr('href')).offset().top)
      }, 1000, 'easeInOutExpo');
      e.preventDefault();
    });

    // sidebar
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
      });
    });

    // tooltips
    $('[data-toggle="tooltip"]').tooltip();
  
  })(jQuery); // End of use strict
  