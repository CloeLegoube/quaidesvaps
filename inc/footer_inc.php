
		
<!-- ****************************************FOOTER******************************************** -->				
			
			<footer>
			
				<div id="footer_box">
				
	<!-- ******* BOITE 1 : ADRESSE ******* -->			
					<div class="footer_bloc_bloc" >
								<div class="footer_bloc">
									<h5>VENIR NOUS VOIR</h5>
									<ul>
										<li>Quai des Vaps</li>
										<li>3 ter, rue des Madiraa</li>
										<li>92 400 COURBEVOIE</li>
										<li>01 41 16 92 12</li><br />
										<li><a href="#" onclick="javascript:open_infos();">PLAN D'ACCES</a></li>
									</ul>
								</div>
							
				<!-- ******* BOITE 2 : HORAIRES ******* -->			
								
								
								<div class="footer_bloc" >
								<h5>HORAIRES D'OUVERTURE</h5><table>
										<tr>
											<td>LUNDI</td>
											<td>Fermé</td>
											<td>15h00 - 19h30</td>
										</tr>
										<tr>
											<td>MARDI</td>
											<td>09h30 - 13h00</td>
											<td>15h00 - 17h00</td>
										</tr>
										<tr>
											<td>MERCREDI</td>
											<td>09h30 - 13h00</td>
											<td>15h00 - 19h30</td>
										</tr>
										<tr>
											<td>JEUDI</td>
											<td>09h30 - 13h00</td>
											<td>15h00 - 19h30</td>
										</tr>
										<tr>
											<td>VENDREDI</td>
											<td>09h30 - 13h00</td>
											<td>15h00 - 19h30</td>
										</tr>
										<tr>
											<td>SAMEDI</td>
											<td>09h30 - 13h00</td>
											<td>15h00 - 19h30</td>
										</tr>
										<tr>
											<td>DIMANCHE</td>
											<td>10h00 - 13h00</td>
											<td>Fermé</td>
										</tr>
									</table>
								</div>
								
								
				<!-- ******* BOITE 3 : PHOTO ******* -->			
								<div class="footer_bloc">
								<div class="footer_photo">
								<p><a href=""><img src="<?php echo RACINE_SITE ?>image/boutique_footer.jpg" alt="photo de la boutique Quai des Vaps" /></a></p>
								</div>
								</div>

				<!-- ******* BOITE 4 : SITEMAP ******* -->			
								
								<div class="footer_bloc">
									<h5>SITEMAP</h5>
									<ul>
										<li><a href="<?php echo RACINE_SITE ?>index.php">Accueil</a></li>
										<li><a href="<?php echo RACINE_SITE ?>boutique.php?cat=E-cigarettes">E-cigarettes</a></li>
										<li><a href="<?php echo RACINE_SITE ?>boutique.php?cat=E-liquides">E-liquides</a></li>
										<li><a href="<?php echo RACINE_SITE ?>boutique.php?cat=Accessoires">Accessoires</a></li>
										<li><a href="<?php echo RACINE_SITE ?>magasin.php">Votre magasin</a></li>
										<li><a href="<?php echo RACINE_SITE ?>recherche.php">Recherche</a></li>
										<li><a href="<?php echo RACINE_SITE ?>promotions.php">Promotions</a></li>
										<li><a href="<?php echo RACINE_SITE ?>blog.php">Le blog</a></li>
										<li><a href="<?php echo RACINE_SITE ?>connexion.php">Se connecter</a></li>
										<li><a href="<?php echo RACINE_SITE ?>mdpperdu.php">Mot de passe oublié</a></li>
									</ul>
								</div>				
							
				<!-- ******* BOITE 5 : INFORMATIONS ******* -->			
								
								<div class="footer_bloc">
								
									<div class="footer_sous_bloc">
										<h5>INFORMATIONS</h5>
										<ul>
											<li><a href="<?php echo RACINE_SITE ?>mentions-legales.php">Mentions Légales</a></li>
											<li><a href="<?php echo RACINE_SITE ?>paiements-securises.php">Paiements sécurisés</a></li>
											<li><a href="<?php echo RACINE_SITE ?>conditions-generales-de-vente.php">Conditions Générales de Vente</a></li>
											<li><a href="<?php echo RACINE_SITE ?>politique-de-confidentialite.php">Politique de confidentialité</a></li>
										</ul>
									</div>				
										
				<!-- ******* BOITE 6 : MON COMPTE ******* -->			
								
									<div class="footer_sous_bloc">
										<h5>MON COMPTE</h5>
										<ul>
											<li><a href="<?php echo RACINE_SITE ?>profil.php">Mes commandes</a></li>
											<li><a href="<?php echo RACINE_SITE ?>panier.php">Mon panier</a></li>
											<li><a href="<?php echo RACINE_SITE ?>profil.php">Mes coordonnées</a></li>
											<li><a href="<?php echo RACINE_SITE ?>profil.php">Mes avoirs</a></li>
										</ul>
									</div>				
										
									
				<!-- ******* BOITE 7 : INPUT NEWSLETTER ******* -->
						
									
				





