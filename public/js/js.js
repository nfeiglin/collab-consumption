

$( document ).ready(function () {
 var bgobj = $('#abs');
var $window = $(window);
// setHeroPadding();

$("#contactPoster").modal();
var checkbox=$("input[type=checkbox]");checkbox.change(function(){if($(this).prop("checked")){$(this).attr("checked","checked")}else{$(this).removeAttr("checked")}})
$(window).scroll(function() {

var yPos = -($window.scrollTop() / bgobj.data('speed'));

var coords = '50% '+ yPos + 'px';
 
// Move the background
bgobj.css({ backgroundPosition: coords });

}); 

$(window).resize(function() {

// setHeroPadding();


 
});



}); 
/* Google Places Autocomplete */
var input = ('#inputCity');
$( "#inputCity" ).keypress(function() {
var value = $(this).val();

var url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?input=" + value + "&types=geocode&key=AddYourOwnKeyHere";
  var call = $.getJSON( url, function(resData) {
  
  $.each( resData, function( key, val ) {
    items.push( "<li id='" + key + "'>" + val + "</li>" );
  });
  
  
  console.log( "success" );
})
  .done(function() {
    console.log( "second success" );
  })
  .fail(function() {
    console.log( "error" );
  })
  .always(function() {
    console.log( "complete" );
  });
 
// Perform other work here ...
 
// Set another completion function for the request above
call.complete(function() {
  console.log( "second complete" );
});
  
  
  
});



/*

var setHeroPadding = function() {
var $window = $(window);
var hero = $('#hero-unit');

		if ($window.width() >= "900" && $window.height() >= "500") {
console.log("Window height: " + $window.height() + "Window width: " + $window.width() );

	
	hero.css("padding", "100px 0 250px");
	console.log("Padding: 100px 0 250px SPCEICAL CSS for #hero.css");

	} else {
		hero.css("padding", "100px 0 150px");
		console.log("Regular CSS for #hero.css");
	}


}
*/

/*
$(document).ready(function(){
                         
 console.log("Window height: " + $(window).height() + "Window width: " + $(window).width() );
 console.log("Hello world");

var $bgobj = $('#abs');

$(window).scroll(function() {

	var yPos = -($window.scrollTop() / $bgobj.data('speed')); 


	var coords = '50% '+ yPos + 'px';
 
// Move the background
$bgobj.css({ backgroundPosition: coords });
    
}); 



}); 



});

*/

