var from="";
var to="";
var field="";
var comb="";
var from1 = "";
var to1 = "";

function addDate()
{
	var temp = 0;
	document.report.from.style="";
	document.report.to.style="";
	document.report.datecategory.style="";
	var x = document.getElementById("from").value;
	var y = document.getElementById("to").value;
	var z = document.getElementById("datecategory").value;

	//alert(x);
	//alert(y);
	//alert(z);

	if(x == "" && y == ""){
		alert("No Value Chosen");
		document.report.from.style = "border:2px solid red";
		document.report.to.style = "border:2px solid red";
		document.getElementById("from").focus();
		temp = 1;
	}
	else if(z == ""){
		alert("Please Select a Field");
		document.report.datecategory.style = "border:2px solid red";
		document.getElementById("datecategory").focus();
		temp = 1;
	}
	else if(x == ""){
		x = "1951-01-01";
		//alert(x);
	}
	else if(y == ""){
		var today = new Date().toISOString().slice(0, 10);
		y = today;
		//alert(y);
	}
	if(temp != 1)
	{
		if(from=="")
		{
			from=x;
			from1 = x;
		}
		else
		{
			from= ","+x;
			from1 = x;
		}

		if(to=="")
		{
			to=y;
			to1 = y;
		}
		else
		{
			to= ","+y;
			to1 = y;
		}

		if(field=="")
			field=z;
		else
			field= ","+z;

		if(comb=="")
			comb=from+","+to+","+field;
		else
			comb+=from+to+field;
	}

	var dz= document.getElementById("datecategory");
	var t1 = document.getElementsByClassName("datele")[dz.selectedIndex-1].label;
	field = t1;
	var both2 = "";
	document.getElementById("datecat").innerHTML = "<div class='cat'><b>From : "+from1+" - To : "+to1+", "+field+"</b></div>";
	if(comb != "")
	document.cookie ="comb ="+ comb;


}
