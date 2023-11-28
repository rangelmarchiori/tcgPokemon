<?php 
$nome = $_POST['txtNome'];
$geracao = $_POST['sltGeracao'];
$data = $_POST['dteLancamento'];

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    $query = "INSERT INTO Colecao
    (cole_nome,
    cole_geracao,
    cole_lancamento) 
    VALUES 
    ('{$nome}',  
    '{$geracao}', 
    '{$data}')";

    $result = mysqli_query($_con, $query);

    mysqli_close($_con);

    header("Location: ../admin/adminSelecionarCadastro.php");
	exit();
}
?>