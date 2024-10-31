create table endereco
(
	id_endereco integer primary key not null auto_increment,
    rua varchar(60) not null,
    numero int not null,
    estado varchar(2) not null,
    cidade varchar(60) not null,
    cep int not null
);

create table chamado
(
	id_chamado integer primary key not null auto_increment,
    nome_user varchar(50) not null,
    cnpj varchar(14) not null,
    email varchar(40) not null,
    id_endereco integer not null,
    foreign key(id_endereco) references endereco(id_endereco),
    tipo varchar(20) not null,
    titulo varchar(100) not null,
    descricao text not null
);

insert into endereco(rua,numero,estado,cidade,cep) values(?, ?,?, ?, ?);

use dbmerge;
select * from endereco;

select * from chamado;

ALTER TABLE chamado MODIFY cnpj VARCHAR(14);

select id_chamado, nome_user, titulo, cnpj, email, rua, numero, estado, cidade, descricao from chamado cha left join endereco ende on ende.id_endereco = cha.id_endereco;