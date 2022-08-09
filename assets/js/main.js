(function ($) {
    //scroll to top
  
    $("#scroll_to_top").on("click", function () {
      $("html, body").animate(
        {
          scrollTop: 0,
        },
        800
      );
      return false;
    });
  
    //slick slider home page initiatives
  
    $(".home .initiative-items").slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      slidesToScroll: 1,
      appendArrows: $(".kh-slick-arr"),
      prevArrow: `<button id="prev" type="button" class="btn-slick">
      <svg width="70" id="slick-prev" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect x="0.5" y="0.5" width="69" height="69" rx="34.5" fill="white" stroke="#E8EBF3"/>
      <circle cx="35" cy="35" r="34.5" fill="white" stroke="#EAEBF3"/>
      <circle class="animate-circle" cx="35" cy="35" r="34.5" fill="white" stroke-dasharray="219" stroke-dashoffset="219" stroke-width="1" stroke="#3454D2"></circle>
      <path d="M41.834 35L30.1673 35" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M34.5 40L29.5 35L34.5 30" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
      
        </button>`,
      nextArrow: `<button id="next" type="button" class="btn-slick">
      <svg width="70" id="slick-next" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect x="0.5" y="0.5" width="69" height="69" rx="34.5" fill="white" stroke="#E8EBF3"/>
      <circle cx="35" cy="35" r="34.5" fill="white" stroke="#EAEBF3"/>
      <circle class="animate-circle" cx="35" cy="35" r="34.5" fill="white" stroke-dasharray="219" stroke-dashoffset="219" stroke-width="1" stroke="#3454D2"></circle>
        <path d="M29.166 35H40.8327" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M36.5 30L41.5 35L36.5 40" stroke="#3454D2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
            </button>`,
  
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            // infinite: true,
            // dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    });
  
    $(".home .initiative-items").on(
      "beforeChange",
      function (event, slick, currentSlide, nextSlide) {
        console.log(currentSlide, nextSlide);
  
        $(".animate-circle").each(function () {
          $(this).removeClass("running");
        });
        let direction = "";
        if (nextSlide > currentSlide) {
          direction = "right";
          $(document.body)
            .find("#slick-next .animate-circle")
            .addClass("running");
          console.log("right");
        } else if (nextSlide < currentSlide) {
          direction = "left";
          $(document.body)
            .find("#slick-prev .animate-circle")
            .addClass("running");
          console.log("left");
        }
      }
    );
  
    $(".home .initiative-items").on(
      "afterChange",
      function (slick, currentSlide) {
        $(".animate-circle").each(function () {
          $(this).removeClass("running");
        });
      }
    );


    //  Events tabs: Add a class active on click to the tab and its data-nav
  $(".activities-nav-item").each(function () {
    $(this).on("click", function () {
      $(".activities-nav-item").each(function () {
        $(this).removeClass("active");
      });
      $(this).addClass("active");
      let contId = $(this).attr("data-nav");
      $(".activities-content-tab").each(function () {
        $(this).removeClass("active");
      });
      $(`#${contId}`).addClass("active");
    });
  });


  //search
  $('a', $('.search-filter')).on('click', function(e) {
    e.preventDefault();
    const containerElement = $(this).data('container');
    const allContainers = ['projects', 'events', 'news', 'initiatives'];
    $('.search-filter a').each(function() {
      $(this).removeClass('active')
    })
    $(this).addClass('active');
    
    if(containerElement === 'all') {
      allContainers.forEach(el => {
        $(`.${el}`).show();
      })
      return;
    }
    
    allContainers.forEach(el => {
      $(`.${el}`).hide();
    })
    
    $(`.${containerElement}`).show();
  })
})(jQuery); 