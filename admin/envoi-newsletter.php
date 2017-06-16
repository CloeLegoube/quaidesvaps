<?php
	include("../inc/init_inc.php");
	
	
//**********************************************************************************************************	
//                         				CONTROLE DE L'ACCES A LA PAGE ADMIN
//**********************************************************************************************************

	if(!utilisateur_est_connecte_et_admin()) // Nous voulons limiter l'accès à cette page aux seuls membres admin. Est-ce que l'internaute n'est pas connecté et n'est pas admin?
	{
		header("location:../connexion.php"); // Redirection vers la page connexion
		die (); 
		
		// TRES IMPORTANT -> pour éviter d'executer le code en dessous, on fait un DIE (comme break), le code s'arrête ici. 
	}

	
	
	
//**********************************************************************************************************	
//                         		  ENVOI D'UNE NEWSLETTER
//**********************************************************************************************************	


	$resultat = execute_requete("SELECT * 
	FROM newsletter n, membre m
	WHERE n.id_membre = m.id_membre"); // requete 
		
	$nb_abonnes = $resultat->num_rows;
	$msg .= '<div id="msg">
						<p class="vert">Nombre d\'abonné(s) à la newsletter : '.$nb_abonnes.' </p>
			</div>'; 
			
			
			
	if(isset($_POST['newsletter'])) // S'il y a clic sur bouton newsletter
	{


		$compteur=1; // variable pour compter les mails 
		while ($abonnes = $resultat->fetch_assoc()) {  
		
		//debug($abonnes);
		
		$mail = $abonnes['email']; // Déclaration de l'adresse de destination.'cloe.legoube@gmail.com' pour TEST
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = "Bonjour ".$abonnes['prenom'].", ".$_POST['message'];
			$message_html = '<html>
							<head>
							<title>Newsletter du Quai des Vaps</title>
							</head>
							<body bgcolor="black">
							
							<font face="verdana"><font color="white"><font size="5"><p align="center"><font color="red"><u>Bonjour '.$abonnes['prenom'].',</u></p></font></font>
							<font size="3">' . $_POST['message'] . '<br />
							<img src="http://etapes-de-vie.fr/lokisalle/image/salle4.jpg" >
							<p align="left">Visitez notre site quaidesvaps.fr, pour voir nos promotions sur vos produits préférés</p>
							</body>
							</html>'; //On termine le message.
			//==========
			 
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = $_POST['sujet'];
			//=========
			
			$expediteur = "<".$_POST['expediteur'].">";
			
			//=====Création du header de l'e-mail.
			$header = "From: \"Quai des vaps\"<$expediteur>".$passage_ligne;
			$header .= "Reply-to: \"Quai des vaps\" <$expediteur>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			//==========
			 
			//=====Création du message.
			$message = $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format texte.
			$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_txt.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary.$passage_ligne;
			//=====Ajout du message au format HTML
			$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
			$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
			$message.= $passage_ligne.$message_html.$passage_ligne;
			//==========
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
			//==========
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$message,$header);
			//==========

			$msg .= '<div id="msg">
						<p class="vert">N° '.$compteur.' - '.$mail.' : envoyé avec succés!</p>
					</div>'; 
			$compteur++; // ajoute 1 à la variale du compteur 
				
		}  // fin du while 
		
	};
	
	
	
	
	
	include("../inc/haut_de_site_inc.php");
	include("../inc/top_menu_inc.php");
	include("../inc/menu_inc.php");
	//**************** FIL D'ARIANE ************************* -->	

	
	get_fil_ariane(array(
	'gestion_produit.php' => 'Administration du site', 
	'final' => 'Envoi d\une newsletter'
   ));	
			

					
			
//**************** MESSAGE ************************* -->	
			
					echo $msg;	
						
						
//**************** MENU ADMIN ************************* -->		
						

	include("../inc/menu_admin_inc.php");
	
		
//**********************************************************************************************************	
//                         		PLUGIN TINYMCE POUR MISE EN FORME TEXTAREA
//**********************************************************************************************************	
?>
			<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
			<script>tinymce.init({selector:'textarea'});</script>





						
<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div id="colonne-unique" class="colonne2"> <!-- début colonne 2-->	
				
					<div class="titre_h2 largeur_article"><h2>INTERFACE ADMINISTRATEUR</h2></div>
					
					<h3 style="text-align:center">ENVOI DE LA NEWSLETTER AUX ABONNES</h3>
					
					 <form id="envoi-newsletter" class="formulaire" method="post" action=""> 
						
						<label for="expediteur">Qui est l'expéditeur de cette newsletter ?</label><br />
						<input type="text" id="expediteur" name="expediteur"   maxlength="14" placeholder="expediteur" value="<?php echo $_SESSION['utilisateur']['email'] ?>"/><br /> 
					 
                        <label for="sujet">Sujet</label><br />
						<input type="text" id="sujet" name="sujet"   maxlength="14" placeholder="sujet" value="<?php if(isset($_POST['newsletter'])) {echo $_POST['sujet'];}?>"/><br /> 
						
						<label for="message">Votre message</label><br />
						<textarea id="message" name="message" placeholder="message"><?php if(isset($_POST['newsletter'])) {echo $_POST['message'];}?></textarea>
						<br />
						 <input type="submit" name="newsletter" value="ENVOYEZ LA NEWSLETTER"/>  
                    </form>

				<div class="right diminue-hauteur">
					<img src="<?php echo RACINE_SITE ?>image/newsletter.jpg" alt="newsletter"/>
				</div>
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			
				
			</div><!-- Fin de principale............................ -->	
		
<?php
	include("../inc/footer_inc.php");
?>
