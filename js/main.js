//usability/responsivness
$(function () {
  var nua = navigator.userAgent
  var isAndroid = (nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 && nua.indexOf('AppleWebKit') > -1 && nua.indexOf('Chrome') === -1)
  if (isAndroid) {
    $('select.form-control').removeClass('form-control').css('width', '100%')
  }

  	$( window ).resize(function() {
  		var con = $( '.main-content' ).width() + 100;
	  	$( ".banner" ).css('max-width', con+'px');  
	});
	$( window ).load(function() {
  		var con = $( '.main-content' ).width() + 100;
	  	$( ".banner" ).css('max-width', con+'px');  
	});
}); 

//master nav > remove if neccessary
$(function(){
	
	$('body').append(''+
		'<div class="btn-group" id="master-list" style="position: fixed; top: 10px; left:15px;">'+
		'  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'+
		'   <i class="fa fa-sitemap"></i> SITEMAP <span class="caret"></span>'+
		'  </button>'+
		'  <ul class="dropdown-menu" style="max-height: 500px; overflow-y: auto;">'+
		'    <li><a href="./">index.html</a></li>'+ 
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./noticias.html">noticias.html</a></li>'+ 
		'    <li><a href="./la-noticia.html">la-noticia.html</a></li>'+ 
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./musica.html">musica.html</a></li>'+ 
		'    <li><a href="./musica-single.html">musica-single.html</a></li>'+
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./club-y-mas.html">club-y-mas.html</a></li>'+ 
		'    <li><a href="./club.html">club.html</a></li>'+
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./calendario.html">calendario.html</a></li>'+ 
		'    <li><a href="./evento-calendario.html">evento-calendario.html</a></li>'+
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./galerias.html">galerias.html</a></li>'+ 
		'    <li><a href="./galeria.html">galeria.html</a></li>'+
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./latinonoise-tv-lista.html">latinonoise-tv-lista.html</a></li>'+ 
		'    <li><a href="./latinonoise-tv.html">latinonoise-tv.html</a></li>'+
		'    <li><a href="./latino-noise.html">latino-noise.html</a></li>'+
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./ganatelo.html">ganatelo.html</a></li>'+ 
		'    <li role="separator" class="divider"></li>'+
		'    <li><a href="./las-chicas.html">las-chicas.html</a></li>'+ 
		'    <li><a href="./oportunidades-de-negocio.html">oportunidades-de-negocio.html</a></li>'+ 
		'    <li><a href="./terminos-y-condiciones.html">terminos-y-condiciones.html</a></li>'+ 
		'    <li><a href="./aviso-de-privacidad.html">aviso-de-privacidad.html</a></li>'+ 
		'    <li><a href="./contactanos.html">contactanos.html</a></li>'+ 
		'    <li><a href="./el-artista-de-la-semana.html">el-artista-de-la-semana.html</a></li>'+ 
		'    <li><a href="./la-chica-de-la-semana.html">la-chica-de-la-semana.html</a></li>'+ 
		'    <li><a href="./registrate.html">registrate.html</a></li>'+ 
		'    <li><a href="./la-rifa.html">la-rifa.html</a></li>'+  
		'    <li><a href="./la-rifa-notificacion.html">la-rifa.html</a></li>'+ 
		'  </ul>'+
		'</div>'
	);
});
