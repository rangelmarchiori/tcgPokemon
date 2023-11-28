<?php
$nome = $_POST['txtNome'];
$descricao = $_POST['txtDescricao'];
$tipo = $_POST['txtTipo'];
$lancamento = $_POST['dteLancamento'];
$estado = $_POST['txtEstado'];
$idioma = $_POST['txtIdioma'];
$unidade = $_POST['nbrUnidade'];
$valor = $_POST['nbrValor'];
$fkColecao = $_POST['sltColecao'];

$imagemUrl = $_FILES['filImagem']['name'];
$imagemTmp = $_FILES['filImagem']['tmp_name'];
$pastaUpload = '../../uploadedImages/deck/';

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    move_uploaded_file($imagemTmp, $pastaUpload.$imagemUrl);

    $query = "INSERT INTO Deck
    (deck_nome,
    deck_descricao,
    deck_tipo,
    deck_lancamento,
    deck_estado,
    deck_idioma,
    deck_imagem_url,
    deck_unidade,
    deck_valor,
    fk_cole_id)
    VALUES
    ('{$nome}',
    '{$descricao}',
    '{$tipo}',
    '{$lancamento}',
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