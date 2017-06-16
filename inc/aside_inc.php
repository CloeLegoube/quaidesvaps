
<?php
	$promo = execute_requete("SELECT DISTINCT * 
					FROM produit
					WHERE stock > 0
					AND prix_promo != 0
					ORDER BY  RAND() LIMIT 0,1
					");
?>


<!-- **************************************************************************************** -->	
<!--  									PREMIERE COLONNE - ASIDE							  -->	
<!-- **************************************************************************************** -->	
			
			<aside <?php if ($nav_en_cours == 'page_magasin' || $nav_en_cours == 'page_boutique' || $nav_en_cours == 'page_fiche_produit') {echo ' class="inactif"';} ?>> 

				<div class="aside_block">
	
<!-- ******* BOITE 1 : PROMOTIONS ******* -->
					<div class="block">
						<a href="<?php echo RACINE_SITE ?>promotions.php"><div class="titre_h2 largeur"><h2>PROMOTIONS</h2></div></a>
						<div class="aside_boite first">
<?php						
						while($aside = $promo->fetch_assoc()){
							
							$x = 100 - (100* $aside['prix_promo'] / $aside['prix']);
							$pourcentage = round($x)
							
?>
								<a href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $aside['id_produit'] ?>">
								<h6>Profitez de <span><?php echo $pourcentage ?>%</span> de remise sur<br />- <?php echo $aside['titre'] ?> -</h6>
								<div class="promotion_image"><img  src="<?php echo RACINE_SITE ?><?php echo $aside['photo'] ?>" alt="<?php echo $aside['titre'] ?>" /></div>
								</a>
								
<?php
						};
?>
						</div>
					</div>
					
<!-- ******* BOITE 2 : NEWS ******* -->
					<div class="block">
						<a href="<?php echo RACINE_SITE ?>club-du-vapoteur.php"><div class="titre_h2 largeur"><h2>NEWS</h2></div></a>
						<div class="aside_boite">
								<h6>Le Quai des Vaps fait partie du Club des vapoteurs</h6>
								<p><img src="<?php echo RACINE_SITE ?>image/rejoindre_club.png" alt="photo e-liquide" />
								
	<?php							
				if(utilisateur_est_connecte())
				{
					
						$selection_membre = execute_requete ("SELECT * FROM membre WHERE id_membre ='".$_SESSION['utilisateur']['id_membre']."'");
						$membre = $selection_membre -> fetch_assoc ();

	?>
						<a onclick="return mafonction3()" class="aside_lien" href="#">REJOIGNEZ LE CLUB</a></p>
						<script> 
						function mafonction3(){ 
							var pseudo = '<?php echo $membre['pseudo']; ?>' ; 
							if (window.confirm(pseudo +', Merci d\'avoir rejoint le club. Cliquer pour confirmer')) 
							{
								location.href = './newsletter.php?club=oui';return true;
							} ;
						};
						</script> 	
	<?php
				} else {		
								
	?>					<a onclick="return mafonction4()" class="aside_lien" href="#">REJOIGNEZ LE CLUB</a></p>
						<script> 
						function mafonction4(){ 
							if (window.confirm('Pour rejoindre le club, veuillez vous connecter. Possédez-vous déjà un compte ?')) 
							{
								location.href = './connexion.php';return true;
							} else {location.href = './inscription.php';return false;}
						};
						</script> 	

	<?php
				};		
								
	?>							
			
								<p><img src="<?php echo RACINE_SITE ?>image/icone_plus_big.png" alt="photo e-liquide" />
								<a class="aside_lien" href="<?php echo RACINE_SITE ?>club-du-vapoteur.php">DECOUVREZ LE CLUB</a></p>
						</div>
					</div>
					
<!-- ******* BOITE 3 : CARTE DE FIDELITE ******* -->
					<div class="block">
						<a href="<?php echo RACINE_SITE ?>carte-de-fidelite.php"><div class="titre_h2 largeur"><h2>CARTE DE FIDELITE</h2></div></a>
						<div class="aside_boite">
								<h6>Profitez de nombreux avantages et réduction avec votre carte de fidélité Quai des Vaps</h6>
								<p class="demander_carte"><img src="<?php echo RACINE_SITE ?>image/carte_fidelite.png" alt="photo e-liquide" />
								<a class="aside_lien" href="<?php echo RACINE_SITE ?>carte-de-fidelite.php">DEMANDEZ VOTRE CARTE GATUITE</a></p>
						</div>					
					</div>	

				
<!-- ******* BOITE FACEBOOK ******* -->
					<div class="block">
						<a onclick="window.open(this.href); return false;" href="https://www.facebook.com/quaidesvaps"><div class="titre_h2 largeur"><h2>FACEBOOK</h2></div></a>
							<div class="fb-page" data-href="https://www.facebook.com/quaidesvaps" data-width="280" data-height="206" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/quaidesvaps"><a href="https://www.facebook.com/quaidesvaps">QUAI DES VAPS - Cigarettes Electroniques</a></blockquote></div></div>

					</div>					
				
				</div>
				</aside><!-- Fin 1ere colonne -->
				<div class="clearleft"></div>