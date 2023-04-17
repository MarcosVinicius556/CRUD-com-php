<!-- Criação da conexão com o banco-->
<?php 
    define('HOST','localhost');
    define('USER','root');
    define('PASS','root');
    define('BASE','crud_adsomos');

    $conn = new MySQLi(HOST, USER, PASS, BASE);
?>