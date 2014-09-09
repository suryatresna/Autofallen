// JavaScript Document


var payment = ({
	
		
	getLongDate: function(from,to){
		var date1 = new Date(from).getDate();
		var date2 = new Date(to).getDate();
		var month1 = new Date(from).getMonth();
		var month2 =  new Date(to).getMonth();
		var year1 = new Date(from).getYear();
		var year2 = new Date(to).getYear();
		var longDays = (date1- date2) + ((month1 - month2)*30) + ((year1 - year2)*360); 
		
		return longDays;		
	},
	
	getDenda: function(longDays, val){
			var c;
			c = (longDays * val);
			return c;
	},
	
	formatCurrency: function(num) {
    num = isNaN(num) || num === '' || num === null ? 0.00 : num;
    return parseFloat(num).toFixed(2);
	},
	
	moneyConvert: function(value){
		var buf = "";
		var sBuf = "";
		var j = 0;
		value = String(value);
 
		if (value.indexOf(".") > 0) {
		buf = value.substring(0, value.indexOf("."));
		} else {
		buf = value;
		}
		if (buf.length%3!=0&&(buf.length/3-1) > 0) {
		sBuf = buf.substring(0, buf.length%3) + ",";
		buf = buf.substring(buf.length%3);
		}
		j = buf.length;
		for (var i = 0; i <(j/3-1); i++) {
		sBuf = sBuf+buf.substring(0, 3) + ",";
		buf = buf.substring(3);
		}
		sBuf = sBuf+buf;
		if (value.indexOf(".") > 0) {
		value = sBuf + value.substring(value.indexOf("."));}
		else {
		value = sBuf;
		}
		return value;
	},
	convertToRupiah: function(angka)
	{
		var rupiah = '';
		var angkarev = angka.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		return rupiah.split('',rupiah.length-1).reverse().join('');
	},
/**
* Usage example:
* alert(convertToRupiah(10000000)); -> "Rp. 10.000.000"
*/
 
convertToAngka: function (rupiah)
{
return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
},
	
	
	
});
