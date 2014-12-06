$("irArriba").click(function(){
  $("html, body").animate({scrollTop:0}, 500);
  return false;
});


function cerrar_capa_login(){
	document.getElementById("flotanteLogin").style.display="none";
}

function mostrar_capa_login(){
	document.getElementById("flotanteLogin").style.display="block";
}

