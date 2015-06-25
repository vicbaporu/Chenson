<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chenson Back to school 2015</title>
<link rel="stylesheet" href="css/bootstrap.css" />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style_600px.css" rel='stylesheet' media="(max-width:640px)" type='text/css' />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/buscador.js"></script>



<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

<script type="text/javascript" charset="utf-8">
			$(function(){
				$('#Filtro li a').click(function(event){
					var elem = $(this).next();
					if(elem.is('ul')){
						event.preventDefault();
						$('#Filtro ul:visible').not(elem).slideUp();
						elem.slideToggle();
					}
				});
			});
		</script>
</head>
	
<body onload="MM_preloadImages('Producto/Atras.jpg')">
	<br /><br /><br /><br /><br />
  <?php include_once('secciones/menuAfuera.php'); ?>	

  <!-- Sección que trabaja en la obtención de los filtros correctos -->
  <?php include ('filtros.php'); ?>
    	<!--global minds-->
              <br>
              <br><br>

    <!--Termina global minds-->
    <!--Columna filtro-->
    	
  <?php 
    //Sacar las variables para los filtros
    $target   = $_REQUEST['target'];
    $genero   = $_REQUEST['genero'];
    $cuerpo   = $_REQUEST['cuerpo'];

    //Filtros de la izquierda
    $licencia = $_REQUEST['licencia'];
    $linea    = $_REQUEST['linea'];
    $color    = $_REQUEST['color'];


   ?>
  <?php $licencias   = getLicencia($target,$genero,$cuerpo); ?>

  <?php $lineas      = getLinea($target,$genero,$cuerpo); ?>

  <?php $colores     = getColor($target,$genero,$cuerpo); ?>
  

<?php 

  
 ?>
     	<div id="ColFiltro">
      <br /><br /><br />
        	<p class="HeaderPie">Filtrar por:</p>
        	<ul id="Filtro">
                <li><a href="#">Licencia</a>
                    <ul>
                      <?php while($reg=mysqli_fetch_array($licencias))
                      {?>
                        <li><a href="galeria.php?target=<?php echo $target ?>&genero=<?php echo $genero ?>&cuerpo=<?php echo $cuerpo ?>&licencia=<?php echo $reg['marca'] ?>&linea=&color="><?php echo $reg['marca']; ?></a></li>
                        <?php 
                      } ?>
                    </ul>
                </li>
                <li><a href="#">Línea</a>
                    <ul>
                        <?php while($reg=mysqli_fetch_array($lineas))
                        {?>
                          <li><a href="galeria.php?target=<?php echo $target ?>&genero=<?php echo $genero ?>&cuerpo=<?php echo $cuerpo ?>&licencia=&linea=<?php echo $reg['linea'] ?>&color="><?php echo $reg['linea']; ?></a></li>
                          <?php 
                        } ?>
                        
                    </ul>
                </li>
                <li><a href="#">Color</a>
                    <ul>
                        <?php while($reg=mysqli_fetch_array($colores))
                        {?>
                          <li><a href="galeria.php?target=<?php echo $target ?>&genero=<?php echo $genero ?>&cuerpo=<?php echo $cuerpo ?>&licencia=&linea=&color=<?php echo $reg['color'] ?>"><?php echo $reg['color']; ?></a></li>
                          <?php 
                        } ?>
                    </ul>
                </li>
                
            </ul>
        </div>
     <!--Termina Columna filtro-->
     <!--Inicia Galeria de productos--> 
     
     
    
    <?php 
    if (isset($_POST['busqueda']))
      $busqueda = $_POST['busqueda'];
    else
      $busqueda = '';

     ?>

      <iframe   name="iframeproductos" id="iframeproductos" src="producto.php?&target=<?php echo $target;?>&genero=<?php echo $genero;?>&cuerpo=<?php echo $cuerpo;if(isset($_REQUEST['pagina'])){ echo "&pagina=".$_REQUEST['pagina'];}?>&licencia=<?php echo $licencia ?>&linea=<?php echo $linea ?>&color=<?php echo $color?>&busqueda=<?php echo $busqueda ?>" class="frame" frameborder="0" >Texto para cuando el navegador no conoce la etiqueta iframe</iframe> 

   	
     <!--Termina Galeria de productos-->
     
     <?php include_once('secciones/pie.php'); ?>

</body>
</html>
