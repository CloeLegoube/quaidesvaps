<?php
include("inc/init_inc.php");	


			if(isset($_GET['valeur'])) {
				
				if(!utilisateur_est_connecte())
				{
					$x = $_GET['valeur']; 

					execute_requete("INSERT INTO newsletter VALUES ('', '10000', '".$x."')");	
					header("location:".$_SERVER['HTTP_REFERER']); 	

				}else{
					$id_membre = $_SESSION['utilisateur']['id_membre'];
					$resultat = execute_requete("SELECT * 
					FROM newsletter n
					WHERE n.id_membre = $id_membre");
					$newsletter = $resultat -> fetch_assoc ();
					$x = $_GET['valeur']; 
					execute_requete("REPLACE INTO newsletter VALUES ('".$newsletter['id_newsletter']."', '".$_SESSION['utilisateur']['id_membre']."', '".$x."') ");	
					header("location:".$_SERVER['HTTP_REFERER']); 	
				};
			};
			
			
			if(isset($_GET['club']) && $_GET['club'] == 'oui' ) {
				

					$id_membre = $_SESSION['utilisateur']['id_membre'];
					execute_requete("UPDATE membre SET club = 'oui' WHERE id_membre = $id_membre");	
					header("location:".$_SERVER['HTTP_REFERER']); 	
				
			};
			
			
			if(isset($_GET['fidelite']) && $_GET['fidelite'] == 'oui' ) {
				

					$id_membre = $_SESSION['utilisateur']['id_membre'];
					execute_requete("UPDATE membre SET fidelite = 'oui' WHERE id_membre = $id_membre");	
					header("location:".$_SERVER['HTTP_REFERER']); 	
				
			};
?>