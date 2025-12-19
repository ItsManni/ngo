$('.banner_owl').owlCarousel({


  loop: true,


  margin: 20,


  nav: false,


  dots: false,


  autoplay: true,


  items: 1,


  navText: [


    '<span class="fa fa-chevron-left"></span>',


    '<span class="fa fa-chevron-right"></span>'


  ]


});





$('.testimoanil_owl').owlCarousel({


  loop: true,


  margin: 20,


  nav: false,


  dots: false,


  autoplay: true,


  items: 2,


  // center:true,


  navText: [


    '<span class="fa fa-chevron-left"></span>',


    '<span class="fa fa-chevron-right"></span>'


  ],


  responsive: {


    0: {


      items: 1


    },


    768: {


      items: 2


    },


    1024: {


      items: 2


    }


  }


});





$('.utube_owl').owlCarousel({


  loop: true,


  margin: 20,


  nav: false,


  dots: false,


  autoplay: true,


  items: 3,


  // center:true,


  navText: [


    '<span class="fa fa-chevron-left"></span>',


    '<span class="fa fa-chevron-right"></span>'


  ],


  responsive: {


    0: {


      items: 1


    },


    768: {


      items: 3


    },


    1024: {


      items: 3


    }


  }


});





// hospital page circle parcentage start





$(document).ready(function () {


  function setProgressAnimated(targetPercent, duration = 1500) {


    const radius = 90;


    const circumference = 2 * Math.PI * radius;


    let current = 0;


    const stepTime = 15; // milliseconds


    const steps = duration / stepTime;


    const increment = targetPercent / steps;





    const interval = setInterval(() => {


      current += increment;


      if (current >= targetPercent) {


        current = targetPercent;


        clearInterval(interval);


      }


      const offset = circumference - (current / 100) * circumference;


      $('.circle').css('stroke-dashoffset', offset);


      $('.percentage').text(Math.round(current) + '%');


    }, stepTime);


  }





  // Animate to 75% on load


  setProgressAnimated(11);


});


$('.jashi-videos').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  autoplay: true,
  autoplayTimeout: 10000, // autoplay every 10 seconds
  autoplaySpeed: 1000, // smooth transition speed (optional)
  items: 4,
  navText: [
    '<span class="fa fa-chevron-left"></span>',
    '<span class="fa fa-chevron-right"></span>'
  ],
  responsive: {
    0: {
      items: 2
    },
    768: {
      items: 2
    },
    1024: {
      items: 4
    }
  }
});






