<?php  
	$produksi = file_get_contents("produksi.json");
 	$data = json_decode($produksi, true);

echo count($data);

?>
<style>
.tombol{
	color:#CCC;
}
</style>

<hr>
<h1 align='center'>Data Barang Dagang </h1>
 <button class="sembunyi tombol " onClick="sembunyi">Hide</button>
<button id="show">Show</button>
 <table border="1" id="data"  class="display responsive nowrap">
  <tr>
   <th>No</th>
   <th>Tahun</th>
   <th>Jenis</th>
   <th>Hasil</th>
   </tr>
<?php
	 $no = 0;
	 
	 for($i=0;$i < count($data);$i++){ ?>
	 <tr>
	 	<td><?=$no?></td>
	 	<td><?=$data[$i]['tahun']?></td>
	 	<td><?=$data[$i]['jenis']?></td>
	 	<td><?=$data[$i]['hasil']?></td>
	 </tr>
	 
	 <?php
		 $no++;
		}
?>
</table>

<script>
$(document).ready(function(){
  $(".sembunyi").click(function(){
    $("td").hide();
  });
  $("#show").click(function(){
    $("td").show();
  });
});
</script>