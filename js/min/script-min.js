$(function(){function t(){setTimeout(function(){$("#submitMessage").removeClass("onclic"),$("#submitMessage").addClass("validate",450,o)},2250)}function o(t){t.disable()}function s(){setTimeout(function(){$("#submitNewsLetter").removeClass("onclic"),$("#submitNewsLetter").addClass("validate",450,o)},2250)}$("#logo, #name, #AboutNav, #PortfolioNav, #BlogNav, #ContactNav").click(function(t){"logo"==t.target.id||"name"==t.target.id?$(window).scrollTo("0%",500):"AboutNav"==t.target.id?$(window).scrollTo($("#startAbout"),500,{offset:-75}):"PortfolioNav"==t.target.id?$(window).scrollTo($("#startPortfolio"),500,{offset:-75}):"BlogNav"==t.target.id?$(window).scrollTo($("#startBlog"),500,{offset:-75}):"ContactNav"==t.target.id&&$(window).scrollTo($("#startContact"),500,{offset:-75})});var e=0;$(window).scroll(function(t){var o=$(this).scrollTop();o>=e?$("#FixedMenu").addClass("menuCollapse"):0>=o&&$("#FixedMenu").removeClass("menuCollapse"),e=o}),$("#submitMessage").click(function(){$("#submitMessage").addClass("onclic",250,t)}),$("#submitNewsLetter").click(function(){$("#submitNewsLetter").addClass("onclic",250,s)})});