var objBuah = { 
    "nama" : "Jeruk", 
    "harga": 25000,
	hargaNaik(){
		this.harga = this.harga+5000;
		console.log(this);
	},
	hargaTurun(){
		this.harga = this.harga-5000;
		console.log(this);
	},
	ubahHarga(parHarga){
		this.harga=parHarga;	
	}
};
//document.writeln(objBuah);
console.lo(objBuah.nama);
console.lo(objBuah.harga);

objBuah.hargaNaik();
document.writeln(objBuah.nama);
document.writeln(objBuah.harga);

objBuah.ubahHarga(15000);

objBuah.hargaTurun();
document.writeln(objBuah.nama);
document.writeln(objBuah.harga);


