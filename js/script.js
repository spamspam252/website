$(function() {


    // ------NAVBAR - LOGO CLICK EVENT
    $('#logo, #name, #AboutNav, #PortfolioNav, #BlogNav, #ContactNav').click(function(event) {
        if (event.target.id == "logo" || event.target.id == "name")
            $(window).scrollTo('0%', 500);
        else if (event.target.id == "AboutNav")
            $(window).scrollTo($("#startAbout"), 500,{offset:-75});
        else if (event.target.id == "PortfolioNav")
            $(window).scrollTo($("#startPortfolio"), 500,{offset:-75});
        else if (event.target.id == "BlogNav")
            $(window).scrollTo($("#startBlog"), 500, {offset:-75});
        else if (event.target.id == "ContactNav")
            $(window).scrollTo($("#startContact"), 500, {offset:-75});
    });
    // ------ END NAVBAR - LOGO CLICK EVENT


    // $(window).scrollTo('0%', 500
    // // , {  easing: 'easeInOutQuad'}
    // );

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
