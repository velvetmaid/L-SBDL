var arrBuah = [];
//mengakses file json dengan fetch()
fetch("js/obj_5_externalJSON.json")
.then(response => {
   return response.json();
})
.then(data => {
    arrBuah = data.Buah;
    dataSiap();
});
function dataSiap () {
    document.write("<h2>Data Buah: </h2>");
	for(var i = 0; i < arrBuah.length; i++) {
		document.write(arrBuah[i].nama,' : ', arrBuah[i].harga);
		document.write('<br>')
	}
}