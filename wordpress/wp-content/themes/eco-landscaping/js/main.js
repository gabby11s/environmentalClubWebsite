// Menu
function eco_landscaping_openNav() {
  jQuery(".sidenav").addClass('show');
}
function eco_landscaping_closeNav() {
  jQuery(".sidenav").removeClass('show');
}

( function( window, document ) {
  function eco_landscaping_keepFocusInMenu() {
    document.addEventListener( 'keydown', function( e ) {
      const eco_landscaping_nav = document.querySelector( '.sidenav' );

      if ( ! eco_landscaping_nav || ! eco_landscaping_nav.classList.contains( 'show' ) ) {
        return;
      }
      const elements = [...eco_landscaping_nav.querySelectorAll( 'input, a, button' )],
        eco_landscaping_lastEl = elements[ elements.length - 1 ],
        eco_landscaping_firstEl = elements[0],
        eco_landscaping_activeEl = document.activeElement,
        tabKey = e.keyCode === 9,
        shiftKey = e.shiftKey;

      if ( ! shiftKey && tabKey && eco_landscaping_lastEl === eco_landscaping_activeEl ) {
        e.preventDefault();
        eco_landscaping_firstEl.focus();
      }

      if ( shiftKey && tabKey && eco_landscaping_firstEl === eco_landscaping_activeEl ) {
        e.preventDefault();
        eco_landscaping_lastEl.focus();
      }
    } );
  }
  eco_landscaping_keepFocusInMenu();
} )( window, document );

(function ($) {

    $(window).load(function () {
        $("#pre-loader").delay(500).fadeOut();
        $(".loader-wrapper").delay(1000).fadeOut("slow");

    });

    $(document).ready(function () {

       // $(".toggle-button").click(function () {
       //      $(this).parent().toggleClass("menu-collapsed");
       //  });

        /*--- adding dropdown class to menu -----*/
        $("ul.sub-menu,ul.children").parent().addClass("dropdown");
        $("ul.sub-menu,ul.children").addClass("dropdown-menu");
        $("ul#menuid li.dropdown a,ul.children li.dropdown a").addClass("dropdown-toggle");
        $("ul.sub-menu li a,ul.children li a").removeClass("dropdown-toggle");
        $('nav li.dropdown > a, .page_item_has_children a').append('<span class="caret"></span>');
        $('a.dropdown-toggle').attr('data-toggle', 'dropdown');

        /*-- Mobile menu --*/
        if ($('#site-navigation').length) {
            $('#site-navigation .menu li.dropdown,li.page_item_has_children').append(function () {
                return '<i class="bi bi-caret-down-fill" aria-hd="true"></i>';
            });
            $('#site-navigation .menu li.dropdown .bi,li.page_item_has_children .bi').on('click', function () {
                $(this).parent('li').children('ul').slideToggle();
            });
        }

        /*-- tooltip --*/
        $('[data-toggle="tooltip"]').tooltip();

        /*-- Button Up --*/
        var btnUp = $('<div/>', { 'class': 'btntoTop' });
        btnUp.appendTo('body');
        $(document).on('click', '.btntoTop', function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 700);
        });

        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 200)
                $('.btntoTop').addClass('active');
            else
                $('.btntoTop').removeClass('active');
        });


        /*-- Reload page when width is between 320 and 768px and only from desktop */
        var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;
        $(window).on('resize', function () {
            var win = $(this); //this = window
            if (win.width() > 320 && win.width() < 991 && isMobile == false && !$("body").hasClass("elementor-editor-active")) {
                location.reload();
            }
        });
    });

})(this.jQuery);
 
// slider section
jQuery('document').ready(function(){
  var owl = jQuery('#services-wrap .owl-carousel');
    owl.owlCarousel({
    margin:30,
    nav: false,
    autoplay :true,
    lazyLoad: true,
    autoplayTimeout: 9000,
    loop: true,
    dots:false,
    navText : ['<i class="bi bi-chevron-left"></i>', '<i class="bi bi-chevron-right"></i>'],
    responsive: {
      0: {
        items: 1
      },
      576: {
        items: 1
      },
      768: {
        items: 3
      },
      1000: {
        items: 5
      }
    },
    autoplayHoverPause : true,
    mouseDrag: true
  });
});

// custom-header-text
(function( $ ) {
    // Update site title and description color in real-time
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( newval ) {
            if ( 'blank' === newval ) {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'rect(1px, 1px, 1px, 1px)',
                    'position': 'absolute'
                });
            } else {
                $( '.site-title a, .site-description' ).css({
                    'clip': 'auto',
                    'position': 'relative',
                    'color': newval
                });
            }
        });
    });
})( jQuery );

// search form

    document.addEventListener("DOMContentLoaded", function () {
    const searchIcon = document.getElementById("search-icon");
    const searchForm = document.getElementById("search-form");

    if (searchIcon && searchForm) {
        searchIcon.addEventListener("click", function () {
            searchForm.style.display = searchForm.style.display === "block" ? "none" : "block";
        });
    }
    });

    // custom-logo
( function( $ ) {
    wp.customize( 'eco_landscaping_logo_width', function( value ) {
        value.bind( function( newVal ) {
            $( '.logo .custom-logo' ).css( 'max-width', newVal + 'px' );
        } );
    } );
} )( jQuery );