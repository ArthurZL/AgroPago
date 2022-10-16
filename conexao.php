<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cadastro';
$table = 'pessoas_produto';

// Criando conex�o
$conn = new mysqli($servername, $username, $password);
// Checando conex�o
if ($conn->connect_error) {
	die("Falha na conex�o: " . $conn->connect_error);
}

// Create database
$newdb = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($newdb) === TRUE) {
    echo "Database $dbname criada com sucesso -> ";
} else {
    echo "Erro ao criar database: " . $conn->error;
}

// Criando conex�o
$conn = new mysqli($servername, $username, $password, $dbname);
// Checando conex�o
if ($conn->connect_error) {
	die("Falha na conex�o: " . $conn->connect_error);
}

//Excluir tabela se ela j� existir
$drop = "DROP TABLE IF EXISTS $table";
if ($conn->query($drop) === TRUE) {
	echo "Tabela $table deletada -> ";
}else{
	echo "Erro ao excluir tabela: " . $conn->error;
}

// Criando tabela
$sql = "CREATE TABLE $table (
Id_Pessoa_Produto INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Id_Pessoa INT(6) UNSIGNED,
Nome VARCHAR(30) NOT NULL,
Sobrenome VARCHAR(30) NOT NULL,
Idade int(11),
Genero VARCHAR(10),
ID_Produto INT(6) UNSIGNED,
Produto VARCHAR(30),
Data_Registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
	echo "Tabela Pessoas foi criada com sucesso -> ";
} else {
	echo "Erro de cria��o de tabela: " . $conn->error;
}

//Tentativa de realizar inserts com explode, lendo de um txt, a qual possuia seus elementos separados por ponto e v�rgula
//ERRO: Convers�o de Array para String de forma que pudesse ser feito os inserts no MySQL

$txt_file = fopen('formulario.txt','r');
$array = array();
while ($line = fgets($txt_file)) {
	$data = array();
	$data = explode(";", $line);
    array_push($array, $data);
}
fclose($txt_file);

if(is_array($array)){
    foreach ($array as $row) {
        $val0 = mysqli_real_escape_string($conn, $row[0]);
        $val1 = mysqli_real_escape_string($conn, $row[1]);
        $val2 = mysqli_real_escape_string($conn, $row[2]);
		$val3 = mysqli_real_escape_string($conn, $row[3]);
		$val4 = mysqli_real_escape_string($conn, $row[4]);
		$val5 = mysqli_real_escape_string($conn, $row[5]);
		$val6 = mysqli_real_escape_string($conn, $row[6]);
        $query ="INSERT INTO $table (Id_Pessoa, Nome, Sobrenome, Idade, Genero, ID_Produto, Produto)
			VALUES ( '".$val0."','".$val1."','".$val2."','".$val3."','".$val4."','".$val5."','".$val6."' );";
		if ($conn->query($query) === TRUE) {
			echo "dados gravados ";
		} else {
			echo "Erro de grava��o: " . $conn->error;
		}
    }
}
$conn->close();
?>