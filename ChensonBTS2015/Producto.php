
<?php 
include("conexion.php");
include("busqueda.php");

$target   = $_REQUEST['target'];
$genero   = $_REQUEST['genero'];
$cuerpo   = $_REQUEST['cuerpo'];

$licencia = $_REQUEST['licencia'];

$linea    = $_REQUEST['linea'];
$color    = $_REQUEST['color']; 

if (isset($_REQUEST['pagina']))
  $pagina = $_REQUEST['pagina'];

function paginacion($num_paginas)
{
	//echo "Paginas ".$num_paginas;
	if($num_paginas>1 || isset($_REQUEST['pagina']))
  {
   		echo "<center>
	    	<div id='paginador'>
        	<p>Página:</p>";          
		$var=1;


?>



    <nav>
    <ul class="pagination">
      
      <?php  
      //Se repiten las variables por que no pueden accesar a las
      //iniciales por alguna razón
      $target   = $_REQUEST['target'];
      $genero   = $_REQUEST['genero'];
      $cuerpo   = $_REQUEST['cuerpo'];

      $licencia = $_REQUEST['licencia'];
      $linea    = $_REQUEST['linea'];
      $color    = $_REQUEST['color']; 

      if (isset($_REQUEST['busqueda']))
        $busqueda = $_REQUEST['busqueda'];

            while($var<=$num_paginas)
    {  
    ?> <li> <?php

      echo "<a href='producto.php?target=".$target."&genero=".$genero."&cuerpo=".$cuerpo."&pagina=".$var.""."&licencia=".$licencia."&linea=".$linea."&color=".$color."'>$var </a>";

      $var++;
      ?></li>
      <?php
    }
    ?>

      
    </ul>
  </nav>

<?php
		

       echo "</div></center>";     
	}		
}





$_RUTA_IMAGEN_VACIA='img/Iconos/NoDisponible.jpg';
if (isset($_REQUEST['pagina'])) {echo $_REQUEST['pagina'];}

/*
Pruebas
echo "<br><br><br><br>";
echo "Target: ";
echo $target;
echo "<br>";
echo "Genero: ";
echo $genero;
echo "<br>";
echo "Cuerpo: ";
echo $cuerpo;
*/

if (isset($_REQUEST['busqueda']))
{
  if ($_REQUEST['busqueda'] != '') 
  {
    $field    = getBetterSearch($_REQUEST['busqueda']);
    $query    = "select *from chenson_bts_2015 
              WHERE ".$field." like '%". $_REQUEST['busqueda'] ."%' ";
    $queryTam = "select count(sku) as conteo from chenson_bts_2015 
              WHERE ".$field." like '%". $_REQUEST['busqueda'] ."%' ";

    echo $field;
  }
  else
  {
    //Consulta
    $query    =  "
          
          select *from chenson_bts_2015 
          where Target = 

              case when '" .$target. "' = '' then Target
                else '". $target ."'
              end

          and Cuerpo = 

              case when '" .$cuerpo. "' = '' then Cuerpo
                else '". $cuerpo ."'
              end

          and Genero = 

              case when '" .$genero. "' = '' then Genero
                else '". $genero ."'
              end
          and marca = 

              case when '" .$licencia. "' = '' then marca
                else '". $licencia ."'
              end 

          and linea = 

              case when '" .$linea. "' = '' then linea
                else '". $linea ."'
              end 

          and color = 

              case when '" .$color. "' = '' then color
                else '". $color ."'
              end 

          "; 

    //Consulta necesaria para obtener cuantos resultados se obtubieron
    $queryTam    =  "
          
          select count(sku) as conteo from chenson_bts_2015 
          where Target = 

              case when '" .$target. "' = '' then Target
                else '". $target ."'
              end

          and Cuerpo = 

              case when '" .$cuerpo. "' = '' then Cuerpo
                else '". $cuerpo ."'
              end

          and Genero = 

              case when '" .$genero. "' = '' then Genero
                else '". $genero ."'
              end

          and marca = 

              case when '" .$licencia. "' = '' then marca
                else '". $licencia ."'
              end 
          and color = 

              case when '" .$color. "' = '' then color
                else '". $color ."'
              end 

          "; 
  }
}
else
{
  //Consulta
    $query    =  "
          
          select *from chenson_bts_2015 
          where Target = 

              case when '" .$target. "' = '' then Target
                else '". $target ."'
              end

          and Cuerpo = 

              case when '" .$cuerpo. "' = '' then Cuerpo
                else '". $cuerpo ."'
              end

          and Genero = 

              case when '" .$genero. "' = '' then Genero
                else '". $genero ."'
              end
          and marca = 

              case when '" .$licencia. "' = '' then marca
                else '". $licencia ."'
              end 

          and linea = 

              case when '" .$linea. "' = '' then linea
                else '". $linea ."'
              end 

          and color = 

              case when '" .$color. "' = '' then color
                else '". $color ."'
              end 

          "; 

    //Consulta necesaria para obtener cuantos resultados se obtubieron
    $queryTam    =  "
          
          select count(sku) as conteo from chenson_bts_2015 
          where Target = 

              case when '" .$target. "' = '' then Target
                else '". $target ."'
              end

          and Cuerpo = 

              case when '" .$cuerpo. "' = '' then Cuerpo
                else '". $cuerpo ."'
              end

          and Genero = 

              case when '" .$genero. "' = '' then Genero
                else '". $genero ."'
              end

          and marca = 

              case when '" .$licencia. "' = '' then marca
                else '". $licencia ."'
              end 
          and color = 

              case when '" .$color. "' = '' then color
                else '". $color ."'
              end 

          "; 
}



