<?php session_start();
	include_once "../defines.php";
	require_once('../classes/BD.class.php');
	BD::conn();
	
	?>
<html>
    <head>
        <title>Owl slider</title>
    </head>
    
    <link rel="stylesheet" href="owl.carousel.css"/>
    <link rel="stylesheet" href="owl.theme.css"/>
    <link rel="stylesheet" href="owl.transitions.css"/>
    
    <style>
        *{
            margin: 0;
            padding: 0;
        }
#owl-demo .item img{
    display: block;
    width: 100%;
    height: 500px;
}
        .slider-caption {
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    background: rgba(255 , 255 , 255 , .60);
}
.slider-text {
    width: 100%;
    height: 100%;
    padding: 275px 0 0 0;
}
.slider-text p{
    font-size: 14px;
    color: #000;
    text-transform: uppercase;
    letter-spacing: 10px;
}
.slider-caption-heder{
    width: 100%;
    height: auto;
    padding: 40px 0;
}
.slider-caption-heder h1 {
    font-size: 56px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 10px;
    word-spacing: 10px;
}
.slider-caption-heder h1 span {color: #A78E6C;}
    </style>
    
    <body>
<div id="owl-demo" class="owl-carousel owl-theme">
<?php
				$pegaUsuarios = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE `foto` != ''");
				$pegaUsuarios->execute(array($_SESSION['id_user']));
				while($row = $pegaUsuarios->fetch()){
					$foto = $row['foto'];
					
			?>
<div class="item">
<img src="../fotos/<?php echo $foto;?>" width="500" height="400" alt="The Last of us">
</div>
<?php } ?>

</div>
        
        
        
        
        
        
        <script src="jquery_library2.js"></script>
        <script src="owl.carousel.min.js"></script>
        <script>
            $(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay: true,
      autoPlay: 3000,
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});
        </script>
    </body>
</html>