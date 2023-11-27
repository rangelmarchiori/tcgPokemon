<?php 
$nome = $_POST['txtNome'];
$senha = $_POST['txtSenha'];

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    $query = "SELECT * FROM 
    Usuario
    WHERE
    ((usua_apelido = '{$nome}') and 
    (usua_senha = '{$senha}'))";

    $result = mysqli_query($_con, $query);

    $rows = mysqli_num_rows($result);

    if($rows == 1){
        session_start();
	    $_SESSION['username'] = $nome;

	    header("Location: ../admin/adminSelecionarCadastro.php");
	    exit();
    } else {
        echo "<br/> Erro no Login!";
    }

    mysqli_close($_con);
}
?>