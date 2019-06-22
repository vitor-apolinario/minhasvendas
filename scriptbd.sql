create schema if not exists `minhasvendas` default character set utf8 collate utf8_bin;

use `minhasvendas`;

create table industria(
    `cd_indu` int primary key,
    `nm_indu` varchar(50) not null,
    `estado` varchar(50) not null,
    `cidade` varchar(50) not null
) engine = innodb;

create table produto(
    `cd_prod` int not null,
    `nm_prod` varchar(50) not null,
    `cd_fk_indu` int not null,
    `undmed` varchar(5) not null,
    `comiss` decimal(5,2) not null,
    `desc` text,
    `grupo` varchar(15) null,
    constraint `fk_industria_produto` foreign key (`cd_fk_indu`) references industria(`cd_indu`),
    primary key(`cd_prod`, `cd_fk_indu`)
) engine = innodb;
drop table produto;

create table cliente(
    `cd_cli` int primary key,
    `nm_cli` varchar(50) not null,
    `cpf` varchar(15),
    `cnpj` varchar(15),
    `telefone` varchar(30) not null,
    `estado` varchar(50) not null,
    `cidade` varchar(50) not null,
    `endereco` text
) engine = innodb;

create table venda(
    `num_venda` bigint not null,
    `cd_fk_indu` int not null,
    `cd_fk_cliente` int not null,
    `recebido` tinyint not null default 0,
    `frm_pgto` varchar(50) not null,
    `vlr_total` decimal(12,4) not null,
    `dt_venda` date not null,
    `dt_cadastro` timestamp not null default current_timestamp,
    constraint `fk_indu_venda` foreign key (`cd_fk_indu`) references industria(`cd_indu`),
    constraint `fk_cliente_venda` foreign key (`cd_fk_cliente`) references cliente(`cd_cli`),
    primary key(`num_venda`, `cd_fk_indu`)
) engine = innodb;
-- drop table venda;

create table venda_item(
	-- -------fk produto----------
    `cd_fk_prod` int not null,        
    -- -------fk venda------------
    `num_fk_venda` bigint not null,
    -- -------fk indu-------------
    `cd_fk_indu` int not null,
    -- ---------------------------
    `undvnd` varchar(5) not null,
    `qtd` int not null,
    `vlr_und` decimal(12,4) not null,
    constraint `fk_venda_item_produto` foreign key (`cd_fk_prod`, `cd_fk_indu`) references produto(`cd_prod`, `cd_fk_indu`),
    constraint `fk_venda_item_venda` foreign key (`num_fk_venda`, `cd_fk_indu`) references venda(`num_venda`, `cd_fk_indu`),
    primary key(`cd_fk_prod`, `num_fk_venda`, `cd_fk_indu`)
) engine = innodb;
-- drop table venda_item;

create table titulo(
    `dt_vencimento` date not null,
    `dt_pagamento` date,
    `vlr_titulo` decimal(12,4) not null,
    -- -------fk venda-------------
    `num_fk_venda` bigint not null,    
    `cd_fk_indu_venda` int not null,
    -- ----------------------------
    constraint `fk_titulo_venda` foreign key (`num_fk_venda`, `cd_fk_indu_venda`) references venda(`num_venda`, `cd_fk_indu`),
    primary key(`dt_vencimento`,`num_fk_venda`,`cd_fk_indu_venda`)
) engine = innodb;
-- drop table titulo;

INSERT INTO minhasvendas.cliente
(cd_cli, nm_cli, cpf, cnpj, telefone, estado, cidade, endereco)
values
	(1, 'Cliente1', 12312312312, NULL, '40028922', 'SC', 'Chapecó', 'Rua das gaivotas'),
	(2, 'Cliente2', 12312312312, NULL, '45599223', 'SP', 'São Paulo', 'Rua Pereá'),
	(3, 'Cliente3', 12312312312, NULL, '47123332', 'PR', 'Curitiba', 'Rua Chow Chow');

INSERT INTO minhasvendas.industria
(cd_indu, nm_indu, estado, cidade)
values
	(1, 'Indústria1', 'SC', 'Chapecó'),
	(2, 'Indústria2', 'SP', 'São Paulo'),
	(3, 'Indústria3', 'PR', 'Curitiba');

INSERT INTO minhasvendas.produto
(cd_prod, nm_prod, cd_fk_indu, undmed, comiss, `desc`, grupo)
values
	(1, 'Telha',  1, 'TON', 5,  'Telha 255 x 22 mm sem amianto', 'COB'),
	(1, 'Tijolo', 2, 'MIL', 52, 'Tijolo maçico blindado', 'REV'),
	(1, 'Prego',  3, 'KGS', 36, 'Prego galvanizado', 'FER');

INSERT INTO minhasvendas.venda
(num_venda, cd_fk_indu, cd_fk_cliente, recebido, frm_pgto, vlr_total, dt_venda, dt_cadastro)
values
	(1, 1, 3, 0, 'À VISTA',  512.16,   current_timestamp(), current_timestamp()),
	(1, 2, 2, 0, '30/60/90', 2266.29,  current_timestamp(), current_timestamp()),
	(1, 3, 1, 0, '15/45/55', 14145.43, current_timestamp(), current_timestamp());