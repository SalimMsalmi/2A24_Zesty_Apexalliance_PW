<?php
	include '../Controller/ServiceC.php';
	$serviceC=new serviceC();
	$listeservices=$serviceC->afficherservice(); 
?>
<html>
	<head></head>
	<body>
	    <!-- <button><a href="ajouterAdherent.php">Ajouter un Adherent</a></button> -->
		<center><h1>Liste des services</h1></center>
		<table border="1">
              <tr>
             
              <th>Service Picture</th>
              <th>service id</th>
              <th>service name</th>
              <th>service price</th>
              </tr>
              <?php
				foreach($listeservices as $service){
			?>
               <tr>
              <td><?php echo $service['idservice']; ?></td>
              <td><img src="mariem.jpg" /></td>
              <td><?php echo $service['nameservice']; ?></td>
              <td><?php echo $service['priceservice']; ?></td>
              <td>
              <form method="POST" action="">
						<input type="submit" name="edit" value="edit">
						<input type="hidden" value=<?PHP echo $service['idservice']; ?> name="idservice">
					</form>
				</td>
				<td>
					<a href="suppserv.php?idservice=<?php echo $service['idservice']; ?>">Supprimer</a>
				</td>
              </tr>
              <?php
				}
			?>
              </table>
	</body>
</html>
