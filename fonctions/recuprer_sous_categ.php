<?php

// on appele a ce fichie par le footer 
//on utilise une requet jquery dans le footre
include 'BDD.php';
if($_POST['id'])
	{	$pdo=pdo();
		$id = $_POST['id'];
		$stmt = $pdo->prepare("SELECT * FROM table_souscat WHERE id_cat=?");
		$stmt->execute(array($id));
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		?><option value="">selectionnee une sous categorie</option><?php						
		foreach ($result as $row) {
			?>
			<option value="<?php echo $row['id_souscat']; ?>"><?php echo $row['nom_souscat']; ?></option>
			<?php
		}
	}