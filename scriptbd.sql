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
drop table venda;

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
drop table venda_item;

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
-- ALTER TABLE titulo MODIFY COLUMN `vlr_titulo` decimal(12,4) not null;
drop table titulo;

insert into industria values (1, 'Brasilit', 'RS', 'Porto Alegre'), 
							 (2, 'Macaferri', 'SP', 'São Paulo');
select * from industria;

insert into produto values (1, 'Telha 5mm', 1, 'PLT', 100.56, 'Telha mt legal', 'COBERTURAS'), 
						   (2, 'Telha 7mm', 1, 'PLT', 100.56, 'Telha mt legal mais grossa', 'COBERTURAS'), 
						   (1, 'Arame farpado', 2, '100M', 2.54, 'cortaa bastante', 'CERCAS'),
                           (2, 'Arame cerca elétrica', 2, '100M', 2.65, 'eletrocuta bastante', 'CERCAS');
select * from produto p join industria i where i.cd_indu = p.cd_fk_indu;
delete from produto where cd_prod in (1,2);

insert into cliente values (1, 'Laercio Cyrus', '12364788', null, '99882236', 'SC', 'Chapecó', 'R. das aguias pretas bairro batatinha'), 
						   (2, 'Severo snape', null, '0119982009', '49333298855', 'SC', 'Caibi', 'Rua entrada pra chapeco saida jundiai');
select * from cliente;						

insert into venda values (55,  1, 1, 0, '30/60/90', 600, current_date(), current_timestamp()),
						 (265, 2, 2, 0, '30/60/90', 600, current_date(), current_timestamp());
delete from venda where `num_venda` in (55);

insert into venda_item values (1, 55, 1, 'PLT', 2, 200),
							  (2, 55, 1, 'PLT', 2, 400);
delete from venda_item where cd_fk_prod = 1;

select * from venda v join venda_item vi where vi.num_fk_venda = v.num_venda and vi.cd_fk_indu = v.cd_fk_indu join produto p on p.cd_prod = vi.cd_prod and p.cd_fk_indu = vi.cd_fk_indu;



