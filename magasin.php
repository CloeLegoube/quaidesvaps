<?php
	include("inc/init_inc.php");
	
	
//**********************************************************************************************************	
//                         		  ENVOI D'UN MAIL
//**********************************************************************************************************	

	if(isset($_POST['contact'])) // S'il y a clic sur bouton contact
	{
		
		//** EMAIL *************************************	
			
		$verif_caractere_email = preg_match('#^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})+$#' , $_POST['email']);
				
		if(!$verif_caractere_email)
		{
			$msg .=  '<div id="msg">
						<p class="orange">Veuillez rentrer une adresse email valide</p>
						</div>';
		}else{

				$mail = 'cloe.legoube@gmail.com'; // Déclaration de l'adresse de destination. contact@quaidesvaps.fr
				if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
				{
					$passage_ligne = "\r\n";
				}
				else
				{
					$passage_ligne = "\n";
				}
				//=====Déclaration des messages au format texte et au format HTML.
				$message_txt = $_POST['message'];
				$message_html = $_POST['message'];
				//==========
				 
				//=====Création de la boundary
				$boundary = "-----=".md5(rand());
				//==========
				 
				//=====Définition du sujet.
				$sujet = $_POST['sujet'];
				//=========
				
				$expediteur = "<".$_POST['email'].">";
				$nom_expediteur = $_POST['nom'];
				
				//=====Création du header de l'e-mail.
				$header = "From: \"$nom_expediteur\"<$expediteur>".$passage_ligne;
				$header .= "Reply-to: \"$nom_expediteur\" <$expediteur>".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				//==========
				 
				//=====Création du message.
				$message = $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format texte.
				$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_txt.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary.$passage_ligne;
				//=====Ajout du message au format HTML
				$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
				$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
				$message.= $passage_ligne.$message_html.$passage_ligne;
				//==========
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
				//==========
				 
				//=====Envoi de l'e-mail.
				mail($mail,$sujet,$message,$header);
				//==========
				
				$msg .= '<div id="msg">
						<p class="vert">Merci pour votre message, nous reviendrons vers vous dans les meilleurs délais</p>
						</div>';
			
		
			};
	};

	
	
	$nav_en_cours = 'page_magasin'; 
	
	include("inc/haut_de_site_inc.php");
	include("inc/top_menu_inc.php");
	include("inc/menu_inc.php");
	
	
//**************** FIL D'ARIANE ************************* -->	
	

   get_fil_ariane(array(
   'final' => 'Visitez notre magasin'
   ));
?>

					
			
<!-- **************** SLIDER INDEX ************************* -->	
			
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


			
			
<!-- **************** MESSAGE ************************* -->	
			
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
						
				
				<div id="magasin" class="colonne2"> <!-- début colonne 2-->	
				
					<div class="titre_h2 largeur_article"><h2>VOTRE MAGASIN</h2></div>
					
					
					
					<!-- **************** SLIDER INDEX ************************* -->	
			
					<div id="slider"><!-- début slider -->
							<div class="slider_zone">
							<div class="slider_zone_image">

					
								        <div id="caroussel">
										<div class="carousselConteneur">
											<ul>
												<li class="slide">
													<img class="slider_image" src="<?php echo RACINE_SITE ?>images/magasin/magasin1.jpg" alt="Magasin quai des vaps" />
												</li>
												<li class="slide">
													<img class="slider_image" src="<?php echo RACINE_SITE ?>images/magasin/magasin2.jpg" alt="Magasin quai des vaps" />
												</li>
												<li class="slide">
													<img class="slider_image" src="<?php echo RACINE_SITE ?>images/magasin/magasin3.jpg" alt="Magasin quai des vaps" />
												</li>
												<li class="slide">
													<div class="slider_image">
														<img  src="<?php echo RACINE_SITE ?>images/magasin/magasin4.jpg" alt="Magasin quai des vaps" />
													</div> 
												</li>
												<li class="slide">
													<img class="slider_image" src="<?php echo RACINE_SITE ?>images/magasin/magasin5.jpg" alt="Magasin quai des vaps" />
												</li>
												<li class="slide">
													<img class="slider_image" src="<?php echo RACINE_SITE ?>images/magasin/adresse.jpg" alt="Magasin quai des vaps" />
												</li>
											</ul>
										</div>
									</div>
								
								
								
								
								
								
							</div>
						
						</div>
					</div><!-- fin slider --> 
					
					

	
						
					<div class="titre_h2 largeur_article"><h2>CONTACTEZ-NOUS</h2></div>
					
					 <form class="formulaire" method="post" action=""> 
						
						<label for="nom">Votre nom <span>*</span></label><br />
						<input type="text" id="nom" name="nom"   maxlength="14" placeholder="nom" value="<?php if(isset($_POST['contact'])) {echo $_POST['nom'];}?>"/><br /> 
						
						<label for="email">Votre email <span>*</span></label><br />
						<input type="text" id="email" name="email"   maxlength="14" placeholder="email" value="<?php if(isset($_POST['contact'])) {echo $_POST['email'];}?>"/><br /> 
					 
					 
                        <label for="sujet">Sujet <span>*</span></label><br />
						<input type="text" id="sujet" name="sujet"   maxlength="14" placeholder="sujet" value="<?php if(isset($_POST['contact'])) {echo $_POST['sujet'];}?>"/><br /> 
						
						<div class="right">
						<label for="message">Votre message <span>*</span></label><br />
						<textarea id="message" name="message" placeholder="message"><?php if(isset($_POST['contact'])) {echo $_POST['message'];}?></textarea>
						<br />
						 <input type="submit" name="contact" value="ENVOYEZ"/>  
						<p>* tous les champs sont obligatoires</p>
						</div>
						
						<div class="left coordonnees">
						<h3>Retrouvez-nous</h3>
						<p>Quai des Vaps</p>
						<p>3 ter, rue des Madiraa</p>
						<p>92 400 COURBEVOIE</p>
						<p>Email : <span>contact@quaidesvaps.fr</span></p>
						<p>Tel : 01 41 16 92 12</p>
						</div>
					
                    </form>
					<div class='clear'></div>
					<div class="titre_h2 largeur_article"><h2>PLAN D'ACCES</h2></div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d20979.90217767996!2d2.2694546!3d48.9060984!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6659ad1894c63%3A0x536d10b5f1f4a8a7!2s3+Rue+Madiraa%2C+92400+Courbevoie!5e0!3m2!1sfr!2sfr!4v1432634411293" width="600" height="450" frameborder="0" style="border:0"></iframe>
					
					
				</div> <!-- fin COLONNE 2 ......................... -->	
				
			</div><!-- Fin de principale............................ -->	
		
			
<?php
	include("inc/footer_inc.php");
?>
