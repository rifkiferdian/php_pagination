<?php 

require "db.php";
require "pagination.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pagination Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Data Table</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Campus</th>
        <th>Prodi</th>
        <th>Akreditasi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		$pagination = new Paging_get_all;						
		$batas  	= 7;
		$posisi 	= $pagination->cariPosisi($batas);

	  	$query = mysql_query("SELECT * FROM universitas ORDER BY id DESC LIMIT $posisi, $batas ");
		while($data = mysql_fetch_array($query)) { 
	?>
      <tr>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['prodi']; ?></td>
        <td><?php echo $data['akreditasi']; ?></td>
      </tr>
    <?php } ?>

    </tbody>
  </table>

  <!-- pagination -->

  <?php 
		$jmldata     = mysql_num_rows(mysql_query("SELECT * FROM universitas"));
		if($jmldata > 7){
	?>
		<ul class="pagination" style="float:right;">
			<?php 
				$jmlhalaman  = $pagination->jumlahHalaman($jmldata, $batas);
				$linkHalaman = $pagination->navHalaman($_GET['halaman'], $jmlhalaman);
				echo "$linkHalaman ";
			?> 
		</ul>
	<?php 
		}
	?>
	<!-- end pagination -->
</div>

</body>
</html>
