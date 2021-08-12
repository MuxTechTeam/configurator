//visualize views

$(document).ready(function(){
$("div.box-view").show();
$("div.side-view").hide();
$("div.back-view").hide();
$("div.front-view").hide();
});

//set variables

var $side_view = $("div.side-view");
var $top_view = $("div.back-view");
var $front_view = $("div.front-view");

//set front view as default

$(document).ready(function() {    
         $( "div.container").replaceWith($front_view);
         $("div.front-view").show();
});

//switch views

$(document).ready(function() {    
    $('.animate').bind('click', function() {
         if($(this).hasClass('activetop')) {
         	var $container = $( "div.container" ).replaceWith($top_view);
            $('div.side-view').hide();
            $('div.front-view').hide();
            $('div.back-view').show();
        }
        if($(this).hasClass('activeside')) {
            var $container = $( "div.container" ).replaceWith($side_view);
			$('div.side-view').show();
            $('div.front-view').hide();
            $('div.back-view').hide();
        }
         if($(this).hasClass('activefront')) {
         	var $container = $( "div.container" ).replaceWith($front_view);
            $('div.side-view').hide();
            $('div.front-view').show();
            $('div.back-view').hide();
        }
    });
});


