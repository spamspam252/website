$(function() {

    $('#name').hide();
    var lastScrollTop = 0;
    $(window).scroll(function(event) {
        var st = $(this).scrollTop();
        if (st > lastScrollTop) {
            // downscroll code
            // console.log("down");
            // $('#logo').slideUp('fast');
            // $('#name').slideDown('fast');
            // $('#FixedMenu').css({
            //     height: '90px'
            // });

        } else {
            // upscroll code
            if (st === 0) {
                // $('#logo').slideDown('fast');
                // $('#name').slideUp('fast').fadeOut('fast', function() {

                // });;
                // $('#FixedMenu').css({
                //     height: '110px'
                // });
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
