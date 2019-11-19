jQuery(document).ready(function() {
  (function($) {
    // // add any css classes you don't want to be smoothState-d here
    // var notSmooth =
    //   '.nav-search, btn-nav-search, .search-close, .mega-menu-item-has-children .mega-menu-link, .wp-block-gallery a[href$=".jpg"], .wp-block-gallery a[href$=".jpeg"], .wp-block-gallery a[href$=".png"], .wp-block-gallery a[href$=".gif, "], .cortex-popup';
    // var options = {
    //     prefetch: true,
    //     cacheLength: 2,
    //     blacklist: notSmooth,
    //     onStart: {
    //       duration: 250, // Duration of our animation
    //       render: function($container) {
    //         // Add your CSS animation reversing class
    //         $container.addClass("is-exiting");
    //         // Restart your animation
    //         smoothState.restartCSSAnimations();
    //       }
    //     },
    //     onReady: {
    //       duration: 0,
    //       render: function($container, $newContent) {
    //         // Remove your CSS animation reversing class
    //         $container.removeClass("is-exiting");
    //         // Inject the new content
    //         $container.html($newContent);
    //       }
    //     }
    //   },
    //   smoothState = $("#page")
    //     .smoothState(options)
    //     .data("smoothState");
    // document
    //   .querySelectorAll(".navbar-nav > .nav-item > .nav-link")
    //   .forEach(btn => {
    //     btn.addEventListener("click", () => {
    //       gsap.to(window, {
    //         duration: 3,
    //         scrollTo: { href, offsetY: 70 }
    //       });
    //     });
    //   });

    $("body").on(
      "click touchstart",
      ".navbar-nav > .nav-item > .nav-link[href^='/#'], .scroll-me a[href^='/#']",
      function(event) {
        event.preventDefault();

        //what link was clicked
        var sectionLink = $(event.target).attr("href");
        var anchorID = sectionLink.substr(1);

        // scroll to that part of the page
        gsap.to(window, {
          duration: 2,
          scrollTo: { y: anchorID, offsetY: 55 },
          ease: Power2.easeOut
        });
      }
    );
  })(jQuery);
});

// init controller
var controller = new ScrollMagic.Controller({
  globalSceneOptions: { duration: 100 }
});

// build scenes
new ScrollMagic.Scene({ triggerElement: "#tour" })
  .setClassToggle(".c9-tour", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#music" })
  .setClassToggle(".c9-music", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#album" })
  .setClassToggle(".c9-album", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#videos" })
  .setClassToggle(".c9-videos", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#store" })
  .setClassToggle(".c9-store", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#blog" })
  .setClassToggle(".c9-blog", "nav-highlight") // add class toggle
  .addTo(controller);
new ScrollMagic.Scene({ triggerElement: "#photos" })
  .setClassToggle(".c9-photos", "nav-highlight") // add class toggle
  .addTo(controller);
