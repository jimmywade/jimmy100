
function on_off(a,b){
	var detailesA = document.getElementById(a);
	var detailesB = document.getElementById(b);
	var details2 = detailesB.style.display;
	var details3 = "none";
	if (details2 == details3){
		detailesB.style.display = "block";
		detailesA.style.display = "none";
	}
	var details5 = "block";
	if (details2 == details5){
		detailesB.style.display = "none"; detailesA.style.display = "block";
	}	
}


function on(element){
	var elemento = document.getElementById(element);
		elemento.style.display = "block";
}


function off(elem){
	var elemto = document.getElementById(elem);
	    elemto.style.display = "none";
}



function last(){
	location.reload();
}


function actv(n){
    var pantalla2 = document.getElementById(n);
    pantalla2.style.display = "block";
}


function desactv(q){
    var pantalla1 = document.getElementById(q);
    pantalla1.style.display = "none";
}


function apagar(){
    var pantalla1 = document.getElementById('login');
    pantalla1.style.display = "none";
}


function prender(){
    var pantalla2 = document.getElementById("cv");
    pantalla2.style.display = "block";
}


function detalles(a,b){
	var detailesA = document.getElementById(a);
	var detailesB = document.getElementById(b);
	var details2 = detailesB.style.display;
	var details3 = "none";
	if (details2 == details3){
		detailesB.style.display = "block";
		detailesA.style.display = "none";
	}
	var details5 = "block";
	if (details2 == details5){detailesB.style.display = "none"; detailesA.style.display = "block";}
		
}




function single(c){
	var elElemento = document.getElementById(c);
	var laPropiedad = elElemento.style.display;
	var apagado = "none";
	var prendido = "block";
	if (laPropiedad == apagado){elElemento.style.display = "block";}
	if (laPropiedad == prendido){elElemento.style.display = "none";}
}




function entrevista(p,q){
	var elElemento = document.getElementById(p);
	var laPropiedad = elElemento.style.display;
	var apagado = "none";
	if (laPropiedad == apagado){elElemento.style.display = "block";}

	var elElemento2 = document.getElementById(q);
	elElemento2.style.display = "none";
    
    //esto es para comprobar que halla seleccionado algun tipo de entrevista una especie de required que se comprobara en el submit si esta variable es diferente de 1
	var escogioentrevista=1;
}





function volverVisible(faa){
    var fa = document.getElementById(faa);
	fa.style.display = "block";
}



function settear(){
    //esto es para comprobar que halla seleccionado algun tipo de entrevista una especie de required que se comprobara en el submit si esta variable es diferente de 1
	var escogioentrevista=1;
}



function resetForm(nombreForm){
	document.forms[nombreForm].reset();
}