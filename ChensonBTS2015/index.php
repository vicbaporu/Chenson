<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/bootstrap.css" />
<link href="css/style_600px.css" rel='stylesheet' media="(max-width:640px)" type='text/css' />
<!--Categorias-->
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    $(document).ready(function(){
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function(e){
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function(e){
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function(){
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function(){
                $(this).removeClass("hover");
            });
        }
    });
</script>
<!--Termina categorias-->
<!--Slider-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<!--Termina slider-->

<title>Chenson Back to school 2015</title>
</head>

<body>
	
    
<?php include_once('secciones/menuafuera.php'); ?>
<br /><br /><br /><br /><br /><br /><br />   
    <!--Slider-->
    <div class="flex-container">
        <div class="flexslider">
            <ul class="slides">
                <li>
                    <a href="#"><img src="img/Limitada.jpg" /></a>
                </li>
                
                <li>
                    <img src="img/Pescando.jpg" />
                </li>
                <li>
                    <img src="img/Gru.jpg" />
                    <p>Algún texto mafufo</p>
                </li>
            </ul>
        </div>
	</div>

<script>
$(document).ready(function () {
	$('.flexslider').flexslider({
		animation: 'fade',
		controlsContainer: '.flexslider'
	});
});
</script>
 <!--Termina Slider-->
 <br /><br /><br />
 <!--Inicia Categorias-->
 <div id="Categorias">
        	<div class="Categorias">
            	<div id="effect-6" class="effects clearfix"	>
                	<div class="img">
                		<img src="img/nino.jpg" width="100%" />
                        <div class="overlay">
                    <a href="galeria.php?target=preescolar" class="expand"><img src="img/Iconos/Kinder.png" width="80%" /></a>
                    <a class="close-overlay hidden">x</a>
                </div>
                    </div>    
                </div>
            </div>
            <div class="Categorias">
            	<div id="effect-6" class="effects clearfix"	>
                	<div class="img">
                		<img src="img/nina.jpg" width="100%" />
                    <div class="overlay">
                        <a href="galeria.php?target=primaria" class="expand"><img src="img/Iconos/Primaria.png" width="80%" /></a>
                        <a class="close-overlay hidden">x</a>
               		 </div>
                    </div>    
                </div>
            </div>
            <div class="Categorias">
            	<div id="effect-6" class="effects clearfix"	>
                	<div class="img">
            			<img src="img/teenhombre.jpg" width="100%" />
                    <div class="overlay">
                        <a href="galeria.php?target=teens" class="expand"><img src="img/Iconos/Teens.png" width="80%" /></a>
                        <a class="close-overlay hidden">x</a>
               		 </div>
                    </div>       
        		</div>
        	</div>  
            <div class="Categorias">
            	<div id="effect-6" class="effects clearfix"	>
                	<div class="img">
            			<img src="img/teenchava.jpg" width="100%" />
                    <div class="overlay">
                        <a href="galeria.php?target=otros" class="expand"><img src="img/Iconos/kinder.png" width="100%" /></a>
                        <a class="close-overlay hidden">x</a>
               		 </div>
                    </div>       
        		</div>
        	</div>  
		</div>
 <!--Termina Categorias-->
 <!--Inicia destacados-->
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 		<div class="mapa">
        	<!--Mapa-->
            <div id="map" style="width:445px; height:400px;"></div>
            <script src="http://maps.google.com/maps/api/js?sensor=false&callback=init"></script>
            <script type="text/javascript">
                var map;
                var marker;
                
                
                function init(){
                    var image = new google.maps.MarkerImage('http://www.chenson.com.mx/1818.png', new google.maps.Size(40,30));
                    var mapOptions = {
                        center: new google.maps.LatLng( 20.644563,-103.332438),
                        zoom: 15,
                        mapTypeId: google.maps.MapTypeId.ROADMAP 
                        }
                        map = new google.maps.Map(document.getElementById("map"),mapOptions);
                        
                        var place = new google.maps.LatLng (20.644563,-103.332438);
                        marker= new google.maps.Marker({
                        position: place,
                        title:"Una sucursal de Chenson",
                        map: map,	
                        icon: image
                            });
                            
                        google.maps.event.addListener(marker,"click",showInfo);	
                }
                        function showInfo() {
                        map.setZoom(16);
                        map.setCenter(marker.getPosition());
                        var infowindow = new google.maps.InfoWindow({
                            content: "Chenson Gigantes y un monton de blablablas"
                        });
                        infowindow.open(map,marker);
                        }
                
                
            </script>
            <!--Termina mapa-->
            
        </div>
 		<div id="Destacado">
        	<p>Producto destacado</p>
        	<img src="img/Producto/Frente.jpg" width="90%" />
        </div>
 <!--Termina destacados-->
 
 <!--Inicia Pie-->
 	<!--Pie de página-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
   <?php include_once('secciones/pie.php'); ?>
</body>
</html>
