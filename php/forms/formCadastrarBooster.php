<?php
$descricao = $_POST['txtDescricao'];
$tipo = $_POST['txtTipo'];
$pacotesInclusos = $_POST['nbrPacotesInclusos'];
$estado = $_POST['txtEstado'];
$idioma = $_POST['txtIdioma'];
$unidade = $_POST['nbrUnidade'];
$valor = $_POST['nbrValor'];
$fkColecao = $_POST['sltColecao'];

$imagemUrl = $_FILES['filImagem']['name'];
$imagemTmp = $_FILES['filImagem']['tmp_name'];
$pastaUpload = '../../uploadedImages/booster/';

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    move_uploaded_file($imagemTmp, $pastaUpload.$imagemUrl);

    $query = "INSERT INTO Booster
    (boos_descricao,
    boos_tipo,
    boos_pacotes_inclusos,
    boos_estado,
    boos_idioma,
    boos_imagem_url,
    boos_unidade,
    boos_valor,
    fk_cole_id)
    VALUES
    ('{$descricao}',
    '{$tipo}',
    {$pacotesInclusos},
    '{$estado}',
    '{$idioma}',
    '{$imagemUrl}',
    {$unidade},
    {$valor},
    {$fkColecao})";

    $result = mysqli_query($_con, $query);

    mysqli_close($_con);

    header("Location: ../admin/adminSelecionarCadastro.php");
	exit();
}
?>