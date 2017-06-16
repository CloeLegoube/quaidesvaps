
<!-- **************************************************************************************** -->	
<!--  										HEADER	TOP										  -->	
<!-- **************************************************************************************** -->	
		


			<div id="header_bar_global"><!-- debut header_bar_global -->
				<div id="header_bar"><!-- debut header_bar -->

					<div id="header_panier">   <!-- début liens accueil et contact -->
						<img src="<?php echo RACINE_SITE ?>image/panier.png" alt="Icone caddie de grande surface" 
							onmouseover="this.src='<?php echo RACINE_SITE ?>image/panier.png'" 
							onmouseout="this.src='<?php echo RACINE_SITE ?>image/panier.png'"/>
						<p><a href="<?php echo RACINE_SITE ?>panier.php">Votre panier (
						<?php if(isset($_SESSION['panier'])){
							echo count($_SESSION['panier']['id_produit']);
							}else{
							echo "0";} 
						?>)</a></p>
					</div>              <!-- fin liens accueil et contact -->

					
					<div id="header_connexion"><!-- debut menu-top -->

						<img src="<?php echo RACINE_SITE ?>image/homme.png" alt="Icone ombre d'un buste d'homme" 
							onmouseover="this.src='<?php echo RACINE_SITE ?>image/homme.png'" 
							onmouseout="this.src='<?php echo RACINE_SITE ?>image/homme.png'"/>
							
<?php							
//**********************************************************************************************************	
//                         				UTILISATEUR NON CONNECTE
//**********************************************************************************************************	
	
	
	if(!utilisateur_est_connecte()) // Dans le cas du visiteur
	{
?>
						<p><a id="header_se_connecter" href="<?php echo RACINE_SITE ?>inscription.php">S'inscrire</a> &#124; 
						<a href="<?php echo RACINE_SITE ?>connexion.php">Se connecter</a> &#124; 


		
		
						<a onclick="newsletter()" id="header_inscrire_newsletter" href='#'>S'inscrire à la Newsletter</a></p>
					
		<script> 
			function newsletter(){ 
			var valeur_saisie=prompt("Veuillez saisir votre adresse mail pour recevoir la newsletter tous les mois","email@site.fr"); 
			location.href = './newsletter.php?valeur='+valeur_saisie;
			} 
		</script> 			


						
						
<?php 
	}														
//**********************************************************************************************************	
//                         				UTILISATEUR CONNECTE ET NON ADMIN
//**********************************************************************************************************	
	
	
	if(utilisateur_est_connecte()) // Dans le cas de l'utilisateur connecté (membre)
	{
							
						
							
//**********************************************************************************************
//                         				UTILISATEUR CONNECTE ET ADMIN
//**********************************************************************************************
					
					echo "<p>";
					if(utilisateur_est_connecte_et_admin()) // Dans le cas d'un administrateur connecte
					{
?>
								
						<a id="admin_site" href="<?php echo RACINE_SITE ?>admin/gestion_produit.php"><strong>Administration du site</strong></a>&#124; 
							
	
<?php
					}	
//**********************************************************************************************	

						$selection_membre = 
						execute_requete ("SELECT * 
						FROM membre m, newsletter n
						WHERE m.id_membre ='".$_SESSION['utilisateur']['id_membre']."'
						AND m.id_membre = n.id_membre");
						$membre = $selection_membre -> fetch_assoc ();
						//debug($membre);
						
	?>

						<a id="header_se_connecter" href="<?php echo RACINE_SITE ?>profil.php">Mon profil</a> &#124; 
						<a 	href='<?php echo RACINE_SITE ?>index.php?action=deconnexion'>Se déconnecter</a> &#124; 
	<?php					
						if(empty($membre['id_newsletter'])) {
	?>						
							<a onclick="newsletter2()" id="header_inscrire_newsletter" href='#'>S'inscrire à la Newsletter</a></p>
	<?php						
						}
	?>
						
						<script> 
						function newsletter2(){ 
							var email = '<?php echo $membre['email']; ?>' ; 
							if (window.confirm('Voulez-vous recevoir la newsletter à cette adresse :'+email +'?')) 
							{
								location.href = './newsletter.php?valeur='+email;
								return true;
							} 
						else 
							{
								var valeur_sasie=prompt("Saisir une autre adresse","Nouvelle adresse mail"); 
								location.href = './newsletter.php?valeur='+valeur_sasie;
								return false;
							};
						} 
						
						
						
						</script> 	

<?php
	}
?>	
	
					</div><!-- fin menu-top -->
				</div><!-- fin header_bar -->		
			</div><!-- fin header_bar_global -->		
				
			<header><!-- debut header -->		