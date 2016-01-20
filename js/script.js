$(function() {

    // ------NAVBAR - LOGO CLICK EVENT
    $('#logo, #name').click(function(event) {
        // if (event.target.id == "logo" || event.target.id == "name")
        $(window).scrollTo('0%', 500);
        // window.location.hash = "#Home";
    });
    // ------ END NAVBAR - LOGO CLICK EVENT

    $(".button-fill").hover(function() {
        $(this).children(".button-inside").addClass('full');
    }, function() {
        $(this).children(".button-inside").removeClass('full');
    });

    // $(window).scrollTo('0%', 500
    // // , {  easing: 'easeInOutQuad'}
    // );


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

        ////
        // console.log(scrollPos);
        //

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


    // var baseUrl = window.location.href.split('#')[0];
    //window.location.replace( baseUrl + '#' + url );

    //------- SCROLL EVENT
    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var st = $(this).scrollTop();
        if (st >= lastScrollTop) {
            $('#FixedMenu').addClass("menuCollapse");
            // console.log(st)
        } else {
            // upscroll code
            if (st <= 0) {
                $('#FixedMenu').removeClass('menuCollapse');
            }
        }
        lastScrollTop = st;
    });
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
