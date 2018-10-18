<?php


function OnlineUsers(){
//0  Un usuario cualquiera entra por primera vez, se loguea y se crean las sesiones $_SESSION['app_id'] y $_SESSION['time_online']
//1  Obtiene la ultima conexion que sera la del tiempo actual time()
//2  Si Time es mayor o = al valor de la sesion $_SESSION['time_online'] + (60*5) 5 minutos
//3  Refrescamos su ultima conexion que sera $time
//4  Refrescamos su ultima conexion en la sesion de usuario $_SESSION['users']  que sera $time
//5  refrescamos en la base de datos el tiempo y lo limitamos a 1 para que no busque mas
//$_SESSION['time_online']  esta declarada en goLogin
//Se hara una peticion cada 5 min como maximo por usuario
// Foros como phpbb se actualiza cada 5 minutos
// El chat de Facebook aveces vemos gente conectada y cuando vamos a escribirle se actualiza el estado y sale como desconectado. Por lo tanto asi no se hacen peticiones a la db a menos que sea necesario para optimizar


//(Se modifica el algoritmo en video 20)
    if (isset($_SESSION['app_id'])) {//0
        $id_usuario = $_SESSION['app_id'];//1
    if (time() >= ($_SESSION['time_online'] + (60*5))) {//2
        $time = time();
        $_SESSION['time_online'] = $time;//3
        $_SESSION['users'][$id_usuario]['ultima_conexion'] = $time;//4
        $db = new Conexion();
        $query = "UPDATE users SET ultima_conexion ='$time' WHERE id='$id_usuario' LIMIT 1;";//5
        $query .= "UPDATE config SET timer='$time' WHERE id='1' LIMIT 1;";//5

        $db->multi_query($query);//se ejecutan las 2 query de un solo llamado
        $db->close();

}

}
}?>
