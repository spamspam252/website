$(function() {

    $('#logo, #name, #About, #Portfolio, #Blog, #Contact').click(function(event) {
        if (event.target.id == "logo" || event.target.id == "name")
            $(window).scrollTo('0%', 500);
        else if (event.target.id == "About")
            $(window).scrollTo('24.9%', 500);
        else if (event.target.id == "Portfolio")
            $(window).scrollTo('40.3%', 500);
        else if (event.target.id == "Blog")
            $(window).scrollTo('60.1%', 500);
        else if(event.target.id == "Contact")
            $(window).scrollTo('89.3%', 500);

    });

    // $(window).scrollTo('0%', 500
    // // , {  easing: 'easeInOutQuad'}
    // );


    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var st = $(this).scrollTop();
        if (st >= lastScrollTop) {

            $('#FixedMenu').addClass("menuCollapse");

        } else {
            // upscroll code
            if (st <= 0) {
                $('#FixedMenu').removeClass('menuCollapse');
            }
        }
        lastScrollTop = st;
    });


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
