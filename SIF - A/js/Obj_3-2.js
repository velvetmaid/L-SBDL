var arrBuah = [
    {
        "nama": "Jeruk Medan", 
        "harga": 25000 
    },
    {
        "nama": "Jeruk SunKist",
        "harga": 20000
    },
    {
        "nama": "Jeruk Santang",
        "harga": 25000
    }
];
console.log(arrBuah);
arrBuah.forEach(item => {
    console.log(item.nama);
    console.log(item.harga);
});
