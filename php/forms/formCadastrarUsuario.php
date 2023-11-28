<?php 
$nome = $_POST['txtNome'];
$email = $_POST['txtEmail'];
$telefone = $_POST['txtTelefone'];
$senha = $_POST['txtSenha'];

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    $query = "INSERT INTO Usuario
    (usua_apelido,
    usua_email,
    usua_telefone,
    usua_senha) 
    VALUES 
    ('{$nome}',  
    '{$email}', 
    '{$telefone}', 
    '{$senha}')";

    $result = mysqli_query($_con, $query);

    mysqli_close($_con);

    header("Location: ../../html/forms/formRealizarLogin.html");
	exit();
}
?>