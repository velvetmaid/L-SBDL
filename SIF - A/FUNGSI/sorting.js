//variabel data kita definisikan secara global
//var dataP;
 var dataP = [];
    //ini adalah data Provinsi di Indonesia yang akan digunakan
    fetch('Provinsi.json')
    .then(response => {
	return response.json();
	})
	.then(data => {
		dataP = data.Provinsi;
		sorting('Kode_Provinsi','asc');
	});
function loadData()
{
	
		sorting('Kode_Provinsi','asc');
	
    //saat pertama kali diload maka akan dipanggil fungsi sorting yang didalamnya sudah terdapat script untuk menuliskan tabel yang akan dihasilkan
    
}
 
/*variabel sortBy merupakan sebuah fungsi dengan parameter masukan adalah nama field yang akan diload dan type sorting (asc atau desc)
fungsi ini dimanipulasi dari fungsi yang tertulis pada ebook berjudul JavaScript: The Good Parts  by Douglas Crockford */
var sortBy = function (name,sortType) 
{
    return function (o, p) 
    {
        var a, b;
        if (typeof o === 'object' && typeof p === 'object' && o && p) 
        {
            a = o[name];
            b = p[name];
            if (a === b) 
            {
                return 0;
            }
            if(sortType=='asc')
            {
                if (typeof a === typeof b) 
                {
                    return a < b ? -1 : 1;
                }
                return typeof a < typeof b ? -1 : 1;
            }
            else if(sortType=='desc')
            {
                if (typeof a === typeof b) 
                {
                    return a > b ? -1 : 1;
                }
                return typeof a > typeof b ? -1 : 1;
            }
        } 
    };
};
 
/*ini adalah fungsi yang akan dipanggil saat mengklik judul kolom pada tabel
pada fungsi ini akan dipanggil fungsi sort yang merupakan fungsi bawaan dari javascript dengan parameter masukan adalah sortBy(selectedFieldName,sortType)
fungsi dibawah inilah yang akan menuliskan tabel yang akan dihasilkan*/
function sorting(selectedFieldName,sortType)
{
    //data hasil sorting akan dimasukkan kedalam variabel buffer
    var buffer = dataP.sort(sortBy(selectedFieldName,sortType));
 
    //nah yang ini iseng doang nih
    //-------------------------------------------------------
    var nextsortType;
    var labelnextsortType;
    if(sortType=='asc')
    {
        labelnextsortType = 'v';
        nextsortType = 'desc';
    }
    else if(sortType=='desc')
    {
        labelnextsortType = '^';
        nextsortType = 'asc';
    }
    //-------------------------------------------------------
     
    //mulai memasukkan string dari tabel yang akan dihasilkan kedalam sebuah variable strTable
    var strTable='<table border="1" align="center" id="myData"><tr>';
     
    var field_name;
    //mengambil judul dari kolom
    //--------------------------------------------------------------------------
    for (field_name in buffer[0]) 
    {
        if (typeof buffer[0][field_name] !== 'function') 
        {
            if (field_name==selectedFieldName)
            {
            strTable+='<th>' + '<a href="#" ';
            strTable+='onClick="sorting(';
            strTable+="'" + field_name + "'";
            strTable+=",'" + nextsortType + "'";
            strTable+=');">' + field_name + '</a>&nbsp;' + labelnextsortType + '</th>';
            }
            else
            {
            strTable+='<th>' + '<a href="#" ';
            strTable+='onClick="sorting(';
            strTable+="'" + field_name + "','asc'";
            strTable+=');">' + field_name + '</a></th>';
            }
        }
    }
    strTable+='</tr>';
    //--------------------------------------------------------------------------
     
    //mengambil nilai dari setiap kolom
    //--------------------------------------------------------------------------
    for(var i=0; i<buffer.length; i++)
    {
        strTable+='<tr>';
        for (field_name in buffer[i]) 
        {
            if (typeof buffer[i][field_name] !== 'function') 
            {
                strTable+='<td>' + buffer[i][field_name] + '</td>';
            }
        }
        strTable+='</tr>';
    }
    //--------------------------------------------------------------------------
    strTable+='</tr></table>';
    //string dari tabel yang akan dihasilkan berakhir disini
     
    //mengambil tempat penulisan tabel pada halaman atau dokumen html kemudian memasukkan nilai strTable
    document.getElementById("TableOfProvince").innerHTML=strTable;
}