//slajder
$(document).ready(function(){ 
	var holder = $('#holder');
	var current = 1;
	var loop;
	
	loop = setInterval(next,4000);
	function next(){
		current++;
		if(current ===7){
			current = 1;
		};
		holder.append('<img src="images/slajd/'+current+'.png"></img>');
		holder.animate({
			'margin-left': '-=1000' //gura za toliko px sliku u levo
		}, 2000)
	}
});
//back to top
$("#backtotop").click(function () {
    $("body,html").animate({
        scrollTop: 0
    }, 600);
});
$(window).scroll(function () {
    if ($(window).scrollTop() > 150) {
        $("#backtotop").addClass("visible");
    } else {
        $("#backtotop").removeClass("visible");
    }
});

$(document).ready(function(){
  $('#hideButton').click(function(){
    $('#fejd').fadeToggle();
  });
});