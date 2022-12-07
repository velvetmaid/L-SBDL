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
console.log(objBuah);
console.log(objBuah.nama);
console.log(objBuah.harga);

objBuah.harga = 50000;
console.log(objBuah.harga);

objBuah.hargaNaik();
console.log(objBuah.harga);
objBuah.ubahHarga(15000);
console.log(objBuah.harga);




//console.log(objBuah);
//objBuah['harga']=40000;

//console.log(objBuah['nama']);
//console.log(objBuah['harga']);
//
//price='harga';
//console.log(objBuah['nama']);
//console.log(objBuah[price]);

