$(document).ready(function(){var a=function(){this.navLi=$("#nav li").children("ul").hide().end();this.init()};a.prototype={init:function(){this.setMenu()},setMenu:function(){$.each(this.navLi,function(){if($(this).children("li ul li ul")[0]){$(this).append("<span />").children("span").addClass("menuChildren")}});this.navLi.hover(function(){$(this).find("> ul").stop(true,true).fadeIn({duration:200});$(this).children("a:first").addClass("hov")},function(){$(this).find("> ul").stop(true,true).hide();$(this).children("a:first").removeClass("hov")})}};new a()});$(".lr_content").hide();$(".lr_button").click(function(){$(".lr_content").slideToggle(300)});jQuery(document).ready(function(a){a(".lightbox").lightbox()});jQuery(document).ready(function(){$("blockquote.testimonials_home").quovolver()});$(document).ready(function(){$(".tab_content").hide();$("ul.tabs li:first").addClass("active").show();$(".tab_content:first").show();$("ul.tabs li").click(function(){$("ul.tabs li").removeClass("active");$(this).addClass("active");$(".tab_content").hide();var a=$(this).find("a").attr("href");$(a).fadeIn();return false})});$(document).ready(function(){ if ($('#copy_sec').length != 0) { $('#copy_sec').append(" by <a href=\"http://tecdiary.net\" target=\"_blank\">Tecdiary IT Solutions</a>"); } else { $('#wrapper').append("<div style=\"width:100%; text-align: center; margin: 5px 0; padding: 5px 0; border-top: 1px dotted #CCC; display: block;\">Developed by <a href=\"http://tecdiary.net\" target=\"_blank\">Tecdiary IT Solutions</a></div>"); }	$(".accordion_button").click(function(){$(".accordion_button").removeClass("acdn_on");$(".accordion_container").slideUp("normal");if($(this).next().is(":hidden")==true){$(this).addClass("acdn_on");$(this).next().slideDown("normal");$(".accordion_button span").addClass("minus")}});$(".accordion_button").mouseover(function(){$(this).addClass("acdn_over")}).mouseout(function(){$(this).removeClass("acdn_over")});$(".accordion_container").hide()});$(".toggle_content").hide();$(".toggle_block h4").click(function(){$(this).toggleClass("tgg_close").next().slideToggle("medium")});$(".alert").click(function(){$(this).hide("normal")});$(".vnav li a").hover(function(){$(this).animate({paddingLeft:"10px"},150)},function(){$(this).animate({paddingLeft:"0"},150)});$(function(){$(".img_pf_hover").hover(function(){$("img",this).animate({opacity:"0.6"},{queue:true,duration:200})},function(){$("img",this).animate({opacity:"1"},{queue:true,duration:300})})});$(function(){$(".flickr_photos img").hover(function(){$(this).animate({opacity:"0.6"},{queue:true,duration:200})},function(){$(this).animate({opacity:"1"},{queue:true,duration:300})})});$(function(){$(".social a").hover(function(){$(this).animate({opacity:"0.6"},{queue:true,duration:200})},function(){$(this).animate({opacity:"1"},{queue:true,duration:300})})});$(function(){$("input:checkbox, input:radio, input:file").uniform()});$(".chzn-select").chosen({ disable_search_threshold: 5 /*, allow_single_deselect: true */ });$(".chzn-select-deselect").chosen({allow_single_deselect:true});var galleryData=jQuery(".portfolio_content").clone();jQuery(".filter li a").click(function(){jQuery(".filter li a").removeClass("active_cat").stop();var b=jQuery(this).attr("id");if(b=="all"){var a=galleryData.find(".item")}else{var a=galleryData.find(".item[data-type~="+b+"]")}jQuery(".portfolio_content").quicksand(a,{adjustHeight:"dynamic",duration:700,easing:"swing",enhancement:function(){Cufon.replace("h1, h2, h3, h4, h5, h6",{fontFamily:"Share-Regular",hover:true}),$(".lightbox").lightbox(),$(".img_pf_hover").hover(function(){$("img",this).animate({opacity:"0.6"},{queue:true,duration:150});$(".img_pf_icon, .img_pf_icon2, .img_pf_text",this).css("display","block")},function(){$("img",this).animate({opacity:"1"},{queue:true,duration:300});$(".img_pf_icon, .img_pf_icon2, .img_pf_text",this).css("display","none")})}});jQuery(this).addClass("active_cat").stop();return false});