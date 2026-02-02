create table usuario(
	id int primary key auto_increment not null,
    nome varchar(255) not null,
    email varchar(255) unique not null,
    senha varchar(100) not null
);


create table categoria(
	id int primary key auto_increment not null,
    tipo char(1) not null,
    nome varchar(100) not null,
	id_usuario int,
    foreign key (id_usuario) references usuario(id)
);

create table movimentacao(
	id int primary key auto_increment not null,
    tipo char(1) not null,
    valor decimal(10, 2) not null,
    data_lancamento date not null,
    descricao varchar(255),
    id_usuario int,
    id_categoria int,
    foreign key (id_usuario) references usuario(id),
    foreign key (id_categoria) references categoria(id)
);
    