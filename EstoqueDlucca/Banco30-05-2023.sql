create database estoques;
use estoques;
drop database estoques;

create table usuario(
	id int auto_increment primary key,
    nome varchar(50),
    email varchar(100),
	login varchar(50) not null unique,
	senha varchar(50),
	tipo_usuario enum('Admin', 'Funcionario', 'Usuario')
);

create table produto(
	id_prod int auto_increment primary key,
    nome_prod varchar(35) not null unique,
    tipo_prod enum ('Empréstimo', 'Uso Único'),
    categoria_prod varchar(40) not null,
    quantidade_prod int not null,
    unidade_prod enum ('Unidade','Caixa','Pacote','Metros', 'Litros'),
    entrada_prod TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    hora_emprestimo timestamp default current_timestamp,
    problema_prod varchar(255),
    quantidade_def int ,
    quantidade int,
    emprestado enum('Não', 'Sim') default 'Não',
    emissor varchar(30) not null,
    assinatura varchar(40) not null
    );
    
    create table emprestimo(
	id_prod int auto_increment primary key,
    nome_prod varchar(35) not null ,
    tipo_prod enum ('Empréstimo', 'Uso Único'),
    categoria_prod varchar(40) not null,
    quantidade_prod int not null,
    unidade_prod enum ('Unidade','Caixa','Pacote','Metros', 'Litros'),
    hora_emprestimo timestamp default current_timestamp,
    quantidade int,
    emprestado enum('Não', 'Sim') default 'Não',
    emissor varchar(30) not null,
    assinatura varchar(40) not null
    );
    
    create table chave(
    id_chave int auto_increment primary key,
    codigo int not null unique,
    sala varchar (45),
    pessoa varchar(255),
    contato int (11),
    disponivel enum('Sim', 'Não') default 'Sim'
    );
    insert into chave (codigo, sala, pessoa) values ('76232', 'Informatica', 'Luan');
    
    insert into produto(nome_prod, tipo_prod, categoria_prod, quantidade_prod, unidade_prod,emissor, assinatura)
    values ('Copo','emprestimo','cozinha','10','unidade', 'Dlucca', 'Luan' );
    
    insert into emprestimo(nome_prod, tipo_prod, categoria_prod, quantidade_prod, hora_emprestimo, quantidade, 
    emprestado, emissor, assinatura ) values('Copo', 'Uso Único','Cozinha','100','2023-08-08 13:55:55'
    ,'50','Sim','Carolina','Luan');
    
    insert into usuario(login, senha) values ('luan', '01');
    
	select * from usuario;
    select * from produto;
    select * from emprestimo;
    select * from chave;
    
    drop table usuario;
    drop table produto;
    drop table emprestimo;
    drop table chave;