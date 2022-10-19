<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'cadastro';
$tableCidade = 'cidade';
$tableEstado = 'estado';
$tableLogradouro = 'logradouro';
$tablePessoa = 'pessoa';
$tableProduto = 'produto';
$tableFabricante = 'fabricante';
$tablePedido = 'pedido';

// Criando conexуo sem o banco de dados
$conn = new mysqli($servername, $username, $password);
// Checando conexуo
if ($conn->connect_error) {
	die("Falha na conexуo: " . $conn->connect_error);
}

// Criando banco de dados se ele ainda nуo existir
$newdb = "CREATE DATABASE IF NOT EXISTS $database";
if ($conn->query($newdb) === FALSE) {
	echo "Erro ao criar database: " . $conn->error;
}

// Criando conexуo com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);
// Checando conexуo
if ($conn->connect_error) {
	die("Falha na conexуo: " . $conn->connect_error);
}

//Excluir tabela se jс existir
$drop = "DROP TABLE IF EXISTS $tableCidade, $tableEstado, $tableLogradouro, $tablePessoa, $tableProduto, $tableFabricante, $tablePedido";
if ($conn->query($drop) === FALSE) {
	echo "Erro ao excluir tabela: " . $conn->error;
}

// Criando tabelas
$sql = "CREATE TABLE $tableCidade (
id_cidade INT(20) UNSIGNED NOT NULL
, cidade VARCHAR(50) NULL
, id_estado INT(20) UNSIGNED NOT NULL
, PRIMARY KEY (id_cidade)
, FOREIGN KEY (id_estado) REFERENCES Estado(id_estado)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Cidades: " . $conn->error;	}

$sql = "CREATE TABLE $tableEstado (
id_estado INT(20) UNSIGNED NOT NULL
, estado VARCHAR(50) NULL
, uf CHAR (2) NULL
, PRIMARY KEY (id_estado)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Estados: " . $conn->error;	}

$sql = "CREATE TABLE $tableLogradouro (
id_logradouro INT(20) UNSIGNED NOT NULL
, logradouro VARCHAR(260) NULL
, id_cidade INT(20) UNSIGNED NOT NULL
, id_pessoa INT(20) UNSIGNED NOT NULL
, PRIMARY KEY (id_logradouro)
, FOREIGN KEY (id_cidade) REFERENCES Cidade(id_cidade)
, FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Logradouros: " . $conn->error;	}

$sql = "CREATE TABLE $tablePessoa (
id_pessoa INT(20) UNSIGNED NOT NULL
, nome VARCHAR(50) NULL
, sobrenome VARCHAR(50) NULL
, idade INT (3) NULL
, genero CHAR(1) NULL
, PRIMARY KEY (id_pessoa)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Pessoas: " . $conn->error;	}

$sql = "CREATE TABLE $tableProduto (
id_produto INT(20) UNSIGNED NOT NULL
, produto VARCHAR(50) NULL
, nrSerie VARCHAR(50) NULL
, precoUnitario INT(20) NULL
, id_fabricante INT(20) UNSIGNED NOT NULL
, PRIMARY KEY (id_produto)
, FOREIGN KEY (id_fabricante) REFERENCES Fabricante(id_fabricante)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Produtos: " . $conn->error;	}

$sql = "CREATE TABLE $tableFabricante (
id_fabricante INT(20) UNSIGNED NOT NULL
, fabricante VARCHAR(50) NULL
, nacional CHAR(6) NULL
, PRIMARY KEY (id_fabricante)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Fabricantes: " . $conn->error;	}

$sql = "CREATE TABLE $tablePedido (
id_pedido INT(20) UNSIGNED NOT NULL
, id_pessoa INT(20) UNSIGNED NOT NULL
, id_produto INT(20) UNSIGNED NOT NULL
, quantidade INT(20) NULL
, PRIMARY KEY (id_pedido)
, FOREIGN KEY (id_pessoa) REFERENCES Pessoa(id_pessoa)
, FOREIGN KEY (id_produto) REFERENCES Produto(id_produto)
)"; if ($conn->query($sql) === FALSE) {	echo "Erro de criaчуo da tabela de Pedidos: " . $conn->error;	}

// Realizando leitura do formulсrio de Cidades
$txt_file = fopen('formularioCidade.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
        $query ="INSERT INTO $tableCidade
			VALUES ( '".$val0."','".$val1."','".$val2."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Estados
$txt_file = fopen('formularioEstado.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
        $query ="INSERT INTO $tableEstado
			VALUES ( '".$val0."','".$val1."','".$val2."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Logradouros
$txt_file = fopen('formularioLogradouro.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
		$val3 = mysqli_real_escape_string($conn, $row[3]);
        $query ="INSERT INTO $tableLogradouro
			VALUES ( '".$val0."','".$val1."','".$val2."','".$val3."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Pessoas
$txt_file = fopen('formularioPessoa.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
		$val3 = mysqli_real_escape_string($conn, $row[3]);
		$val4 = mysqli_real_escape_string($conn, $row[4]);
        $query ="INSERT INTO $tablePessoa
			VALUES ( '".$val0."','".$val1."','".$val2."','".$val3."','".$val4."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Produtos
$txt_file = fopen('formularioProduto.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
		$val3 = mysqli_real_escape_string($conn, $row[3]);
		$val4 = mysqli_real_escape_string($conn, $row[4]);
        $query ="INSERT INTO $tableProduto
			VALUES ( '".$val0."','".$val1."','".$val2."','".$val3."','".$val4."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Fabricantes
$txt_file = fopen('formularioFabricante.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
        $query ="INSERT INTO $tableFabricante
			VALUES ( '".$val0."','".$val1."','".$val2."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

// Realizando leitura do formulсrio de Pedidos
$txt_file = fopen('formularioPedido.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
	array_push($array, $data);
}
fclose($txt_file);
// Realizando inserts
if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
		$val3 = mysqli_real_escape_string($conn, $row[3]);
        $query ="INSERT INTO $tablePedido
			VALUES ( '".$val0."','".$val1."','".$val2."','".$val3."' );";
		if ($conn->query($query) === FALSE) {
			echo "Erro de gravaчуo: " . $conn->error;
		}
    }
}

$conn->close();
?>