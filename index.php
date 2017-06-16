<?php
	include("inc/init_inc.php");
	
	$comptage = execute_requete("SELECT DISTINCT * 
					FROM produit p
					WHERE p.stock > 0
					ORDER BY  p.id_produit DESC LIMIT 0,9");
				
	
//**************************************************************************************************************	
//                          ETAPE 1 :::  TRANSFERT ENTRE LA FICHE_produit et LE PANIER
//***************************************************************************************************************	
	
	
	creation_du_panier ();
	
	// -------------------------------------- AJOUT AU PANIER ------------------------------------------
	
	if(isset($_POST['ajout_panier'])) // Est-ce que l'internaute a cliqué sur ajout panier dans la fiche produit ?
	{
				// Execution d'une requête de selection pour aller chercher les infos venant de $_POST['id_produit'] du formulaire de la fiche produit.
				//echo $_POST['id_produit'];
				$resultat = execute_requete("SELECT * 
				FROM produit p
				WHERE p.id_produit = $_POST[id_produit]
				GROUP BY  p.id_produit");
				$produit = $resultat -> fetch_assoc ();
				
				//debug($produit);
		
				// LA REQUETE avec 4 arguments (cf. fonction_inc.php). On ajoute le produit dans la SESSION panier.
				if($produit['id_promo'] == ""){
				
					ajout_produit_au_panier($produit['titre'], $produit['id_produit'], $produit['photo'], $produit['descriptif'],$_POST['quantite'], $produit['fidelite'], $produit['categorie'], $produit['prix'], 0,0,0,0 );
					
				}else{
				
					$resultat = execute_requete("SELECT * FROM promotion
					WHERE ".$produit['id_promo']." = id_promo");
					$promotion = $resultat -> fetch_assoc ();
					//debug($promotion);
					
					ajout_produit_au_panier($produit['titre'], $produit['id_produit'], $produit['photo'], $produit['descriptif'],$_POST['quantite'], $produit['fidelite'], $produit['categorie'], $produit['prix'], $produit['prix_promo'], $produit['id_promo'], $promotion['code_promo'], $promotion['reduction'] );
				};
		
				// IMPORTANT
				//Ici on redirige l'internaute vers la page pour éviter que le dernier produit s'ajoute indéfiniment au moment du rafraîchissement de la page, F5.
				// Attention néanmoins à veiller à ce que le header se situe avant le HTML, et avant ECHO ou PRINT_R.
				//header("location:panier.php"); 

				$msg.= '<div id="msg">
						<p class="vert">Un produit a été ajouté à votre panier</p>
						</div>';
		
	};
	


	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");

//**************** FIL D'ARIANE ************************* -->	
	

   get_fil_ariane(array());


?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script type="text/javascript">
  (function($){  
  setInterval(function(){  
    $(".carousselConteneur ul li:first-child").animate({"margin-left": -605}, 800, function(){  
        $(this).css("margin-left",0).appendTo(".carousselConteneur ul");  
    });  
  }, 3500);  
})(jQuery);;


$(document).ready(function(){
        var cPosition = 0; //Position courante
        var slideWidth = 605; //Largeur d'un slide
        var slides = $('.slide'); //Identification des slides
        var numSlides = slides.length; //Nombre de slide

        //Js activé je passe donc le conteneur en overflow hidden pour cacher les autres slides
        $('#caroussel').css('overflow','hidden');

        //Float left sur les LI
        slides.css({'float' : 'left', 'width' : slideWidth});

          $('.carousselConteneur ul').css('width', slideWidth * numSlides);

          $('#caroussel')
            .prepend('<a href="#slider" class="controles" id="ctrlGauche">Slide précédent</a>')
            .append('<a href="#slider" class="controles" id="ctrlDroite">Slide suivant</a>');

          manageControls(cPosition);


          $('.controles').bind('click', function(){
              cPosition = ($(this).attr('id')=='ctrlDroite')? cPosition+1 : cPosition-1;
              manageControls(cPosition);
              $('.carousselConteneur').animate({'marginLeft' : slideWidth*(-cPosition)});
        });

      function manageControls(position){
        if(position==0){ $('#ctrlGauche').hide() }
        else{ $('#ctrlGauche').show() }
        if(position==numSlides-1){ $('#ctrlDroite').hide() }
        else{ $('#ctrlDroite').show() }
    }

    });

</script>			
<!-- **************** SLIDER INDEX ************************* -->	
			
					<div id="slider"><!-- début slider -->
						<div class="titre_h2"><h2>NOS MEILLEURES VENTES</h2></div>
						<div class="slider_zone">
							<div class="slider_zone_image">
								
								        <div id="caroussel">
										<div class="carousselConteneur">
											<ul>
											<?php											
											// **********************************************************************************************************	
											//                         		 Top 5 des produits les mieux vendus
											// **********************************************************************************************************	

												$vente = execute_requete("SELECT *, COUNT(id_details_commande) AS produit
														FROM produit p, details_commande d
														WHERE p.id_produit = d.id_produit
														AND p.categorie = 'E-cigarettes'
														GROUP BY p.id_produit
														ORDER BY COUNT(d.id_produit)" );

													while($produit = $vente->fetch_assoc()){
															//debug($produit);
														
											?>					 
														
														<li class="slide">
															<img class="slider_image" src="<?php echo RACINE_SITE ?><?php echo $produit['photo'] ?>" alt="<?php echo $produit['titre'] ?>" />
														</li>
																										
											<?php		
													}
											?>					
														

											</ul>
										</div>
									</div>

							</div>
						
						</div>
					</div><!-- fin slider -->   
		
			
<!-- **************** MESSAGE ************************* 
<?php			
					echo $msg;
							
?>			
<!-- **************************************************************************************** -->	
<!--  									PREMIERE COLONNE - ASIDE							  -->	
<!-- **************************************************************************************** -->	
			
<?php
	include("inc/aside_inc.php");
?>

				
<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div class="colonne2"> <!-- début colonne 2-->	
				
					<div id="index" class="titre_h2 largeur_article"><h2>NOS NOUVEAUTES</h2></div>
					
					<div class="englobe_produit">
					
					
					 <!-- PRODUIT -->
<?php			
			while($produit = $comptage->fetch_assoc()){
?>					 
					 
					<div class="produit produit_index">
					
			
						<div class="contenu_produit">
						
<?php			
			if(!empty($produit['prix_promo'])) {
				echo '<div class="discount">PROMO</div>';
			}
?>	
		
							<div class="contenu_produit_image">
								<a  class="image_contenu_produit"
								href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $produit['id_produit'] ?>">
								<img style="max-width: 193px; max-height: 146px;" src="<?php echo RACINE_SITE ?><?php echo $produit['photo'] ?>" alt="<?php echo $produit['titre'] ?>" />
								</a>
							</div>
							
							<h3><?php echo substr($produit['titre'],0, 20) ?></h3>
							
							<?php			
			if(!empty($produit['prix_promo'])) {
				echo '<p class="prix clignotant">'.$produit['prix_promo'].'€  ';
				echo '<span class="prix prix_barre">'.$produit['prix'].'€</span></p>';
			}else {
				
				echo '<p class="prix">'.$produit['prix'].'€</p>';
			}
?>	
		
							
			
							<div class="etoiles">
							
										<?php 
										$resultat = execute_requete("SELECT avg(note) AS moyenne
										FROM avis a
										WHERE a.id_produit= ".$produit['id_produit']."
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
							<img src="<?php echo RACINE_SITE ?>image/icone_plus.gif" alt="Icone PLUS" />
							<p><a href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $produit['id_produit'] ?>">En savoir plus</a></p>
							</div>
							
							<div>
							<!-- <img src="<?php echo RACINE_SITE ?>image/icone_bag.gif" alt="Icone sac de course" /> -->
							
<?php
//**********************************************************************************************************	
//                         			FORMULAIRE 'ajout_panier' QUANTITE SI STOCK
//**********************************************************************************************************	
	
							
if($produit['stock'] >0) // Affiche le formulaire de selection de quantité s'il y a du stock
	{
		//---- DEBUT FORMULAIRE -----------------------------------------------------------------------------
		
		echo "<form id='quantite' action='' method='post'>";
			echo "<input type='hidden' name='id_produit' readonly value='$produit[id_produit]'/>";
			echo "<input type='hidden' name='quantite' readonly value='1'/>";
			echo "<input class='presentation_produit' type='submit' name='ajout_panier' value='Ajout au panier'/>";
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
					
					</div>	
<?php			
			}
?>						
					<!-- fin PRODUIT -->
					
					</div> <!-- Fin bloc produit -->
				</div> <!-- fin COLONNE 2 ......................... -->
				
				
			</div><!-- Fin de principale............................ -->	
			
			
			
<?php
	include("inc/footer_inc.php");
?>
