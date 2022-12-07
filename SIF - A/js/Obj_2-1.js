var objBuah = { 
    "jr1" : {
        "nama": "Jeruk Medan", 
        "harga": 25000 
    },
    "jr2" : {
        "nama": "Jeruk SunKist",
        "harga": 20000
    },
    "jr3" : {
        "nama": "Jeruk Santang",
        "harga": 25000
    }
};
console.log("-----------------");
//Mengakses dengan []  dan menggunakan looping for(… in …) 
for(let item in objBuah) {
    console.log(item); 
    console.log(objBuah[item].nama);
    console.log(objBuah[item].harga); 
};