/*
Pruebas
echo "<br><br><br><br><br>";
echo $queryTam;
*/

$total    =  mysqli_query($conexion,$queryTam) or die("Problemas al filtrar sus resultados:".mysql_error());

foreach ($total as $item ) 
{
  $numRows =  $item['conteo'];
}

 $cantidad=0;

  //Obtener número de páginas
 if (isset($pagina) && $_REQUEST['pagina']>1)
 {
	$cantidad=18*($pagina-1);	 
 	$query=$query." limit ".$cantidad.",18";	
 }

 else if(!isset($_REQUEST['pagina']) || $_REQUEST['pagina']==1)
 {	 
 	$query=$query." limit 0,18";	 
 }

//Pruebas

//echo "<br><br><br>".$query."<br>";
/*
//echo "licencia: ".$licencia;
echo "<br>";
echo "Target: ".$target;
echo "Color: ". $color;
*/

	if ($query=="select *from chenson_bts_2015")
	$query="select *from chenson_bts_2015 limit 0,18";
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Test</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <link href="css/style_600px.css" rel='stylesheet' media="(max-width:640px)" type='text/css' />
  <link href="css/style_Min1080.css" rel='stylesheet' media="(min-width:1080px)" type='text/css' />
  <script src="js/jquery-1.11.0.min.js"></script>

  <script src="js/bootstrap.js"></script>

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
</head>

<body onload="MM_preloadImages('Producto/Atras.jpg')">

<style type="text/css">   
  a:link   
  {   
   text-decoration:none;   
   font-size:20px;
  }   
  p
  {
    padding-top: 1px;
  }
</style>

	<div class="container-fluid">
      
         <?php    
	
    	$registros=mysqli_query($conexion,$query) or die("Problemas al filtrar sus resultados:".mysql_error());
      
			$num_paginas=intval($numRows)/18;
      //echo "Num resultados: "; 
      //echo $numRows; 
			//echo "<br>";
			if($num_paginas>=$num_paginas)
			   $num_paginas=intval($num_paginas)+1; 
			   
         
      //  print_r($_GET);
      paginacion($num_paginas);


        while($reg=mysqli_fetch_array($registros))
        {?>
            <div class="col-lg-2 col-md-3 col-sm-4">

            <div class="panel panel-info">
            <!-- <div class="panel-heading"><p class="text-center "><?php echo $reg['Sku'];?></p></div> -->
              <div class="panel-body">

                <a href="Detalle.php?sku=<?php echo $reg['Sku'] ?>" target="_top" >
                  <?php if (file_exists('img/Producto/'.$reg['Sku'].'/Frente.jpg')): ?>
                    <img src="img/Producto/<?php echo $reg['Sku'];?>/Frente.jpg" alt="<?php echo $reg['Sku'];?>" name="frente" class="img-responsive" onmouseover="MM_swapImage('frente','','img/Producto/<?php echo $reg['Sku'];?>/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                  <?php else: ?>
                    <img src="img/Iconos/NoDisponible.jpg" alt="<?php echo $reg['Sku'];?>" name="frente" class="img-responsive" onmouseover="MM_swapImage('frente','','img/Iconos/NoDisponible.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                  <?php endif ?>
                </a>

              </div>
              <div class="panel-footer">
                <p class="text-center ">Modelo: <?php echo $reg['Sku'];?></p>
                <p class="text-center ">Precio: $<?php echo $reg['Precio'];?></p>
              </div>
            </div>
               
            </div>

            <?php

        }?>  
                         
                          
            
            
    <!--
    {
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            <a href="Detalle.php" target="_top">
            	<div class="caja">
                    <img src="img/Producto/Frente.jpg" alt="1860314-3" name="frente" class="imgProducto" onmouseover="MM_swapImage('frente','','img/Producto/Atras.jpg',1)" onmouseout="MM_swapImgRestore()" ) />
                    <p class="skucaja">1860314-3</p>
                    <p class="datos">jeilo</p>
                    <p class="datos">$349.00</p>
          		</div>
          	</a>
            }
            -->
            
                <?php 

 
	 paginacion($num_paginas); ?>
	
  
           
       
    </div>
</body>
</html>
