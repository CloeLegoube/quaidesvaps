<?php
	include("inc/install.php");
	$result_age = "";

	if(isset($_POST['inscription'])) // ISSET = existe . Si le formulaire a été soumis.
	{
		//$mysqli->query(""); Ici on devrait l'écrire mais on ne va pas écrire cette requête comme ça. On va appeler plutôt la fonction qui aura été créée préalablement dans fonction_inc.php. La requête s'appellera désormais : execute_requete ($req)
		
		
		
		
//** PSEUDO *************************************	

		$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#' , $_POST['pseudo']);
		// Ceci est une expression régulière (REGEX) qui limite les caractères qu'on doit retrouver dans le pseudo
		//  '#^[    a-z   A-Z    0-9  ._-     ]$#'
		// On cherche des caractères minuscule, majuscule, numérique ou bien un ., un _ ou un -
		// ^ tout caractère qui commence le pseudo / indique début de la chaine
		// $ tout caractère qui termine le pseudo
		// Le + permet de dupliquer les caractères. les lettres autorisées peuvent apparaître plusieurs fois.
		// '#  #' entoure toujours notre expression REGEX
		// Il existe aussi des expressions régulières pour vérifier un email.
		// Preg_match attend 2 arguments (1,2)
		
		if(!$verif_caractere && !empty($_POST['pseudo'])) //if FALSE et que $_POST[pseudo] n'est pas vide
			{
				$msg .= '<div id="msg">
						<p class="orange">Le pseudo comporte des caractères non autorisés. Les caractères autorisés sont : A à Z et de 0 à 9</p>
						</div>';
			}
		
		
		if (strlen($_POST['pseudo'])<3 || strlen($_POST['pseudo'])> 14 ) // Evalue la longeur du champ
			{
				$msg .= "<div class='erreur'>Le pseudo doit avoir entre 4 et 14 caractères inclus</div>";
				// .= signifie qu'on ajoute à la variable msg le texte ci-dessus.
			}
			
		///// A ECRIRE une seule fois, soit ici, soit en bas avant la requête comme ci-dessous /////	
						/*$membre = execute_requete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
							// Est-ce qu'il y a une ligne avec le même pseudo posté?

						if($membre->num_rows >0)
							{
								$msg .= "<div class='erreur'>Pseudo déjà utilisé. Veuillez vous connecter à votre compte ou saisir un nouveau pseudo s'il ne correspond pas au vôtre</div>";
							}*/
		
//** MDP *************************************	
				
		if (strlen($_POST['mdp'])<3 || strlen($_POST['mdp'])> 14 )
			{
				$msg .= '<div id="msg">
						<p class="orange">Le mot de passe doit avoir entre 4 et 14 caractères inclus</p>
						</div>';

			}
			
		if ($_POST['mdp'] !== $_POST['mdp2'])
			{
				$msg .= '<div id="msg">
						<p class="orange">Mots de passe non identiques, veuillez ressaisir votre mot de passe.</p>
						</div>';
				

			}
			
	
//** EMAIL *************************************	
			
		$verif_caractere_email = preg_match('#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})+$#' , $_POST['email']);
		
		if(!$verif_caractere_email)
		{
			$msg .= '<div id="msg">
						<p class="orange">Veuillez rentrer une adresse email valide</p>
						</div>';
			

		}
		
		
//** CODE POSTAL *********************************	
		
		$verif_caractere_code_postal = preg_match('#^[0-9]+$#' , $_POST['cp']);
		
		if(!$verif_caractere_code_postal && strlen($_POST['cp'])!=5)
		{
			$msg .=  '<div id="msg">
						<p class="orange">Veuillez rentrer un code postal valide</p>
						</div>';

		}
				
//** NOM PRENOM ADRESSE VILLE *********************************	
		
		if(empty($_POST['nom'])||empty($_POST['prenom'])||empty($_POST['ville'])||empty($_POST['sexe']))
		{
			$msg .=  '<div id="msg">
						<p class="orange">Veuillez remplir tous les champs obligatoires (*)</p>
						</div>';

		}
				
	
			
//** EXECUTION DE LA REQUETE (si $msg est vide) **********************
			
		if (empty($msg))
		{	
		
			$membre = execute_requete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
			// Est-ce qu'il y a une ligne avec le même pseudo posté?

			if($membre->num_rows >0)
			{
				$msg .=  '<div id="msg">
						<p class="orange">Pseudo déjà utilisé. Veuillez vous connecter à votre compte ou saisir un nouveau pseudo s\'il ne correspond pas au vôtre</p>
						</div>';
				

			}
			
						
			else //........................................................
			{
			
				foreach ($_POST as $key => $value)  // SECURITE / Ici on sécurise les données pour ne pas rentrer des caractères HTML et on empêche le navigateur d'intrepeter du code à la place du texte. On nettoie/purge toutes les entrées.
				{
					$_POST[$key] = htmlentities($value, ENT_QUOTES);
					// ex: 1er tour de boucle = $_POST[$pseudo] = htmlentities('TOTO', ENT_QUOTES); toto est filtré.
					// Pour le MDP, on peut crypter le mot de passe avec MD5 au lieu de htmlentities
				}
				
				
				
						//*****************************************************************************************
		
					$NAISSANCE = dateConvertFrEn($_POST['naissance']);
					$result_age = age($NAISSANCE);
					
					//Execution de la requête
					execute_requete("INSERT INTO membre
					(pseudo, mdp, nom, prenom, email, sexe, ville, cp, adresse, naissance, telephone, statut) 
					VALUES 
					('$_POST[pseudo]', '$_POST[mdp]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', '$_POST[sexe]', '$_POST[ville]', '$_POST[cp]', '$_POST[adresse]', '$NAISSANCE', '$_POST[telephone]', 0) ");
					
					//*****************************************************************************************
					
					$serveur = $_SERVER['HTTP_REFERER'];
					$serveur2 = RACINE_SITE."panier.php";
						
					if($serveur = $serveur2){
							
							header ("location:panier.php" );
							
						}else{		
						
							header("location:profil.php");
		
						};
					
					//*****************************************************************************************
										
					//Puis affichage d'un message de réussite
					$msg.= '<div id="msg">
						<p class="vert">Félicitations! Vous venez de créer votre compte.</p>
						</div>';
					
					
			} // Fin du else ...................................................
		
		

		} // Fin de if (empty($msg))
		
//**********************************************************************		
		
} // Fin de la condition if(isset($_POST['inscription']))
	
	
//**********************************************************************	
	
	
	
	
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");
	
//**************** FIL D'ARIANE ************************* -->	


   get_fil_ariane(array(
   'final' => 'Inscription'
   ));
	

					
			
//****************** MESSAGE ************************* -->	
			
					echo $msg;
						
?>							

<!-- **************************************************************************************** -->	
<!--  									DEUXIEME COLONNE									  -->	
<!-- **************************************************************************************** -->	
						
				
				<div id="colonne-unique" class="colonne2"> <!-- début colonne 2-->	
				
						
					<div class="titre_h2 largeur_article"><h2>INSCRIPTION</h2></div>
					
					 <form class="formulaire" method="post" action=""> 
						<p> Déjà membre ? <a href="<?php echo RACINE_SITE ?>connexion.php">Connectez-vous</a><p>
						
						
						<label for="pseudo">Votre nom d'utilisateur <span>*</span></label><br />
						<input type="text" id="pseudo" name="pseudo"   maxlength="14" placeholder="3 caractères min" value="<?php if(isset($_POST['inscription'])) {echo $_POST['pseudo'];}?>"/><br /> 
						
						<label for="mdp">Votre mot de passe<span>*</span></label><br />
						<input type="password" id="mdp" name="mdp"   maxlength="14" placeholder="3 caractères min" value="<?php if(isset($_POST['inscription'])) {echo $_POST['mdp'];}?>"/>						
						<input type="password" id="mdp2" name="mdp2"   maxlength="14" placeholder=" Veuillez re-saisir votre mot de passe" value="<?php if(isset($_POST['inscription'])) {echo $_POST['mdp2'];}?>"/><br />
						
						<label for="prenom">Votre nom et prénom <span>*</span></label><br />
						<input type="text" id="prenom" name="prenom"   maxlength="14" placeholder=" Votre prénom" value="<?php if(isset($_POST['inscription'])) {echo $_POST['prenom'];}?>"/>
						<input type="text" id="nom" name="nom"   maxlength="14" placeholder=" Votre nom" value="<?php if(isset($_POST['inscription'])) {echo $_POST['nom'];}?>"/><br /> 
						
				
						<label for="email">Votre email <span>*</span></label><br />
						<input type="text" id="email" name="email"   maxlength="30" placeholder="Saisir une adresse mail valide" value="<?php if(isset($_POST['inscription'])) {echo $_POST['email'];}?>"/><br /> 
					 
						<label for="telephone">Votre numéro de téléphone</label><br />
						<input type="text" id="telephone" name="telephone"   maxlength="10" placeholder="10 chiffres" value="<?php if(isset($_POST['inscription'])) {echo $_POST['telephone'];}?>"/><br /> 
					 	
						<label for="naissance">Date de naissance</label><br />
						<input type="text" id="naissance" name="naissance"   maxlength="10" placeholder="JJ/MM/AAAA" value="<?php if(isset($_POST['inscription'])) {echo $_POST['naissance'];}?>"/>
						<?php if(isset($_POST['inscription'])) {echo '<input type="text" name="age"   readonly value="'.$result_age.'"/>';}?>					
						<br /> 						

						
						<label for="sexe">Sexe*</label>
									<input class="radio" type="radio" name="sexe" value="m" 
											<?php if(isset($_POST['inscription'])&& $_POST['sexe']=="m") 
												echo "checked";
											elseif (!isset($_POST['inscription']))
												echo "checked";?> 
									/>Homme
									<input class="radio" type="radio" name="sexe" value="f" 
											<?php if(isset($_POST['inscription'])&& $_POST['sexe']=="f") 
												echo "checked";?> 
									/>Femme
											<br />
							
							<label for="ville">Votre adresse</label><br />
							<input type="text" id="cp" name="cp" placeholder=" Votre code postal" value="<?php if(isset($_POST['inscription'])) {echo $_POST['cp'];}?>"/>
								<input type="text" id="ville" name="ville" placeholder=" Votre ville" value="<?php if(isset($_POST['inscription'])) {echo $_POST['ville'];}?>" /><br />
							
								<textarea id="adresse" name="adresse" placeholder=" Votre adresse et autres détails (Bat, Etage, Résidence...)"><?php if(isset($_POST['adresse'])) {echo $_POST['adresse'];}?></textarea>
								<br />
								
						<!-- Adresse de livraison -->
						<?php
						//echo $_SERVER['HTTP_REFERER'] ;
						//echo RACINE_SITE."panier.php" ;
						
						if($_SERVER['HTTP_REFERER'] == RACINE_SITE."panier.php")
						{
							$membre = execute_requete("SELECT * FROM membre WHERE id_membre = '".$_SESSION['utilisateur']['id_membre']."'");
							$membre_connecte = $membre->fetch_assoc();
						?>	
				
			
							<label for="ville">Adresse de livraison (*modifier si différente)</label><br />
								<input type="text" id="cp2" name="cp2" placeholder=" Votre code postal" value="<?php echo $membre_connecte['cp']?>"/><br />
								<input type="text" id="ville2" name="ville2" placeholder=" Votre ville" value="<?php echo $membre_connecte['ville']?>" /><br />
								<textarea id="adresse2" name="adresse2" placeholder=" Votre adresse et autres détails (Bat, Etage, Résidence...)"><?php echo $membre_connecte['adresse']?></textarea>
								<br />
						<?php
						};
						?>		
						<!-- Fin Adresse de livraison -->
						
								
								
							<p>En cliquant sur Créer un compte, j’accepte les <a href="#">Conditions d’utilisation</a> et la <a href="#">Déclaration sur la confidentialité et les cookies</a>.</p>
						<br />
						 <input type="submit" name="inscription" value="CREEZ VOTRE COMPTE"/>  
						<p>* tous les champs sont obligatoires</p>
                    </form>
					
					<div class="right">
					<img src="image/inscription.jpg" alt="ordinateurs dans une salle informatique"/>
					<h3>Votre compte</h3>
					<p>Inscrivez-vous gratuitement et demandez votre carte de fidélité.
						Votre carte vous permettra de collecter de nombreux points de fidélité qui vous donneront accès à des réductions très avantageuses.</p>
					</div>
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
			
<?php
	include("inc/footer_inc.php");
?>
