$(function() {
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
