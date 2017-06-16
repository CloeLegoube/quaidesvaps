<!DOCTYPE html>
<html> 
	<head>
		<title>Quai des Vaps, Boutique de Cigarettes Electronique située à Courbevoie à deux pas de la gare de Bécon-Les-Bruyères</title>
		<meta charset="utf-8">
		<?php		
				// --------------------------- Création de la requête fiche produit ---------------------------------------
			
			if(isset($_GET['id'])) // Est-ce qu'il y a bien un ID renseigné dans l'URL
			{
			
				$resultat = execute_requete("SELECT * 
					FROM produit p, promotion c
					WHERE p.id_produit = ".$_GET['id']."
					AND	(c.id_promo = p.id_promo	
					OR p.id_promo IS NULL)
					GROUP BY  p.id_produit");
			
					// On fait une requête de selection pour aller chercher les infos dU produit en fonction de l'ID de l'URL

			//debug($resultat);
			
			$produit = $resultat->fetch_assoc();
			
				
		?>		
				<meta property="fb:app_id"          content="1234567890" /> 
				<meta property="og:type"            content="article" /> 
				<meta property="og:url"             content="<?php echo RACINE_SITE ?>fiche-produit.php?id=<?php echo $_GET['id'] ?>&page=1" /> 
				<meta property="og:title"           content="<?php echo $produit['titre'] ?> - <?php echo $produit['prix'] ?>€ TTC (vendu par Quaidesvaps.fr)" /> 
				<meta property="og:image"           content="<?php echo RACINE_SITE ?><?php echo $produit['photo'] ?>" /> 
				<meta property="og:description"    content="<?php echo $produit['descriptif'] ?>" />
				
		<?php

			}
		?>
		<script type='text/javascript' src="<?php echo RACINE_SITE ?>inc/jquery-1.11.1.js"></script>
			<script src="/code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
			<script src="<?php echo RACINE_SITE ?>inc/jquery.datetimepicker.js"></script>
			<script src="<?php echo RACINE_SITE ?>javascript/javascript.js" type="text/javascript"></script>
		
		<!-- Les feuilles de styles CSS -->
		
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/structure.css" />
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/header.css" />
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/footer.css" />
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/aside.css" />
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/generale.css" />
		<link  rel="stylesheet" href="<?php echo RACINE_SITE ?>styles/responsive.css" />
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo RACINE_SITE ?>inc/jquery.datetimepicker.css"/>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Marck+Script' rel='stylesheet' type='text/css'>
		
		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="<?php echo RACINE_SITE ?>inc/magnific-popup/magnific-popup.css"> 

		<!-- Magnific Popup core JS file -->
		<script src="<?php echo RACINE_SITE ?>inc/magnific-popup/jquery.magnific-popup.js"></script>

		
		<!-- Pop up MAP -->
        <script type="text/javascript">
                
                        function open_infos()
                        {
                                width = 800;
                                height = 600;
                                if(window.innerWidth)
                                {
                                        var left = (window.innerWidth-width)/2;
                                        var top = (window.innerHeight-height)/2;
                                }
                                else
                                {
                                        var left = (document.body.clientWidth-width)/2;
                                        var top = (document.body.clientHeight-height)/2;
                                }
                                window.open('map.html','nom_de_ma_popup','menubar=no, scrollbars=no, top='+top+', left='+left+', width='+width+', height='+height+'');
                        }
         
		 <!--   Zoom sur image fiche produit    -->
   
		
		$(document).ready(function() {

	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});

	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

});
	      </script>		
		
	</head>
	<body>
	
	
	<!-- Facebook -->
	<div id="fb-root"></div>

	<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.3";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<!-- Fin Facebook -->
		
		
		
		
		<div id="page"><!-- debut page -->
