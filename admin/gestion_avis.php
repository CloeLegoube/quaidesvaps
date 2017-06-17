<?php
	include("../inc/install.php");
	
	
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
//                         			SUPPRESSION D'UN avis avec IMAGE
//**********************************************************************************************************	
		
	
	if(isset($_GET['action']) && $_GET['action']== "suppression")
	{
					
			
			// ------------- Suppresssion de toute la ligne du avis --------------------------------
			
			$msg .= '<div id="msg">
						<p class="vert">Suppression du commentaire n° '."$_GET[id]".' effectuée</p>
					</div>';
			execute_requete("DELETE FROM avis WHERE id_avis = '$_GET[id]'");
			$_GET['action'] = "affichage"; // Petite astuce pour revenir sur la page affichage
	}
	
	
	
	
	
	
	include("../inc/haut_de_site_inc.php");
	include("../inc/top_menu_inc.php");
	include("../inc/menu_inc.php");
	//**************** FIL D'ARIANE ************************* -->	

	
	get_fil_ariane(array(
	'gestion_produit.php' => 'Administration du site', 
	'final' => 'Gestion des avis'
   ));	
				

			
					
			
//**************** MESSAGE ******************************	
			
					echo $msg;
	
//**************** MENU ADMIN ****************************		
						

	include("../inc/menu_admin_inc.php");
?>

<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div id="colonne-unique" class="colonne2"> <!-- début colonne 2-->	
				
						
					<div class="titre_h2 largeur_article"><h2>INTERFACE ADMINISTRATEUR</h2></div>
					<div class="bouton-ajout"><img src="<?php echo RACINE_SITE ?>image/affichage.png" alt="loupe"/><a href="?action=affichage">Tableau d'affichage</a></div>
					
					
<?php
//**********************************************************************************************************	
//                         		  AFFICHER DES AVIS DANS TABLEAU RECAPITULATIF
//**********************************************************************************************************	
		
	
	if(isset($_GET['action']) && $_GET['action']== "affichage")
	{
		//--- TABLEAU HTML ---------------------------------
		
		
		
		$tri = "";
		$col = "";
		
		if(isset($_GET['tri']) && $_GET['tri']== "11")
		{
			$tri = "DESC";
			
		}elseif(isset($_GET['tri']) && $_GET['tri']== "11") {
		
			$tri = "ASC";
		}
		
		if(isset($_GET['col']))	{
			$col = "ORDER BY ".$_GET['col']."";
		}
		
		
		$resultat = execute_requete("SELECT * 
		FROM avis a, membre m, produit p
		WHERE a.id_produit = p.id_produit
		AND (a.id_membre = m.id_membre
		OR a.id_membre is NULL)
		GROUP BY  id_avis ".$col." ".$tri.""); // EXECUTION DE LA REQUETE DE SELECTION
		
		//debug($resultat)
?>		
					<div id="tableau">
					<table class="tableau_admin" summary="Gestion administrateur">
					<caption>GESTION DES AVIS</caption>
					<thead>
					<tr>					
					<th scope="col" class="petit">ID avis</th>
					<th scope="col" class="petit">ID membre</th>
					<th scope="col" >Pseudo</th>
					<th scope="col" class="petit">ID produit</th>
					<th scope="col" >Produit</th>
					<th scope="col" class="tailleth" >Commentaire</th>
					<th scope="col" class="petit">Note</th>
					<th scope="col">Date</th>
					<th scope="col">Actions</th>
					</tr>	

					<tr>					
					<th scope="col" class="petit"><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=id_avis#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=id_avis#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" class="petit"><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=id_membre#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=id_membre#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" ><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=pseudo#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=pseudo#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" class="petit"><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=id_produit#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=id_produit#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col"><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=titre#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=titre#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" class="tailleth"  ><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=commentaire#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=commentaire#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" class="petit" ><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=note#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=note#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
					
					<th scope="col" ><div class="filtre"><a href="?action=affichage&page=1&tri=22&col=date#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="?action=affichage&page=1&tri=11&col=date#tableau"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>

					
					<th scope="col"></th>
					</tr>	
					</thead>
					
					<tfoot>
					<tr>
					<th scope="row">Total</th>
					<td colspan="11"><?php echo $resultat->num_rows ?> avis</td>
					</tr>
					</tfoot>
					
					<tbody>
<?php				
				while($ligne = $resultat->fetch_assoc())
			{ //debug($ligne)
?>
					<tr>
						<th  class="petit" scope="row" id="r100"><a href="100.php"><?php echo $ligne['id_avis'] ?></a></th>
						<td class="petit"><?php echo $ligne['id_membre'] ?></td>
						<td><?php echo $ligne['pseudo'] ?></td>
						<td class="petit"><a href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $ligne['id_produit'] ?>"><img style="max-width: 80px; max-height: 100px;" src="<?php echo RACINE_SITE ?><?php echo $ligne['photo'] ?>"/></a></td>
						<td><?php echo $ligne['titre'] ?></td>
						<td class="taille"><div><?php echo $ligne['commentaire'] ?></div></td>
						<td class="petit"><?php echo $ligne['note'] ?>/5</td>
						<td><?php echo $ligne['date'] ?></td>						
						<td>
							<a href="?action=suppression&id=<?php echo $ligne['id_avis'] ?>"><img src="<?php echo RACINE_SITE ?>image/poubelle.gif"/></a>
						</td>
					</tr>
<?php				
			}
?>					
					</tbody></table>					
					
					</div>
<?php				
			}
?>	
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
			
<?php
	include("../inc/footer_inc.php");
?>
