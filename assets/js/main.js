/*
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/
//for clique in a propos de nous

//les fonctions pour les coockies
//pour l'user profil

function getInfo(idProp, idApp){
    $.post( "GetInfo.php", {id_prop: idProp, id_app: idApp},function( data ) {
    	let dataJson = JSON.parse(data);
    	var Div = "";
        $.each(dataJson, function (i, fb) {
            Div = Div + "<tr class='table-success'> <td colspan='2'> " +  fb.DATEDEBUT + "</td><td colspan='2'>" +  fb.DATEFIN + "</td><td> " + fb.IDR + "</td></tr>";
        });
        $("#bodyInfo").empty();
        $("#bodyInfo").append(Div);
        $('#modalinformation').modal("show");
    });
}

function getInfoEqui(idProp, idEqui){
    $.post( "GetInfo.php", {id_prop: idProp, id_equi: idEqui},function( data ) {
        let dataJson = JSON.parse(data);
        var Div = "";
        $.each(dataJson, function (i, fb) {
            Div = Div + "<tr class='table-success'> <td colspan='2'> " +  fb.IDR  + "</td><td colspan='2'>" +  fb.QUANTITE + "</td>";
        });
        $("#bodyInfoEqui").empty();
        $("#bodyInfoEqui").append(Div);
        $('#modalinformationEqui').modal("show");
    });
}

//pour récupérer un coockie
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

//pour inialiser un coockie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

//pour marquer la page ou on est
function set_currentPage(my_page) {
    setCookie("current_page",my_page,7);
    var current_page = getCookie("current_page");
    document.getElementById(current_page).classList.add("current");
}

function remove_current()
{
    var current_page = getCookie("current_page");
    document.getElementById(current_page).classList.remove("current");
}

$(document).ready( function () {
	//la div ou on clique
    $("#aproposdenous").click(function () {
    	//la div ou on veut aller
		var url_accueil_tmp = url_accueil + "index.php";
		if (window.location.href == url_accueil || window.location.href == url_accueil_tmp) {
            remove_current();
            set_currentPage("aproposdenous");
            $('html,body').animate({scrollTop: $("#main-wrapper").offset().top}, 'slow');
        }
    });
    $(".but_contacter").click(function () {
        //ce que tu veux faire quand il clique sur contacter
		//ce qui veut dire afficher le modal pour contacter
		console.log(this.value);
        var text = "Bonjour, Je vous contacte pour votre " + this.value;
		$("#contact_area").val(text);
        $('#modalcontacter').modal("show");
    });

    $(".but_information").click(function () {
        //ce que tu veux faire quand il clique sur contacter
        //ce qui veut dire afficher le modal pour contacter
        console.log(this.value);
        $('#modalinformation').modal("show");
    });
});


(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 980px)',
		small: '(max-width: 736px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				$body.removeClass('is-loading');
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on medium.
			skel.on('+medium -medium', function() {
				$.prioritize(
					'.important\\28 medium\\29',
					skel.breakpoint('medium').active
				);
			});

		// Dropdowns.
			$('#nav > ul').dropotron({
				mode: 'fade',
				noOpenerFade: true,
				speed: 300
			});

		// Off-Canvas Navigation.

			// Navigation Toggle.
				$(
					'<div id="navToggle">' +
						'<a href="#navPanel" class="toggle"></a>' +
					'</div>'
				)
					.appendTo($body);

			// Navigation Panel.
				$(
					'<div id="navPanel">' +
						'<nav>' +
							$('#nav').navList() +
						'</nav>' +
					'</div>'
				)
					.appendTo($body)
					.panel({
						delay: 500,
						hideOnClick: true,
						hideOnSwipe: true,
						resetScroll: true,
						resetForms: true,
						side: 'left',
						target: $body,
						visibleClass: 'navPanel-visible'
					});

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#navToggle, #navPanel, #page-wrapper')
						.css('transition', 'none');

	});

})(jQuery);