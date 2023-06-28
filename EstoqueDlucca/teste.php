<?php
require("protected.php");
if($tipoUsuario === 'Admin'){
    echo('Voce e admin');
}   

if($tipoUsuario === 'Funcionario'){
    echo('Voce e Funcionario');
}   

if($tipoUsuario === 'Usuario'){
    echo('Voce e Usuario');
}   




?>