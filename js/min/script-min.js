$(function(){function e(e){var t=$(document).scrollTop();$("#FixedMenu nav ul li a").each(function(){var e=$(this),s=$(e.attr("href"));s.position().top<t+250?($("#FixedMenu nav ul li a").removeClass("active"),e.addClass("active")):e.removeClass("active")})}function t(){setTimeout(function(){$("#submitMessage").removeClass("onclic"),$("#submitMessage").addClass("validate",450,s)},2250)}function s(e){e.disable()}function i(){setTimeout(function(){$("#submitNewsLetter").removeClass("onclic"),$("#submitNewsLetter").addClass("validate",450,s)},2250)}$("#logo, #name").click(function(e){$(window).scrollTo("0%",500)}),$(".button-fill").hover(function(){$(this).children(".button-inside").addClass("full")},function(){$(this).children(".button-inside").removeClass("full")}),$(document).ready(function(){$(document).on("scroll",e),$('a[href^="#"]').on("click",function(t){t.preventDefault(),$(document).off("scroll"),$("a").each(function(){$(this).removeClass("active")}),$(this).addClass("active");var s=this.hash,i=s;$target=$(s),$("html, body").stop().animate({scrollTop:$target.offset().top-75},500,"swing",function(){window.location.replace=s,$(document).on("scroll",e)})})});var n=0;$(window).scroll(function(e){var t=$(this).scrollTop();t>=n?$("#FixedMenu").addClass("menuCollapse"):0>=t&&$("#FixedMenu").removeClass("menuCollapse"),n=t}),$("#submitMessage").click(function(){$("#submitMessage").addClass("onclic",250,t)}),$("#submitNewsLetter").click(function(){$("#submitNewsLetter").addClass("onclic",250,i)})});