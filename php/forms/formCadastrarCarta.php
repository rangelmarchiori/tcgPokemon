<?php
$nome = $_POST['txtNome'];
$descricao = $_POST['txtDescricao'];
$raridade = $_POST['txtRaridade'];
$ilustrador = $_POST['txtIlustrador'];
$lancamento = $_POST['dteLancamento'];
$estado = $_POST['txtEstado'];
$idioma = $_POST['txtIdioma'];
$unidade = $_POST['nbrUnidade'];
$valor = $_POST['nbrValor'];
$fkCategoria = $_POST['sltCategoria'];
$fkColecao = $_POST['sltColecao'];
$fkTipo = $_POST['sltTipo'];

$imagemUrl = $_FILES['filImagem']['name'];
$imagemTmp = $_FILES['filImagem']['tmp_name'];
$pastaUpload = '../../uploadedImages/carta/';

$_con = mysqli_connect('127.0.0.1','root','','bd_website_pokemon_tcg');
if($_con === FALSE) {
    echo "Não foi possível conectar ao Servidor de banco de dados.";
} else {
    echo "Foi possível conectar ao Servidor de banco de dados.";

    move_uploaded_file($imagemTmp, $pastaUpload.$imagemUrl);

    $query = "INSERT INTO Carta
    (cart_nome,
    cart_descricao,
    cart_raridade,
    cart_ilustrador,
    cart_lancamento,
    cart_estado,
    cart_idioma,
    cart_imagem_url,
    cart_unidade,
    cart_valor,
    fk_cate_id,
    fk_cole_id,
    fk_tipo_id)
    VALUES
    ('{$nome}',
    '{$descricao}',
    '{$raridade}',
    '{$ilustrador}',
    '{$lancamento}',
    '{$estado}',
    '{$idioma}',
    '{$imagemUrl}',
    {$unidade},
    {$valor},
    {$fkCategoria},
    {$fkColecao},
    {$fkTipo})";

    $result = mysqli_query($_con, $query);
    mysqli_close($_con);
}
?>