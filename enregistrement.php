<?php
include("inc/install.php");
$result_age = "";
if(utilisateur_est_connecte())
{
	header("location:livraison.php");
}
if(isset($_POST['inscription']))
{
	$verif_caractere = preg_match('#^[a-zA-Z0-9._-]+$#' , $_POST['pseudo']);
	if(!$verif_caractere && !empty($_POST['pseudo']))
	{
		$msg .= '<div id="msg">
			<p class="orange">Le pseudo comporte des caractères non autorisés. Les caractères autorisés sont : A à Z et de 0 à 9</p>
			</div>';
	}
	if (strlen($_POST['pseudo'])<3 || strlen($_POST['pseudo'])> 14 )
	{
		$msg .= '<div id="msg">
			<p class="orange">Le pseudo doit avoir entre 4 et 14 caractères inclus</p>
			</div>';
	}
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
	if (empty($msg))
	{
		$membre = execute_requete("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");
		if($membre->num_rows >0)
		{
			$msg .=  '<div id="msg">
				<p class="orange">Pseudo déjà utilisé. Veuillez vous connecter à votre compte ou saisir un nouveau pseudo s\'il ne correspond pas au vôtre</p>
				</div>';
		}
		else
		{
			foreach ($_POST as $key => $value)
			{
				if ($key === "mdp")
				{
					$_POST[$key] = hash("whirlpool", $value);
				}
				else
				{
					$_POST[$key] = htmlentities($value, ENT_QUOTES);
				}
			}
			execute_requete("INSERT INTO membre (pseudo, mdp, statut) VALUES ('$_POST[pseudo]', '$_POST[mdp]', 0) ");
			$msg.= '<div id="msg">
				<p class="vert">Félicitations! Vous venez de créer votre compte.</p>
				</div>';
			header ("location:livraison.php");
		}
	}
}
if(isset($_POST['connexion']))
{
	$selection_membre = execute_requete ("SELECT * FROM membre WHERE pseudo ='$_POST[pseudo]'");
	if($selection_membre->num_rows >0)
	{
		$membre = $selection_membre -> fetch_assoc ();
		if($membre['mdp'] == $_POST['mdp'])
		{
			foreach($membre as $key => $value)
			{
				$_SESSION['utilisateur'][$key] = $value;
			}
			header ("location:livraison.php");
			if (isset($_POST['remember']))
			{
				setcookie ("cookname", $_SESSION['utilisateur']['pseudo']) ;
			}
			if (isset ($_COOKIE['cookname']))
			{
				$_SESSION['utilisateur']['pseudo'] = $_COOKIE ['cookname'];
			}
		}
		else
		{
			$msg .= "<div id='msg'><p class='orange'>Erreur de mot de passe</p></div>";
		}
	}
	else
	{
		$msg .= "<div id='msg'><p class='orange'>Erreur de pseudo</p></div>";
	};
}
include("inc/haut_de_site_inc.php");
include("inc/top_menu_inc.php");
include("inc/menu_inc.php");
get_fil_ariane(array('panier.php' => 'Mon panier', 'final' => 'S\'enregistrer'));
echo $msg;
?>
<div id="colonne-unique" class="colonne2">
	<div class="titre_h2 largeur_article titre-panier"><h2>CONNEXION / INSCRIPTION</h2></div>
	<form class="formulaire enregistrez-vous" method="post" action="">
		<h4>Enregistrez-vous</h4>
		<label for="pseudo">Votre nom d'utilisateur <span>*</span></label><br />
		<input type="text" id="pseudo" name="pseudo"   maxlength="14" placeholder="3 caractères min" value="<?php if(isset($_POST['inscription'])) {echo $_POST['pseudo'];}?>"/><br />
		<label for="mdp">Votre mot de passe<span>*</span></label><br />
		<input type="password" id="mdp" name="mdp"   maxlength="14" placeholder="3 caractères min" value="<?php if(isset($_POST['inscription'])) {echo $_POST['mdp'];}?>"/>
		<input type="password" id="mdp2" name="mdp2"   maxlength="14" placeholder=" Veuillez re-saisir votre mot de passe" value="<?php if(isset($_POST['inscription'])) {echo $_POST['mdp2'];}?>"/><br />
		<p>En cliquant sur Créer un compte, j’accepte les <a href="#">Conditions d’utilisation</a> et la <a href="#">Déclaration sur la confidentialité et les cookies</a>.</p>
		<br />
		 <input type="submit" name="inscription" value="CREEZ VOTRE COMPTE"/>
		<p>* tous les champs sont obligatoires</p>
	</form>
	 <form class="formulaire connectez-vous" method="post" action="">
		<h4>ou Connectez-vous à votre compte</h4>
		<label for="pseudo">Votre nom d'utilisateur</label>
		<input type="text" id="pseudo" name="pseudo"   maxlength="14" placeholder=" Votre nom d'utilisateur" value="<?php if(isset($_POST['pseudo'])) {echo $_POST['pseudo'];}?>"/><br />
		<label for="mdp">Votre mot de passe</label>
		<input type="password" id="mdp" name="mdp"   maxlength="14" placeholder=" Votre mot de passe" value="<?php if(isset($_POST['mdp'])) {echo $_POST['mdp'];}?>"/><br />
		<input type="checkbox" id="remember" name="remember" placeholder="" value="<?php if(isset($_POST['remember'])) {echo $_POST['remember'];}?>"/>	<label for="remember">Se souvenir de moi</label>
		<p><a href="<?php echo RACINE_SITE ?>mot-de-passe.php">Mot de passe oublié ?</a></p>
		<br />
		<input type="submit" name="connexion" value="SE CONNECTER"/>
	</form>
	</div>
</div>
