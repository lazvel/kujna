var img = $('.slika');
var holder = $('#holder');
var info = $('#info');
var img1Info = 'Nasa kuhinja vam pruza sirok opseg kako domace, tako i strane kuhinje. Sve najbolje specijalitete koji su popularni sirom sveta. Od predjela(salata, suhomesnatih proizvoda, sireva) preko kuvane hrane(corbe, sarme, paprike) pa sve do gurmanskog rostilja, raznovrsnih testenina, peciva, prefinjenog mesa.. Nase iskusno osoblje je tu da vam pomogne pri odabiru, a tako lepo i da vas usluzi.Dodjite, probajte, uverite se i dodjite nam opet. Vas Restoran ukusne hrane!';

img.on('click', function(){
	info.html(''); //da obrise div kad kliknemo sl put na sliku
	holder.html(''); //da ne cuva slike u memoriji vec da svaki put iznova upisuje
	var self = $(this);
	
	var copy = self.clone();
	copy.css({
		position: 'absolute',
		width: self.width(),
		height: self.height(),
		top : self.offset().top,
		left : self.offset().left
	});
	copy.animate({
		top : holder.offset().top, //prebacuje u poziciju holder-a
		left : holder.offset().left,
		width: holder.width(),
		height: holder.height()
	},1000, function(){
		info.append(img1Info);
	});
	$('#holder').append(copy); //pojavicete se na istom mesto zato sto je pos absolute
});

//back to top
jQuery("#backtotop").click(function () {
    jQuery("body,html").animate({
        scrollTop: 0
    }, 600);
});
jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 150) {
        jQuery("#backtotop").addClass("visible");
    } else {
        jQuery("#backtotop").removeClass("visible");
    }
});
//za stranicu o meni
$(document).ready(function(){
  $('#engl').click(function(){
    $('#nest').fadeToggle();
  });
});

//REGULARNI
function prijava(){
		var user = document.getElementById('name');
		var userL = document.getElementById('Ime');
		var regUser = /^[a-zA-Z]{3,}[0-9]{1,}$/;
		
	if (!regUser.test(user.value)){
		userL.style.color ="red";
		userL.innerHTML = "Username nije u dobrom formatu";
	} else{
		userL.style.color ="green";
		userL.innerHTML ="OK!";
		console.log(user.value);
	}
	
	var regMejl = document.getElementById('email');
	var regMejlL = document.getElementById('Mejl');
	var regMejl2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	if(!regMejl2.test(regMejl.value)){
		regMejlL.style.color = "red";
		regMejlL.innerHTML = "Format mejla nije u redu";
	} else {
		regMejlL.style.color = "green";
		regMejlL.innerHTML = "OK!";
		console.log(regMejl.value);
	}
	
	var tel = document.getElementById('phone');
	var telL = document.getElementById('Tel');
	var regtel = /^06[0-9]{7,8}$/;
	
	if(!regtel.test(tel.value)){
		telL.style.color = "red";
		telL.innerHTML = "Unesite ispravan broj telefona";
	} else{
		telL.style.color = "green";
		telL.innerHTML = "OK!";
		console.log(tel.value);
	}
	
	var cekk = document.getElementById('cek');
	var cekL = document.getElementById('Provera');
	if(!cekk.checked){
		cekL.style.color = "red";
		cekL.innerHTML = "Cekirajte polje";
	} else{
		cekL.style.color = "green";
		cekL.innerHTML = "OK!";
		console.log('slaze se');
	}
	var dat = document.getElementById('datum').value;
	console.log(dat);
	var gosti = document.getElementById('brg').value;
	console.log(gosti);
	var ruc = document.getElementById('rucak').checked;
	var vec = document.getElementById('vecera').checked;
	if(ruc){
		console.log('rucak');
	} else{
		console.log('vecera');
	}
}

	