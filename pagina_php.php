<?php
                                                    //     /? es para dar infomracion que va a existir en servidor
    $VAR1='';
    $VAR2='';
    $VAR5='';
    $VAR6='';

    if(!file_exists("datos.txt")){
        file_put_contents("datos.txt", "0\r\n0");
    }

    if( isset($_GET['A']) || isset($_GET['B']) || isset($_GET['C']) || isset($_GET['D']) ){ //esta línea es para comprobar si ha recibido algo en alguno de los sensores

        $VAR1=$_GET['A']; 
        $VAR2=$_GET['B'];
        $VAR5=$_GET['C']; 
        $VAR6=$_GET['D'];

        $TEXTO=$VAR1."\r\n".$VAR2."\r\n".$VAR5."\r\n".$VAR6;               //punto "." es para concatenar

        file_put_contents("datos.txt", $TEXTO);
    }

    $ARCHIVO=file_get_contents("datos.txt");    //consigue del archivo txt, ARCHIVO es todo el texto del documento

    $pos=strpos($ARCHIVO,"\r\n");               //busca el primer enter
    $VAR3=substr($ARCHIVO, 0, $pos);            //extrae lo que hay en ARCHIVO (completo) desde la posicion cero hasta el primer enter (pos)

    $text_recortado_1=substr($ARCHIVO, $pos+1);             //extrae en la variable VAR4 el texto del archivo desde pos+1 hasta el final. ahora VAR4= es todo lo que resta del archivo
    $pos=strpos($text_recortado_1,"\r\n");                  //busca el primer enter inmediato del nuevo arvhivo VAR4
    $VAR4=substr($text_recortado_1, 0, $pos);               //extrae lo que hay en VAR4 (completo) desde la posicion cero hasta el primer enter inmediato (pos)

    $text_recortado_1=substr($text_recortado_1, $pos+1);             
    $pos=strpos($text_recortado_1,"\r\n");                  
    $VAR7=substr($text_recortado_1, 0, $pos);
    
    $text_recortado_1=substr($text_recortado_1, $pos+1);                              
    $VAR8=substr($text_recortado_1, 0) 
?>

<html>

    <head>
        <title>Sensores PHP</title>
        <meta http-equiv="refresh" content="5"> <! -- pag se actualiza cada 5 segundos -->
    </head>

    <body>

        <H3>Sensor 1 =<?php echo $VAR3 ?></H3>   <! -- echo es para imprimir -->
        <H3>Sensor 2 =<?php echo $VAR4 ?></H3>
        <H3>Sensor 3 =<?php echo $VAR7 ?></H3>
        <H3>Sensor 4 =<?php echo $VAR8 ?></H3>

    </body>
</html>
