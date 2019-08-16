function pick(id){
	//kako je id string , konvertujem ga u int
	var broj=parseInt(id);
	//ostatak pri djeljenju sa 10 je drugi faktor
	//uvecavam i drugi i prvi faktor za 1 jer sam tablicu napravio od 0-9
	var factor2=broj%10+1;
	//rezultat pri cjelobrojnom djeljenju ID-a sa 10 je prvi faktor
	var factor1=(broj-factor2+1)/10+1;
	var rezultat=factor1*factor2;
	//popunjanje polja 
	document.getElementById(id).innerHTML=""+factor1+"x"+factor2+"="+rezultat;
	//otvaranje i slanje xmlhttp zahtjeva
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","write2db.php?factor1="+factor1+"&factor2="+factor2, true);
	xmlhttp.send();

}