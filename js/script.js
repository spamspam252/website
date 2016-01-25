$(function() {
    var size = 0;

    (function($, viewport) {
        $(document).ready(function() {


            // Executes in SM, MD and LG breakpoints
            if (viewport.is('<=sm')) {
                size = 2;
                console.log(size);
                $('#menuContainer').addClass("menuPhone");
                $('#navigation').addClass("navbar-expand");
                $('article').addClass('articleCollapse');
                $('body').addClass('bodyPhone');


                $('#aboutNav a').attr("href","About");
                $('#portfolioNav a').attr("href","Portfolio");
                $('#blogNav a').attr("href","Blog");
                $('#contactNav a').attr("href","Contact");
                // $('#logoContent').addClass("logoPhone");
                
            }

            // Executes in XS and SM breakpoints
            if (viewport.is('>sm')) {
                size = 3;
                console.log(size);

                $('#container').addClass('container-expand');


                $('#logo, #name').click(function(event) {
                    $(window).scrollTo('0%', 500);
                });

                $(document).ready(function() {
                    $(document).on("scroll", onScroll);

                    //smoothscroll
                    $('a[href^="#"]').on('click', function(e) {
                        e.preventDefault();
                        $(document).off("scroll");

                        $('a').each(function() {
                            $(this).removeClass('active');
                        });
                        $(this).addClass('active');

                        var target = this.hash,
                            menu = target;
                        $target = $(target);
                        $('html, body').stop().animate({
                            'scrollTop': $target.offset().top - 75
                        }, 500, 'swing', function() {
                            window.location.replace = target;


                            $(document).on("scroll", onScroll);
                        });
                    });

                });


                // #FixedMenu nav ul li a
                function onScroll(event) {
                    var scrollPos = $(document).scrollTop();

                    //chuki => ten
                    // if (scrollPos >= lastScrollTop) {
                    //     $('#menuContainer').addClass("menuCollapse");
                    // } else {
                    //     // upscroll code
                    //     if (scrollPos <= 0) {
                    //         $('#menuContainer').removeClass('menuCollapse');
                    //     }
                    // }
                    // lastScrollTop = scrollPos;
                    /////

                    $('#FixedMenu nav ul li a').each(function() {
                        var currLink = $(this);
                        // console.log(currLink);
                        var refElement = $(currLink.attr("href"));
                        // console.log(refElement);
                        // refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos
                        if (refElement.position().top < scrollPos + 250) {
                            $('#FixedMenu nav ul li a').removeClass("active");
                            currLink.addClass("active");
                            // history.pushState("", document.title, window.location.pathname);
                        } else {
                            currLink.removeClass("active");
                        }
                    });
                }

                var lastScrollTop = 0;
                $(window).scroll(function(event) {
                    var st = $(this).scrollTop();
                    if (st >= lastScrollTop) {
                        $('#menuContainer').addClass("menuCollapse");
                        // console.log(st)
                    } else {
                        // upscroll code
                        if (st <= 0) {
                            $('#menuContainer').removeClass('menuCollapse');
                        }
                    }
                    lastScrollTop = st;
                });


            }

            // Execute code each time window size changes
            // $(window).resize(
            //     viewport.changed(function() {
            //         if (viewport.is('xs')) {
            //             // ...
            //         }
            //     })
            // );
        });
    })(jQuery, ResponsiveBootstrapToolkit);


    // ------NAVBAR - LOGO CLICK EVENT
    // $('#logo, #name').click(function(event) {
    //     $(window).scrollTo('0%', 500);
    // });
    // ------ END NAVBAR - LOGO CLICK EVENT

    $(".button-fill").hover(function() {
        $(this).children(".button-inside").addClass('full');
    }, function() {
        $(this).children(".button-inside").removeClass('full');
    });

    // $(window).scrollTo('0%', 500
    // // , {  easing: 'easeInOutQuad'}
    // );


    // $(document).ready(function() {
    //     $(document).on("scroll", onScroll);

    //     //smoothscroll
    //     $('a[href^="#"]').on('click', function(e) {
    //         e.preventDefault();
    //         $(document).off("scroll");

    //         $('a').each(function() {
    //             $(this).removeClass('active');
    //         });
    //         $(this).addClass('active');

    //         var target = this.hash,
    //             menu = target;
    //         $target = $(target);
    //         $('html, body').stop().animate({
    //             'scrollTop': $target.offset().top - 75
    //         }, 500, 'swing', function() {
    //             window.location.replace = target;


    //             $(document).on("scroll", onScroll);
    //         });
    //     });

    // });


    // var lastScrollTop = 0;
    // // #FixedMenu nav ul li a
    // function onScroll(event) {
    //     var scrollPos = $(document).scrollTop();

    //     //chuki => ten
    //     if (scrollPos >= lastScrollTop) {
    //         $('#menuContainer').addClass("menuCollapse");
    //     } else {
    //         // upscroll code
    //         if (scrollPos <= 0) {
    //             $('#menuContainer').removeClass('menuCollapse');
    //         }
    //     }
    //     lastScrollTop = scrollPos;
    //     /////

    //     $('#FixedMenu nav ul li a').each(function() {
    //         var currLink = $(this);
    //         // console.log(currLink);
    //         var refElement = $(currLink.attr("href"));
    //         // console.log(refElement);
    //         // refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos
    //         if (refElement.position().top < scrollPos + 250) {
    //             $('#FixedMenu nav ul li a').removeClass("active");
    //             currLink.addClass("active");
    //             // history.pushState("", document.title, window.location.pathname);
    //         } else {
    //             currLink.removeClass("active");
    //         }
    //     });
    // }


    // var baseUrl = window.location.href.split('#')[0];
    //window.location.replace( baseUrl + '#' + url );

    //------- SCROLL EVENT


    //------- END SCROLL EVENT

    $("#submitMessage").click(function() {
        $("#submitMessage").addClass("onclic", 250, validate);
    });

    function validate() {
        // window.alert("timeOut");
        setTimeout(function() {
            $("#submitMessage").removeClass("onclic");
            $("#submitMessage").addClass("validate", 450, callback);
        }, 2250);
    }

    function callback(e) {
        // window.alert("callback");
        // setTimeout(function() {
        //   $( "#submitMessage" ).removeClass( "validate" );
        // }, 1250 );
        e.disable();
    }

    $("#submitNewsLetter").click(function() {
        $("#submitNewsLetter").addClass("onclic", 250, validate2);
    });

    function validate2() {
        // window.alert("timeOut");
        setTimeout(function() {
            $("#submitNewsLetter").removeClass("onclic");
            $("#submitNewsLetter").addClass("validate", 450, callback);
        }, 2250);
    }



});