<?php							
//**********************************************************************************************************	
//                         				UTILISATEUR NON CONNECTE
//**********************************************************************************************************	
	
	
	if(!utilisateur_est_connecte()) // Dans le cas du visiteur
	{
?>
									<div id="newsletter"><!-- début INPUT -->
				
										<input type="text" placeholder="Entrez votre adresse mail..."/>
										<a onclick="mafonction()" id="header_inscrire_newsletter" href='#'>S'inscrire à la Newsletter</a></p>
										
									</div><!-- fin INPUT -->
		
											
		<script> 
			function mafonction(){ 
			var valeur_sasie=prompt("Veuillez saisir votre adresse mail pour recevoir la newsletter tous les mois","email@site.fr"); 
			location.href = './newsletter.php?valeur='+valeur_sasie;
			} 
		</script> 			


						
						
<?php 
	}														
//**********************************************************************************************************	
//                         				UTILISATEUR CONNECTE ET NON ADMIN
//**********************************************************************************************************	
	
	
	if(utilisateur_est_connecte()) // Dans le cas de l'utilisateur connecté (membre)
	{
						$selection_membre = 
						execute_requete ("SELECT * 
						FROM membre m, newsletter n
						WHERE m.id_membre ='".$_SESSION['utilisateur']['id_membre']."'
						AND m.id_membre = n.id_membre");
						$membre = $selection_membre -> fetch_assoc ();
						//debug($membre);		

					
						if(empty($membre['id_newsletter'])) {
	?>						
							
									<div id="newsletter"><!-- début INPUT -->
				
										<input type="text" placeholder="<?php echo $membre['email']; ?>"/>
										<a onclick="mafonction2()" id="header_inscrire_newsletter" href='#'>S'inscrire à la Newsletter</a></p>
										
									</div><!-- fin INPUT -->
							
	<?php						
						}
	?>
						
						<script> 
						function mafonction2(){ 
							var email = '<?php echo $membre['email']; ?>' ; 
							if (window.confirm('Voulez-vous recevoir la newsletter à cette adresse :'+email +'?')) 
							{
								location.href = './newsletter.php?valeur='+email;
								return true;
							} 
						else 
							{
								var valeur_sasie=prompt("Saisir une autre adresse","Nouvelle adresse mail"); 
								location.href = './newsletter.php?valeur='+valeur_sasie;
								return false;
							};
						} 
						
						
						
						</script> 	

<?php
	}
?>	








									
								</div><!-- fin du footer_bloc -->
					
					
					</div><!-- fin du footer_bloc_bloc -->
									
	<!-- ******* BOITE 8 : CONTACTEZ NOUS ******* -->

					<!-- MAIL -->
					
					<div class="footer_contact_contact">
								<div class="footer_contact">
									<div class="footer_image">
									<a href=""><img src="<?php echo RACINE_SITE ?>image/icone_mail.png" alt="Icone enveloppe" /></a>
									</div>
									
									<div class="footer_lien_contact">
									<p>PAR MAIL</p>
									<a href="">contact@quaidesvaps.fr</a>
									</div>
								</div>
								
								<!-- FACEBOOK -->
								
								<div class="footer_contact">
									<div class="footer_image">
									<a href="www.facebook.com/quaidesvaps"><img src="<?php echo RACINE_SITE ?>image/icone_facebook.png" alt="Icone facebook" /></a>
									</div>
									
									<div class="footer_lien_contact">
									<p>SUR FACEBOOK</p>
									<a href="">www.facebook.com/quaidesvaps</a>
									</div>
								</div>
								
								<!-- TWITTER -->
								
								<div class="footer_contact">
									<div class="footer_image twitter">
									<a href="www.twitter.com"><img src="<?php echo RACINE_SITE ?>image/icone_twitter.png" alt="Icone twitter" /></a>
									</div>
									
									<div class="footer_lien_contact">
									<p>SUR TWITTER</p>
									<a href="">www.twitter.com</a>
									</div>
								</div>
					</div><!-- Fin de footer_contact_contact -->
				
				
				</div> <!-- Fin de footer_box -->

<!-- ******* FOOTER_BAR ******* -->
				
				<div id="footer_bar">
				
					<p>QUAI DES VAPS - S.A.R.L - 3 ter, rue des Madiraa, 92400 COURBEVOIE  |  Copyright  ©  2015  |  Hébergeur o2switch | <a href="http://www.cloelegoube.com">Cloé LEGOUBE</a> pour <a href="http://www.yeloweb.fr">YELOWEB</a></p>
				
				</div>
				
			</footer><!-- Fin de footer-->		
	
		
		</div><!-- Fin de page-->

		
	</body>
</html>