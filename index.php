<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cadastro</title>
    </head>
<body>
    <b>
        <font size="+2"> Tabela Cidade</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_cidade</th>
            <th>cidade</th>
            <th>id_estado</th>
        </tr>
        <?php
            include('conexao.php');
            // Criando conexão
            $conn = new mysqli($servername, $username, $password, $database);
            // Checando conex�o
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }
                // Selecionando a tabela completa
                $sql_code = "SELECT * FROM $tableCidade";
                $result = $conn->query($sql_code);
                // Se a tabela não estiver vazia, realiza os prints de acordo com o campo
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
					    echo "<tr>";
                        echo "<td>".$row['id_cidade']."</td>";
					    echo "<td>".$row['cidade']."</td>";
					    echo "<td>".$row['id_estado']."</td>";
					    echo "</tr>";
                    }
                } else{
                    echo "Sem resultados";
                }
                $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Estado</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_estado</th>
            <th>estado</th>
            <th>uf</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tableEstado";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_estado']."</td>";
                    echo "<td>".$row['estado']."</td>";
                    echo "<td>".$row['uf']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Logradouro</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_logradouro</th>
            <th>logradouro</th>
            <th>id_cidade</th>
            <th>id_pessoa</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tableLogradouro";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_logradouro']."</td>";
                    echo "<td>".$row['logradouro']."</td>";
                    echo "<td>".$row['id_cidade']."</td>";
                    echo "<td>".$row['id_pessoa']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Pessoa</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_pessoa</th>
            <th>nome</th>
            <th>sobrenome</th>
            <th>idade</th>
            <th>genero</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tablePessoa";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_pessoa']."</td>";
                    echo "<td>".$row['nome']."</td>";
                    echo "<td>".$row['sobrenome']."</td>";
                    echo "<td>".$row['idade']."</td>";
                    echo "<td>".$row['genero']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Produto</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_produto</th>
            <th>produto</th>
            <th>nrSerie</th>
            <th>precoUnitario</th>
            <th>id_fabricante</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tableProduto";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_produto']."</td>";
                    echo "<td>".$row['produto']."</td>";
                    echo "<td>".$row['nrSerie']."</td>";
                    echo "<td>".$row['precoUnitario']."</td>";
                    echo "<td>".$row['id_fabricante']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Fabricante</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_fabricante</th>
            <th>fabricante</th>
            <th>nacional</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tableFabricante";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_fabricante']."</td>";
                    echo "<td>".$row['fabricante']."</td>";
                    echo "<td>".$row['nacional']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
    <br />
    <b>
        <font size="+2"> Tabela Pedido</font>
    </b>
    <table border='1'>
        <tr>
            <th>id_pedido</th>
            <th>id_pessoa</th>
            <th>id_produto</th>
            <th>quantidade</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $tablePedido";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['id_pedido']."</td>";
                    echo "<td>".$row['id_pessoa']."</td>";
                    echo "<td>".$row['id_produto']."</td>";
                    echo "<td>".$row['quantidade']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
        <br />
        <b><font size="+2"> Desafio: </font>A tabela a seguir eh o resultado de um desafio proposto com o intuito de simular de forma mais real uma manipulacao de dados com base nas tabelas criadas. <br />
        Para a descricao completa do desafio, olhar o "README" presente no repositorio do GitHub.</b>
    <table border='1'>
        <tr>
            <th>Nr Pedido</th>
            <th>Nr Cliente</th>
            <th>Preco Total</th>
            <th>Quantidade</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Produto</th>
            <th>Fabricante</th>
            <th>Estado</th>
            <th>Cidade</th>
            <th>Bairro</th>
        </tr>
        <?php
            include('conexao.php');
            $conn = new mysqli($servername, $username, $password, $database);
            if ($conn->connect_error) {
                die("Falha na conex�o: " . $conn->connect_error);
            }
            //Para melhor visualização, optou-se por não usar quaisquer $table...
            $sql_code = "
                SELECT Pedido.id_pedido AS 'Nr Pedido'
                , Pessoa.id_pessoa AS 'Nr Cliente'
                , (produto.precoUnitario * pedido.quantidade) AS 'Preco Total'
                , Pedido.quantidade AS Quantidade
                , Pessoa.nome AS Nome
                , Pessoa.sobrenome AS Sobrenome
                , Produto.produto AS Produto
                , Fabricante.fabricante AS Fabricante
                , Estado.estado AS Estado
                , Cidade.cidade AS Cidade
                , (SUBSTRING_INDEX(logradouro, ',', 1)) AS Bairro
                FROM Pedido
                LEFT JOIN Pessoa ON Pessoa.id_pessoa = Pedido.id_pessoa
                LEFT JOIN Produto ON Produto.id_produto = Pedido.id_produto
                LEFT JOIN Fabricante ON Fabricante.id_fabricante = Produto.id_fabricante
                LEFT JOIN Logradouro ON Logradouro.id_pessoa = Pessoa.id_pessoa
                LEFT JOIN Cidade ON Cidade.id_cidade = Logradouro.id_cidade
                LEFT JOIN Estado ON Estado.id_estado = Cidade.id_estado
                WHERE 1=1
                AND Pessoa.genero = 'F'
                AND (Pessoa.idade <= 50 OR Fabricante.nacional = 'Sim')
                ORDER BY Pedido.id_pedido ASC;
                ";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['Nr Pedido']."</td>";
                    echo "<td>".$row['Nr Cliente']."</td>";
                    echo "<td>".$row['Preco Total']."</td>";
                    echo "<td>".$row['Quantidade']."</td>";
                    echo "<td>".$row['Nome']."</td>";
                    echo "<td>".$row['Sobrenome']."</td>";
                    echo "<td>".$row['Produto']."</td>";
                    echo "<td>".$row['Fabricante']."</td>";
                    echo "<td>".$row['Estado']."</td>";
                    echo "<td>".$row['Cidade']."</td>";
                    echo "<td>".$row['Bairro']."</td>";
                    echo "</tr>";
                }
            } else{
                echo "Sem resultados";
            }
            $conn->close();
        ?>
    </table>
</body>
</html>