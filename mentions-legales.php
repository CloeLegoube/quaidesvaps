<?php
	include("inc/init_inc.php");
	
			

	
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");

	
	//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Mentions légales'
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
				
					<div class="titre_h2 largeur_article boutique"><h2>Mentions Légales</h2></div>
					
	
	<div>
		<h3><i class="fa fa-gavel fa-lg"></i>  Informations légales</h3>
		
		<p>
			<ul>
				<li>Quaidesvaps.fr</li>
				<li>Siège social : 3 ter, rue des Madiraa - 92 400 COURBEVOIE</li>
				<li>Email: contact@quaidesvaps.fr</li>
				<li>Tel : +33 1 41 16 92 12</li>
				<li>SIRET : 000 000 000 00000</li>
			</ul>
		</p>
 
 
		<h3><i class="fa fa-gavel fa-lg"></i>  Déclaration à la CNIL</h3>

		<p>Conformément à la loi « Informatique et Libertés » du 6 janvier 1978, le présent site a fait l'objet d'une déclaration à la CNIL – en date du JJ/MM/YYYY – récépissé de déclaration n° XXX XXXX.</p>
		
		<p>Conformément à la loi «Informatique et Libertés » du 6 janvier 1978, les personnes ayant fourni des informations personnelles ont un droit de regard total sur celles-ci. Pour exercer vos droits d'accès et de modification sur ces données, envoyer un courrier électronique à l'adresse suivante : contact@quaidesvaps.fr. De plus, aucune information personnelle n'est collectée à l'insu des utilisateurs du site, ni cédée à des tiers, ni utilisée à des fins personnelles.</p>


	</div>
						
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
