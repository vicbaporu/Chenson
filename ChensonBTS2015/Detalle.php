<?php 
include("conexion.php");

$sku    = $_REQUEST['sku'];

$query  = "select * from chenson_bts_2015 where sku='" . $sku . "'";
$datos  =  mysqli_query($conexion,$query) or die("Problemas al filtrar sus resultados:".mysql_error());

//print_r($datos);

$reg = mysqli_fetch_array($datos);

?> 





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Chenson Back to school 2015</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style_600px.css" rel='stylesheet' media="(max-width:640px)" type='text/css' />
<!--Menu responsivo-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/responsee.js"></script>
<!--Termina Menu responsivo-->  
<script src="js/jquery-1.11.0.min.js"></script>

<!--hover amarillo-->
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/hover_pack.js"></script>
<!--Terminahover amarillo-->

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
        <!--Salto de ancla-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script>
			
			$(function() {
			  $('a[href*=#]:not([href=#])').click(function() {
				if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		
				  var target = $(this.hash);
				  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				  if (target.length) {
					$('html,body').animate({
					  scrollTop: target.offset().top
					}, 1000);
					return false;
				  }
				}
			  });
			});
			
		</script>
		
         <!--Salto de ancla-->
</head>
	
<body onload="MM_preloadImages('Producto/Atras.jpg')">
	<br /><br /><br /><br /><br />
<?php include_once('secciones/menuAfuera.php'); ?>	
	<br /><br /><br /><br />
   
     <!--Producto-->
     <div id="Descripcion">
     	<img src="img/Licencias/smb.png" class="logoDesc" />
     	<p class="coleccion"><?php echo $reg['Coleccion'] ?></p>
        <p class="sku"><?php echo $reg['Sku'] ?></p>
        <p class="sku">$<?php echo $reg['Precio'] ?></p>
             <div class="DescLarga">
     			<p align="justify"><?php echo $reg['DescripcionLarga'] ?>
                </p>
                <br />
               <p class="proporcion">Proporción:</p> 
               <br />
              <img src="img/Iconos/Mochila-grande-nino.png" width="10%" class="proporcion" />  
              <br /><br /><br /><br /><br />
              <div class="relacionados">
              <p class="">Más de esta colección:</p>
              	<img src="img/Producto/ch50147-3.jpg" width="20%" />
                <img src="img/Producto/ch34105-3.jpg" width="20%" />
                <img src="img/Producto/ch50136-3.jpg" width="20%" />
                <img src="img/Producto/co59586-3.jpg" width="20%" />
              </div>
     			</div>
		<br /><br />
        
     </div>
     <a href="#">
        	<div id='content' class="AgregarCarrito">
            	<P>Añadir al carrito</P>
            </div>
       	</a>
     <div id="Miniaturas">
     <table width="8%" class="tablamin">
     	<tr class="miniaturas">
          	<td class="miniaturas"><img src="img/Producto/Frente.jpg" width="70%" name="frente"  OnMouseOver="preview.src=frente.src" /></td>
        </tr>
        <tr>
            <td class="miniaturas"><img src="img/Producto/Atras.jpg" width="70%" name="Atras"  OnMouseOver="preview.src=Atras.src" /></td>
        </tr>
        <tr>
            <td class="miniaturas"><img src="img/Producto/Detalle.jpg" width="70%"  name="Detalle"  OnMouseOver="preview.src=Detalle.src" /></td>
        </tr>
        <tr>
            <td class="miniaturas"><img src="img/Producto/Lateral.jpg" width="70%"  name="lateral"  OnMouseOver="preview.src=lateral.src" /></td>
        </tr>  
        <tr>
            <td class="miniaturas"><img src="img/Producto/Referencia.jpg" width="70%" name="Referencia"  OnMouseOver="preview.src=Referencia.src" /></td>
        </tr>
	</table>
</div>
     <div id="Producto">
     	<img src="img/Producto/Frente.jpg" width="60%" name="preview" />
     </div>
     
      <center>
   	<div id="especificaciones">
    
      <table width="100%" class="TablaEsp">
  <tr>
    <td width="16%" class="HeaderEsp"><p>Altura</p></td>
    <td width="16%" class="HeaderEsp"><p>Ancho</p></td>
    <td width="16%" class="HeaderEsp"><p>Largo</p></td>
    <td width="16%" class="HeaderEsp">Capacidad Lt</td>
    <td width="50%" colspan="2" class="HeaderEsp">Materiales:</td>
  </tr>
  <tr>
    <td><?php echo $reg['Alto'] ?></td>
    <td><?php echo $reg['Ancho'] ?></td>
    <td><?php echo $reg['Largo'] ?></td>
    <td><?php echo $reg['Litros'] ?></td>
    <td width="50%" class="Materiales">
      <p><?php echo $reg['Material1'] ?></p></td>
      <p><?php echo $reg['Material2'] ?></p></td>
      <p><?php echo $reg['Material3'] ?></p></td>
  </tr>
  </table>

  
        <p class="sku">&nbsp;</p>
   	</div>
    </center>
     <!--Termina producto-->
<br /><br /><br /><br />     
<?php include_once('secciones/pie.php'); ?>
</body>
</html>
