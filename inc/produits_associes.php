

<!-- **************************************************************************************** -->	
<!--  									PRODUITS ASSOCIES									  -->	
<!-- **************************************************************************************** -->	
<h4>Découvrez les produits associés</h4>

<?php			
			while($produit_assoc = $comptage->fetch_assoc()){
?>					 
	

					
					<div class="produit">
						<div class="contenu_produit">
						
<?php			
			if(!empty($produit_assoc['prix_promo'])) {
				echo '<div class="discount">PROMO</div>';
			}
?>	
		
						
						<div class="contenu_produit_image">
							<a class="image_contenu_produit" href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $produit_assoc['id_produit'] ?>">
							<img style="max-width: 193px; max-height: 146px;" src="<?php echo RACINE_SITE ?><?php echo $produit_assoc['photo'] ?>" alt="<?php echo $produit_assoc['titre'] ?>" /></a>
						</div>
							
						<h3><?php  echo substr($produit_assoc['titre'],0, 20) ?></h3>
							
							
<?php			
			if(!empty($produit_assoc['prix_promo'])) {
				echo '<p class="prix clignotant">'.$produit_assoc['prix_promo'].'€  ';
				echo '<span class="prix prix_barre">'.$produit_assoc['prix'].'€</span></p>';
			}else {
				
				echo '<p class="prix">'.$produit_assoc['prix'].'€</p>';
			}
?>	
		
									
							
							<div class="etoiles">
										<?php 
										$resultat = execute_requete("SELECT avg(note) AS moyenne
										FROM avis a
										WHERE a.id_produit= ".$produit_assoc['id_produit']."
										GROUP BY a.id_avis");
										
										$note = $resultat->fetch_assoc();
										//debug($note);
										?>
							
										<?php 
										for ($i = 1; $i <= $note['moyenne'] ; $i++)
										 {
											echo '<img src="'.RACINE_SITE.'/image/etoile_noire.png" alt="etoile" />';
										 };
										 
										for ($i = 1; $i <= (5-$note['moyenne']) ; $i++)
										 {
											echo '<img src="'.RACINE_SITE.'/image/etoile_grise.png" alt="etoile" />';
										 };
										
										?>
							</div>
						</div>
						
						<div class="liens_produit">
							<div>
							<img src="image/icone_plus.gif" alt="Icone PLUS" />
							<p><a href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $produit_assoc['id_produit'] ?>">En savoir plus</a></p>
							</div>
							
							
								<?php
//**********************************************************************************************************	
//                         			FORMULAIRE 'ajout_panier' QUANTITE SI STOCK
//**********************************************************************************************************	
	
							
if($produit_assoc['stock'] >0) // Affiche le formulaire de selection de quantité s'il y a du stock
	{
		//---- DEBUT FORMULAIRE -----------------------------------------------------------------------------
		
		echo "<form id='quantite' action='' method='post'>";
			echo "<input type='hidden' name='id_produit' readonly value='$produit_assoc[id_produit]'/>";
			echo "<input type='hidden' name='quantite' readonly value='1'/>";
			echo "<input class='presentation_produit_associe' type='submit' name='ajout_panier_associe' value='Ajout au panier'/>";
		echo "</form>";
		
		//---- FIN FORMULAIRE -----------------------------------------------------------------------------

		}
	else
	{
		echo "<p>Rupture de stock</p>"; // S'il n'y a pas de stock (stock = 0)
	}

?>	
						</div>
					
					</div>	

<?php			
			}
?>					