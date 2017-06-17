<?php
	include("inc/install.php");
	
	
	
	
	
	$nav_en_cours = 'page_magasin'; 
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");
	
//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Le blog du Quai des Vaps'
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
					<div class="club_titre"><h2><i class="fa fa-dot-circle-o fa-lw fa-spin"></i><i class="fa fa-dot-circle-o fa-lw fa-spin"></i> Le Blog <i class="fa fa-dot-circle-o fa-lw fa-spin"></i><i class="fa fa-dot-circle-o fa-lw fa-spin"></i></h2></div>
					<div><p>Cette page est en construction et sera réalisée à la demande du client pour aider au référencement à l'aide d'articles publiés</p></div>
					
					
					
					 
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
