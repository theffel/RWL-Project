// Declare global varitables for sample page
var sampleWeight = 0;
var total = 0.0;

function addOption(selectbox,text,value) {
	var optn = document.createElement("OPTION");
	optn.text = text;
	optn.value = value;
	selectbox.options.add(optn);
}

function getTime(name) {
	var currentTime = new Date();
	var month = currentTime.getMonth() + 1;
	if (month < 10) {
		month = "0" + month;
	}
	var day = currentTime.getDate();
  	if (day < 10) {
		day = "0" + day;
  	}
	var year = currentTime.getFullYear();
	var hours = currentTime.getHours();
	if (hours < 10) {
		hours = "0" + hours;
	}
	var minutes = currentTime.getMinutes();
	if (minutes < 10) {
		minutes = "0" + minutes;
	}
	var seconds = currentTime.getSeconds();
	if (seconds < 10) {
		seconds = "0" + seconds;
	}
	document.getElementById(name).value = year + "-" + month + "-" + day + " " + hours + ":" + minutes + ":" + seconds;
}

// function sets the sampleWeight
function setSampleWeight(passedValue) {
	sampleWeight = passedValue;
}

function calculatePercent(passedValue, passedName) {
	total +=  parseFloat(passedValue);
	var splitString = passedName.split(/(?=[A-Z])/);
	var name = splitString[0].concat("Percent");
	document.getElementById(name).value = ((passedValue / sampleWeight * 100).toFixed(2));
	document.getElementById('totalPercent').value = ((total / sampleWeight * 100).toFixed(2));
}

function warehouseFunction(str) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var jsWarehouses = JSON.parse(xmlhttp.responseText);
			document.getElementById("warehouse").options.length=0;
			addOption(document.pickForm.warehouse);
			//document.getElementById("0").disabled=true;
			for (var x = 0; x < jsWarehouses.length; x++) {
	   			addOption(document.pickForm.warehouse, jsWarehouses[x][1], jsWarehouses[x][0]);
			}
		}
  	}
  	var temp = xmlhttp.open("GET","warehouses_script.php?q="+str,true);
  	xmlhttp.send();
}

function binFunction(str) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var jsBins = JSON.parse(xmlhttp.responseText);
			document.getElementById("bin").options.length=0;
			addOption(document.pickForm.bin);
			for (var x = 0; x < jsBins.length; x++) {
	   			addOption(document.pickForm.bin, jsBins[x][1], jsBins[x][0]);
			}
		}
  	}
  	var temp = xmlhttp.open("GET","bins_script.php?q="+str,true);
  	xmlhttp.send();
}

function fieldFunction(str) {
  	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
  	} else { // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			var jsFields = JSON.parse(xmlhttp.responseText);
			document.getElementById("field").options.length=0;
			for (var x = 0; x < jsFields.length; x++) {
	   				addOption(document.pickForm.field, jsFields[x][1], jsFields[x][0]);
			}
		}
  	}
  	var temp = xmlhttp.open("GET","fields_script.php?q="+str,true);
  	xmlhttp.send();
}