<?php
	include("inc/init_inc.php");
	
	
	
	
	
	$nav_en_cours = 'page_magasin'; 
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");
	
//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Le club du vapoteur'
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
						
				
				<div id="club" class="colonne2"> <!-- début colonne 2-->	
					<div class="club_titre"><h2><i class="fa fa-dot-circle-o fa-lw fa-spin"></i><i class="fa fa-dot-circle-o fa-lw fa-spin"></i> Le Club du Vapoteur <i class="fa fa-dot-circle-o fa-lw fa-spin"></i><i class="fa fa-dot-circle-o fa-lw fa-spin"></i></h2></div>
					
					
					<div class="slider_zone">
							<img src="<?php echo RACINE_SITE ?>images/magasin/magasin1.jpg" alt="Magasin quai des vaps" />
					</div>


					<div>
						<h3><i class="fa fa-hand-o-right"></i> Partagez votre expérience</h3>
						<p>Ultima Syriarum est Palaestina per intervalla magna protenta, cultis abundans terris et nitidis et civitates habens quasdam egregias, nullam nulli cedentem sed sibi vicissim velut ad perpendiculum aemulas: Caesaream, quam ad honorem Octaviani principis exaedificavit Herodes, et Eleutheropolim et Neapolim itidemque Ascalonem Gazam aevo superiore exstructas.</p>

						<h3><i class="fa fa-hand-o-right"></i> Rencontrez d'autres vapoteurs</h3>
						<p>Quam ob rem cave Catoni anteponas ne istum quidem ipsum, quem Apollo, ut ais, sapientissimum iudicavit; huius enim facta, illius dicta laudantur. De me autem, ut iam cum utroque vestrum loquar, sic habetote.</p>

						<h3><i class="fa fa-hand-o-right"></i> Participez à nos soirées</h3>
						<p>Unde Rufinus ea tempestate praefectus praetorio ad discrimen trusus est ultimum. ire enim ipse compellebatur ad militem, quem exagitabat inopia simul et feritas, et alioqui coalito more in ordinarias dignitates asperum semper et saevum, ut satisfaceret atque monstraret, quam ob causam annonae convectio sit impedita.</p>
					</div>
					
					<div class="logo_club">
					
					<p><img src="<?php echo RACINE_SITE ?>image/rejoindre_club.png" alt="photo e-liquide" />
								
	<?php							
				if(utilisateur_est_connecte())
				{
					
						$selection_membre = execute_requete ("SELECT * FROM membre WHERE id_membre ='".$_SESSION['utilisateur']['id_membre']."'");
						$membre = $selection_membre -> fetch_assoc ();

	?>
						<a onclick="return mafonction3()" class="aside_lien" href="#">Rejoignez le Club !</a></p>
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
								
	?>					<a onclick="return mafonction4()" class="aside_lien" href="#">Rejoignez le Club !</a></p>
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
					
					</div>
					
					
					 
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
