<?php
	include("inc/install.php");

	if(!utilisateur_est_connecte())
	{
		header("location:connexion.php");
	}

//**********************************************************************************************************
//                         		MODIFICATION DU COMPTE
//**********************************************************************************************************


	if(isset($_POST['modification'])) // S'il y a clic sur bouton modification
	{
		$href = "profil.php";


		//echo "<pre>";print_r($_POST);echo "</pre>"; // Affiche ce qui a été saisi pour vérification
		//Nous allons faire les contrôles et pour cela nous savons que la référence est UNIQUE (voir BDD) donc on vérifie qu'elle n'existe pas déjà :

		$resultat = execute_requete("SELECT * FROM membre WHERE id_membre = '".$_SESSION['utilisateur']['id_membre']."'");
							// Est-ce qu'il y a une ligne avec le même id_membre?
		//debug($resultat);

		// ATTENTION cette condition doit fonctionner dans le cas d'ajout d'article et dans le cas d'une modification
		// Dans le cas d'un ajout, une réference article ne peut être qu'unique. En modification la référence sera trouvé et récuperé

				//*****************************************************************************************

				if(mysqli_num_rows($resultat)== 0 && isset($_GET['action']) && $_GET['action']== "update")
		{
			$msg .= '<div id="msg">
						<p class="orange">Vous n\'êtes pas enregistré, merci de vous enregistrer.</p>
					</div>';
		}

		else     //*****************************************************************************************
		{

			$id_membre = mysqli_fetch_assoc($resultat);
			//echo $id_membre['id_membre'];
			$msg .= '<div id="msg">
						<p class="vert">Votre compte a été actualisé.</p>
						<p class="vert">Pour toute autre modification, veuillez vous reconnecter.</p>
					</div>';

			// ICI on transforme INSERT INTO en REPLACE INTO et on ajoute $_POST[id_article] pour récupérer la valeur
			// Rappel : REPLACE permet de faire UPDATE et INSERT en même temps (pour le cas de la modification).

			execute_requete("UPDATE membre SET
			pseudo = '$_POST[pseudo]' ,
			mdp = '$_POST[mdp]',
			nom = '$_POST[nom]',
			prenom ='$_POST[prenom]',
			naissance ='$_POST[naissance]',
			email = '$_POST[email]',
			telephone = '$_POST[telephone]',
			sexe ='$_POST[sexe]',
			ville = '$_POST[ville]',
			cp = '$_POST[cp]',
			adresse = '$_POST[adresse]',
			statut = '".$id_membre['statut']."'
			WHERE id_membre = '".$id_membre['id_membre']."'");


		//******************************************************************************
		//**						ENVOI DES DONNEES SESSION
		//******************************************************************************


			$_SESSION['utilisateur']['pseudo'] = $_POST['pseudo'];
			$_SESSION['utilisateur']['mdp'] = $_POST['mdp'];
			$_SESSION['utilisateur']['nom'] = $_POST['nom'];
			$_SESSION['utilisateur']['prenom'] = $_POST['prenom'];
			$_SESSION['utilisateur']['naissance'] = $_POST['naissance'];
			$_SESSION['utilisateur']['email'] = $_POST['email'];
			$_SESSION['utilisateur']['telephone'] = $_POST['telephone'];
			$_SESSION['utilisateur']['sexe'] = $_POST['sexe'];
			$_SESSION['utilisateur']['ville'] = $_POST['ville'];
			$_SESSION['utilisateur']['cp'] = $_POST['cp'];
			$_SESSION['utilisateur']['adresse'] = $_POST['adresse'];


		};
	}else{

		$href = "profil.php?action=update#mettre_a_jour";
	};






	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");

//**************** FIL D'ARIANE ************************* -->


   get_fil_ariane(array(
   'final' => 'Mon profil'
   ));

?>



<!-- **************** MESSAGE ************************* -->


						<?php echo $msg; ?>


<!-- **************************************************************************************** -->
<!--  									DEUXIEME COLONNE									  -->
<!-- **************************************************************************************** -->


				<div id="colonne-double" class="colonne2"> <!-- début colonne 2-->


					<div class="titre_h2 largeur_article"><h2>MON PROFIL</h2></div>



					<div class="informations-utilisateurs">

						<div class="col1">
						<p>Pseudo : </p>
						<p>Nom :</p>
						<p>Prénom :</p>
						<p>Age : </p>
						<p>Email : </p>
						<p>Téléphone : </p>
						<p>Adresse : </p>
						</div>

					<div class="col2">

						<?php
						//**********************************************************************************************************
						//                         				PROFIL DE L'UTILISATEUR
						//**********************************************************************************************************

							if(utilisateur_est_connecte()) // Dans le cas de l'utilisateur connecté (membre)
							{
							if(isset($_POST['modification'])){echo "<p>".$_POST['pseudo']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['pseudo']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['nom']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['nom']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['prenom']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['prenom']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['naissance']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['naissance']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['email']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['email']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['telephone']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['telephone']."</p>";};
							if(isset($_POST['modification'])){echo "<p>".$_POST['adresse']."</p><p>".$_POST['cp']." ".$_POST['ville']."</p>";}else{ echo "<p>".$_SESSION['utilisateur']['adresse']."</p><p>".$_SESSION['utilisateur']['cp']." ".$_SESSION['utilisateur']['ville']."</p>";};
							}

						?>

					</div>  <!-- Fin col2 -->

					<div class="profil">
						<?php
							if(isset($_POST['modification']) && $_POST['sexe'] =='m' || $_SESSION['utilisateur']['sexe'] =='m')
							{
								echo '<img src="'.RACINE_SITE.'image/man.png" alt="image d\'un homme"/>';
							}else{
								echo '<img src="'.RACINE_SITE.'image/woman.png" alt="image d\'une femme"/>';
							}
						?>
					</div>

						<div class="col3 bouton-ajout"><img src="<?php echo RACINE_SITE ?>image/modifier.gif" alt="feuille de papier icone"/><a href="<?php echo $href ?>">Modifier mon profil</a></div>

					</div>
					<div id="mettre_a_jour" class="clear"></div>


					<?php
						//**********************************************************************************************************
						//                         		FORMULAIRE DE MODIFICATION DE PROFIL
						//**********************************************************************************************************

						if(isset($_GET['action']) && $_GET['action'] == "update" && isset($_POST['modification']))
						{
							 echo '<div id="msg">
									<p class="vert">Vous avez bien rentré toutes les informations</p>
									</div>';
						}
						elseif (isset($_GET['action']) && $_GET['action'] == "update")
						{


					?>

					<div class="titre_h2 largeur_article"><h2>METTRE A JOUR VOTRE PROFIL</h2></div>
					<div id="modification-profil">
							<form class="formulaire formulaire_profil" method="post" action="">

								<label for="prenom">Votre nom et prénom <span>*</span></label><br />
								<input type="text" id="prenom" name="prenom"   maxlength="60" placeholder=" Votre prénom" value="<?php if(isset($_POST['modification'])) {echo $_POST['prenom'];}else{ echo $_SESSION['utilisateur']['prenom'];}?>"/>
								<input type="text" id="nom" name="nom"   maxlength="60" placeholder=" Votre nom" value="<?php if(isset($_POST['modification'])) {echo $_POST['nom'];}else{ echo $_SESSION['utilisateur']['nom'];}?>"/><br />

								<label for="pseudo">Votre nom d'utilisateur (pseudo)<span>*</span></label><br />
								<input type="text" id="pseudo" name="pseudo"   maxlength="14" placeholder=" Veuillez choisir un nom d'utilisateur" value="<?php if(isset($_POST['modification'])) {echo $_POST['pseudo'];}else{ echo $_SESSION['utilisateur']['pseudo'];}?>"/><br />

								<label for="email">Votre email <span>*</span></label><br />
								<input type="text" id="email" name="email"   maxlength="60" placeholder=" Votre adresse email" value="<?php if(isset($_POST['modification'])) {echo $_POST['email'];}else{ echo $_SESSION['utilisateur']['email'];}?>"/><br />

								<label for="telephone">Votre numéro de téléphone</label><br />
								<input type="text" id="telephone" name="telephone"   maxlength="10" placeholder=" 00 00 00 00 00" value="<?php if(isset($_POST['modification'])) {echo $_POST['telephone'];}else{ echo $_SESSION['utilisateur']['telephone'];}?>"/><br />


								<label for="mdp">Votre mot de passe<span>*</span></label><br />
								<input type="password" id="mdp" name="mdp"   maxlength="14" placeholder=" Veuillez choisir un mot de passe" value="<?php if(isset($_POST['modification'])) {echo $_POST['mdp'];}?>"/>
								<input type="password" id="mdp2" name="mdp2"   maxlength="14" placeholder=" Veuillez re-saisir votre mot de passe" value="<?php if(isset($_POST['modification'])) {echo $_POST['mdp'];}?>"/><br />


									<label for="sexe">Sexe :</label>
									<input class="radio" type="radio" name="sexe" value="m"
											<?php if($_SESSION['utilisateur']['sexe'] =="m")
												echo "checked";?>
									/>Homme
									<input class="radio" type="radio" name="sexe" value="f"
											<?php if($_SESSION['utilisateur']['sexe'] =="f")
												echo "checked";?>
									/>Femme
											<br />

								<label for="naissance">Date de naissance</label><br />
								<input type="text" id="naissance" name="naissance"   maxlength="14" placeholder="YYYY/MM/JJ" value="<?php if(isset($_POST['modification'])) {echo $_POST['naissance'];}else{ echo $_SESSION['utilisateur']['naissance'];}?>"/><br />

									<label for="ville">Votre adresse</label><br />
									<input type="text" id="cp" name="cp" placeholder=" Votre code postal" value="<?php if(isset($_POST['modification'])) {echo $_POST['cp'];}else{ echo $_SESSION['utilisateur']['cp'];}?>"/>
										<input type="text" id="ville" name="ville" placeholder=" Votre ville" value="<?php if(isset($_POST['modification'])) {echo $_POST['ville'];}else{ echo $_SESSION['utilisateur']['ville'];}?> " /><br />

										<textarea id="adresse" name="adresse" placeholder=" Votre adresse et autres détails (Bat, Etage, Résidence...)"><?php if(isset($_POST['modification'])) {echo $_POST['adresse'];}else{ echo $_SESSION['utilisateur']['adresse'];}?></textarea>
										<br />
								<br />
								 <input type="submit" name="modification" value="MODIFIER MES INFORMATIONS"/>


								</form>


					</div>
					<?php
						};
						//**********************************************************************************************************
						//                         		COMMANDE DE L'UTILISATEUR
						//**********************************************************************************************************
					?>


					<div class="titre_h2 largeur_article"><h2>ETAT DE MES COMMANDES</h2></div>

					<?php
					$profil = execute_requete("SELECT *
								FROM commande
								WHERE id_membre = ".$_SESSION['utilisateur']['id_membre']."");

					while($commande = mysqli_fetch_assoc($profil))
					{
					?>

						<div class="etat-commande">
						<p><img src="<?php echo RACINE_SITE ?>image/shopping.png" alt="homme profil"/>
						<a href="?action=affichage&id=<?php echo $commande['id_commande']?>#titre_details_commande">COMMANDE N° <?php echo $commande['id_commande'] ?></a>
						- Montant : <?php echo $commande['montant'] ?>€ TTC</p>
						<ul>
							<li>Commande effectuée le <?php echo $commande['date_commande'] ?></li>
							<li>Date de livraison estimée au <?php echo $commande['date_estimation'] ?></li>
							<li>Commande livrée le <?php echo $commande['date_livraison'] ?></li>
						</ul>
						<p><img src="<?php echo RACINE_SITE ?>image/loupe.png" alt="loupe"/><a href="?action=affichage&id=<?php echo $commande['id_commande']?>#titre_details_commande"> Détails de ma commande</a></p>
						<p><img src="<?php echo RACINE_SITE ?>image/livraison.png" alt="homme profil"/> ETAT : <?php echo $commande['statut'] ?></p>
						</div>

					<?php
					}

		//**********************************************************************************************************
		//                         				AFFICHAGE FORMULAIRE
		//									      DETAILS-COMMANDE
		//**********************************************************************************************************


					// Attention lorsqu'on a plusieurs conditions de bien mettre des parenthèses. Pour && et ||, ça sera || qui sera privilégié.
					// S'il y a un AND et un OR dans un IF, le OR prend le dessus.


				if(isset($_GET['id']))
				{

					$resultat = execute_requete("SELECT *
					FROM commande c, details_commande d, membre m, produit p
					WHERE c.id_commande = '$_GET[id]'
					AND c.id_commande = d.id_commande
					AND m.id_membre = c.id_membre
					AND p.id_produit = d.id_produit
					GROUP BY id_details_commande");



					//debug($resultat);

					if(mysqli_num_rows($resultat)== 0){
							 echo'<div id="msg" ><p class="orange" id="titre_details_commande">Pas de détail pour la commande n° '.$_GET['id'].'</p></div>';
							$_GET['action'] = "affichage";
							$_GET['id'] = "0";
					}else{
?>

							<table class="tableau_admin" id="details_commande" summary="Gestion administrateur">
<?php
								$commande = execute_requete("SELECT *
								FROM commande c, details_commande d, membre m, produit p
								WHERE c.id_commande = '$_GET[id]'
								AND c.id_commande = d.id_commande
								AND m.id_membre = c.id_membre
								AND p.id_produit = d.id_produit
								GROUP BY id_details_commande");

								$cde = mysqli_fetch_assoc($commande);

								echo "<div id='titre_details_commande' class='titre_h2 largeur_article'><h2>DETAIL DE LA COMMANDE n°".$_GET['id']." d'un montant de ".$cde['montant']."€ TTC </h2></div>";

?>
							<thead>
							<tr>
							<th scope="col" >Photo</th>
							<th scope="col">Produit</th>
							<th scope="col" >Qtité</th>
							<th scope="col">Prix TTC</th>
							<th scope="col">Points fidélité</th>
							<th scope="col"  >N° détail cde</th>
							<th scope="col"  >N° Cde</th>
							<th scope="col" >Id produit</th>
							</tr>

							<tr>
							<th scope="col" ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col" ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col"><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col" ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col"><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col"  ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col"  ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							<th scope="col" ><div class="filtre"><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-haute.gif"/></a><a href="#"><img src="<?php echo RACINE_SITE ?>image/fleche-bas.gif"/></a></div></th>
							</tr>
							</thead>
<?php
					//************** Affichage du montant de la commande *******************************************
					$total = execute_requete("SELECT SUM(prix*quantite) AS SOMME
					FROM commande c, details_commande d, membre m, produit p
					WHERE c.id_commande = '$_GET[id]'
					AND c.id_commande = d.id_commande
					AND m.id_membre = c.id_membre
					AND p.id_produit = d.id_produit ");

					$somme = mysqli_fetch_assoc($total);

					//************************************************************************************************
?>
							<tfoot>
							<tr>
							<th colspan="3" scope="row">Total</th>
							<td colspan="1"><?php echo $somme['SOMME'] ?>€ TTC</td>
							<td colspan="4"><?php echo mysqli_num_rows($resultat)?> produits pour cette commande</td>
							</tr>
							</tfoot>

							<tbody>
<?php


					// Ici on aura pu donner un autre nom à cette variable ex : $modif et dire que $_POST = $modif mais on a raccourci l'opération en écrivant directement $_POST. Il faut se souvenir que la superglobal $_POST fonctionne pour l'ajout d'un commande mais pas pour la modification car on ne soumet pas de formulaire, donc va lui dire quoi aller chercher pour remplir $_POST.

					// 2ème ligne de tableau et suivantes **********************

						while($ligne = mysqli_fetch_assoc($resultat))
						{
							//debug($ligne);
?>

							<tr>
								<td ><a href="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $ligne['id_produit'] ?>"><img style="max-width: 80px; max-height: 100px;" src="<?php echo RACINE_SITE ?><?php echo $ligne['photo'] ?>"/></a></td>
								<th ><?php echo $ligne['titre'] ?></th>
								<td ><?php echo $ligne['quantite'] ?></td>
								<td class="moyen"><?php echo $ligne['prix'] ?>€ TTC</td>
								<td class="moyen"><?php echo $ligne['fidelite'] ?> POINTS</td>
								<td><?php echo $ligne['id_details_commande'] ?></td>
								<td ><?php echo $ligne['id_commande'] ?></td>
								<td ><?php echo $ligne['id_produit'] ?></td>
							</tr>
<?php
						};
?>


						</tbody></table>

<?php
					};
				};
?>

				</div> <!-- fin COLONNE 2 ......................... -->

			</div><!-- Fin de principale............................ -->
