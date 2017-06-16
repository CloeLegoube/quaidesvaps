<?php
	include("inc/init_inc.php");
	
	
	
	
	
	$nav_en_cours = 'page_magasin'; 
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");

//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Carte de fidélité'
   ));
	
?>
					
			
<!-- **************** SLIDER INDEX ************************* -->	
			
					
			
<!-- **************** MESSAGE ************************* -->	
			
					
					<!--	<div id="msg">
						<p class="vert">Vous avez bien rentré toutes les informations</p>
						</div>
							-->	
			
			
<!-- **************************************************************************************** -->	
<!--  									PREMIERE COLONNE - ASIDE							  -->	
<!-- **************************************************************************************** -->	
			
<?php
	include("inc/aside_inc.php");
?>

				
<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div id="carte" class="colonne2"> <!-- début colonne 2-->	
					<div class="carte_titre">
						<h2><i class="fa fa-life-ring fa-lw fa-spin"></i> Votre Carte de Fidélité <i class="fa fa-life-ring fa-lw fa-spin"></i></h2>
						<p>La carte qui vous fait gagner de l'argent !</p>
					
					</div>
					
					
					<div class="slider_zone">
							<img src="<?php echo RACINE_SITE ?>image/carte-de-fidelite.png" alt="Carte de fidelite" />
					</div>


					<div>
						<h3><i class="fa fa-thumbs-up"></i> Découvrez tous les avantages</h3>
						<p>Pour chaque achat, vous cumulez des points. A chaque commande, vous augmentez votre capital point qui vous permettra ensuite de bénéficier de réductions très intéressantes !</p>
						
						
						
						<table border="1">
						<caption style="caption-side:top">Réductions associées</caption>
						<tr>
						<th>Nombre de points</th><th>Avantages</th>
						</tr><tr>
						<td><span>50</span> points</td><td>réduction de <span>5%</span> sur votre prochaine commande</td>
						</tr><tr>
						<td><span>70</span> points</td><td>réduction de <span>8%</span> sur votre prochaine commande</td>
						</tr><tr>
						<td><span>100</span> points</td><td>réduction de <span>10%</span> sur votre prochaine commande</td>
						</tr><tr>
						<td><span>150</span> points</td><td>réduction de <span>15%</span> sur votre prochaine commande</td>
						</tr></table>

						<h3><i class="fa fa-thumbs-up"></i> Pourquoi avoir une carte?</h3>
						<p>Si vous avez décidé de passer de la cigarette classique à la cigarette électronique, vous avez fait le bon choix! Bien que la cigarette électronique soit très avantageuse d'un point de vue financier (vous économisez environ 50€ par mois si vous aviez l'habitude de fumer 3 paquets par semaine), il faut pourtant renouveller son stock de e-liquide ou d'atomisateur et pourquoi pas acheter une housse ou des accessoires facilitant votre quotidien ! La carte de fidélité est faite pour vous !</p>

						<h3><i class="fa fa-thumbs-up"></i> Plus vous achetez, plus vous économisez !</h3>
						<p>C'est simple, chaque achat est récompensé par des points de fidélité. A vous de les réutiliser lors de votre prochaine achat ou de les cumuler pour obtenir une réduction plus importante!</p>
					</div>
					
					<div class="logo_carte">
					<p class="demander_carte"><img src="<?php echo RACINE_SITE ?>image/carte_fidelite.png" alt="photo e-liquide" />
								
					
								
	<?php							
				if(utilisateur_est_connecte())
				{
					
						$selection_membre = execute_requete ("SELECT * FROM membre WHERE id_membre ='".$_SESSION['utilisateur']['id_membre']."'");
						$membre = $selection_membre -> fetch_assoc ();

	?>
						<a onclick="return mafonction3()" class="aside_lien" href="#">Demandez votre carte gratuite</a></p>
						<script> 
						function mafonction3(){ 
							var pseudo = '<?php echo $membre['pseudo']; ?>' ; 
							if (window.confirm(pseudo +', Quai des vaps vous remercie pour votre fidélité. Cliquer pour confirmer votre demande')) 
							{
								location.href = './newsletter.php?fidelite=oui';return true;
							} ;
						};
						</script> 	
	<?php
				} else {		
								
	?>					
						<a onclick="return mafonction4()" class="aside_lien" href="#">Demandez votre carte gratuite</a></p>
						<script> 
						function mafonction4(){ 
							if (window.confirm('Pour rejoindre obtenir votre carte, veuillez d\'abord vous connecter. Possédez-vous déjà un compte ?')) 
							{
								location.href = './connexion.php';return true;
							} else {location.href = './inscription.php';return false;}
						};
						</script> 	

	<?php
				};		
								
	?>							
					
					</div>
					
					
					 
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
