create database bd_website_pokemon_tcg;
use bd_website_pokemon_tcg;

create table usuario
(
	usua_id int not null primary key auto_increment,
    usua_apelido varchar(30) not null,
    usua_email varchar(100) not null,
    usua_telefone varchar(20) not null,
    usua_senha varchar(50) not null
);

create table colecao
(
	cole_id int not null primary key auto_increment,
    cole_nome varchar(50) not null,
    cole_geracao varchar(20),
    cole_lancamento date
);

insert into colecao values(null, 'Coleção X', 'Primera Geração', '2001-01-01');
insert into colecao values(null, 'Coleção Y', 'Primera Geração', '2002-02-02');
insert into colecao values(null, 'Coleção X', 'Primera Geração', '2003-03-03');

create table tipo
(
	tipo_id int not null primary key auto_increment,
    tipo_nome varchar(20) not null,
    tipo_imagem_url varchar(300)
);

insert into tipo values
(null, 'Aço', null),
(null, 'Água', null),
(null, 'Dragão', null),
(null, 'Elétrico', null),
(null, 'Fada', null),
(null, 'Fogo', null),
(null, 'Incolor', null),
(null, 'Lutador', null),
(null, 'Planta', null),
(null, 'Psíquico', null),
(null, 'Sombrio', null);

create table categoria
(
	cate_id int not null primary key auto_increment,
    cate_nome varchar(30) not null
);

insert into categoria values
(null, 'Pokémon básico'),
(null, 'Pokémon estágio 1'),
(null, 'Pokémon estágio 2'),
(null, 'Energia'),
(null, 'Treinador item'),
(null, 'Treinador estádio'),
(null, 'Treinador apoiador');

create table carta
(
	cart_id int not null primary key auto_increment,
    cart_nome varchar(30) not null,
    cart_descricao varchar(200),
    cart_raridade varchar(30),
    cart_ilustrador varchar(30),
    cart_lancamento date,
    cart_estado varchar(20),
    cart_idioma varchar(20),
    cart_imagem_url varchar(300),
    cart_unidade int not null,
    cart_valor float not null,
    fk_cate_id int not null,
    foreign key(fk_cate_id) references categoria(cate_id),
    fk_cole_id int not null,
    foreign key(fk_cole_id) references colecao(cole_id),
    fk_tipo_id int,
    foreign key(fk_tipo_id) references tipo(tipo_id)
);

create table deck
(
	deck_id int not null primary key auto_increment,
    deck_nome varchar(30) not null,
    deck_descricao varchar(200),
    deck_tipo varchar(20),
    deck_lancamento date,
    deck_estado varchar(20),
    deck_idioma varchar(20),
    deck_imagem_url varchar(300),
    deck_unidade int not null,
    deck_valor float not null,
    fk_cole_id int not null,
    foreign key(fk_cole_id) references colecao(cole_id)
);

create table booster
(
	boos_id int not null primary key auto_increment,
    boos_descricao varchar(200),
    boos_tipo varchar(20),
    boos_pacotes_inclusos int not null,
    boos_estado varchar(20),
    boos_idioma varchar(20),
    boos_imagem_url varchar(300),
    boos_unidade int not null,
    boos_valor float not null,
    fk_cole_id int not null,
    foreign key(fk_cole_id) references colecao(cole_id)
);

create table venda
(
	vend_id int not null primary key auto_increment,
    vend_data date not null,
    vend_unidade_total int not null,
    vend_valor_total float not null,
    vend_parcelas int,
    vend_forma_pagamento varchar(50)
);

create table venda_carta
(
	vaca_id int not null primary key auto_increment,
    vaca_unidade_carta int not null,
    vaca_valor_carta float not null,
    fk_vend_id int not null,
    foreign key(fk_vend_id) references venda(vend_id),
    fk_cart_id int not null,
    foreign key(fk_cart_id) references carta(cart_id)
);

create table venda_deck
(
	vadk_id int not null primary key auto_increment,
    vadk_unidade_deck int not null,
    vadk_valor_deck float not null,
    fk_vend_id int not null,
    foreign key(fk_vend_id) references venda(vend_id),
    fk_deck_id int not null,
    foreign key(fk_deck_id) references deck(deck_id)
);

create table venda_booster
(
	vabr_id int not null primary key auto_increment,
    vabr_unidade_booster int not null,
    vabr_valor_booster float not null,
    fk_vend_id int not null,
    foreign key(fk_vend_id) references venda(vend_id),
    fk_boos_id int not null,
    foreign key(fk_boos_id) references booster(boos_id)
);