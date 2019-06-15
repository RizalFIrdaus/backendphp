let keyword = document.getElementById("Keyword");

let table = document.getElementById("container");

keyword.addEventListener("keyup",function(){


	// Template ajax
	console.log(keyword.value);
		let ajax = new XMLHttpRequest();

		ajax.onreadystatechange = function(){
			if ( ajax.readyState == 4  && ajax.status == 200 ){
				table.innerHTML = ajax.responseText;
			}
		}

		ajax.open("GET" , "ajax/laptop.php?Keyword="+keyword.value,true);
		ajax.send();
});