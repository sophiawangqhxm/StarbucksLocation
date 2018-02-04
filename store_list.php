<?php include '../dataset/database.php';?>
<?php
  $query = "SELECT name, street,city, lat, lng, ( 3959 * acos( cos( radians('40') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) + sin( radians('-73') ) * sin( radians( lat ) ) ) ) AS distance FROM markers  ORDER BY distance";

  ?>

  <main>
  	<ol>
  		<li> Stores </li>
  		<?php foreach ($db->query($query) as $stores); ?>
  		<li><?php echo $stores['name']; ?></li>
  	</ol>
  </main>
  		


  		
  		
