<?php
	include("inc/init_inc.php");
	
			

	
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");

	
	//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Paiements sécurisés'
   ));


		
					
			
//**************** MESSAGE ************************* -->	
			
					
						echo $msg;
							
?>		
<!-- **************************************************************************************** -->	
<!--  									PREMIERE COLONNE									  -->	
<!-- **************************************************************************************** -->	
<?php	
	include("inc/aside_inc.php");
?>


				
<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div class="colonne2"> <!-- début colonne 2-->	
				
					<div class="titre_h2 largeur_article boutique"><h2>Paiements sécurisés : Paypal</h2></div>
					
	
	<div>
	
		<p><strong>Quai des vaps utilise Paypal pour tous vos paiements en ligne. Soyez rassurés.</strong></p>
		<p class="paypal"><img src="<?php echo RACINE_SITE ?>image/PP_logo_h_200x51.png" alt="logo Paypal" /></p>
		<p>PayPal vous protège quand vous faites votre shopping.</p>
		<p>Faites votre shopping l'esprit tranquille : PayPal vous protège du paiement à la livraison. Vos informations bancaires sont en sécurité et vos achats sont livrés ou remboursés* ! Découvrez aussi comment nous restons à vos côtés en cas de problème et profitez de quelques astuces pour acheter de façon plus sûre.</p>
		
		<h3><i class="fa fa-gavel fa-lg"></i>  La Protection des Achats PayPal</h3>
		
		<p>Lorsque vous achetez un objet avec PayPal, vous êtes livré ou remboursé*.</p>


		<p>Vous bénéficiez gratuitement de la Protection des Achats PayPal sur les petits sites comme sur les grands sites marchands, en France comme à l'étranger. Si vous ne recevez pas votre commande, vous pouvez bénéficier de la couverture PayPal et vous faire rembourser l'intégralité de la somme, frais de port inclus.</p>

		<h3><i class="fa fa-gavel fa-lg"></i>  Comment faire ?</h3>
		<p>Vous pouvez nous signaler que vous n'avez pas reçu votre colis dans les 180 jours qui suivent la transaction. Rendez-vous dans votre Gestionnaire de litiges et ouvrez un litige pour objet non reçu. Si vous ne trouvez pas de terrain d'entente avec le vendeur, transformez ce litige en réclamation.</p>

		<p>Attention : vous avez 20 jours après l'ouverture de votre litige pour le transformer en réclamation. Au-delà de ce délai, il sera automatiquement clos et nous ne pourrons plus intervenir. Si le marchand n'est pas en mesure de nous fournir les justificatifs que nous lui demandons, vous serez intégralement remboursé.</p>

		<h3><i class="fa fa-gavel fa-lg"></i>  Quelles sont les conditions de la protection PayPal ?</h3>
		<p>PayPal protège les achats de biens matériels, payés en une seule fois et livrés par un transporteur. Les biens numériques, les objets livrés en mains propres ou payés en espèces ne peuvent être couverts par la protection des achats PayPal, aucun justificatif ne nous permettant de vérifier si l'objet a été reçu.</p>
		
		
		
	</div>
						
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
