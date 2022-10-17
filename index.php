<html>
    <body>
        <table>
            <tr>
                <th>Id_Pessoa_Produto</th>
                <th>Id_Pessoa</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Genero</th>
                <th>ID_Produto</th>
                <th>Produto</th>
                <th>Data_Registro</th>
            </tr>
            <?php

            include('conexao.php');

            //Criando conexão
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Checando conexão
            if ($conn->connect_error) {
            	die("Falha na conexão: " . $conn->connect_error);
            }

            $sql_code = "SELECT * FROM $table";
            $result = $conn->query($sql_code);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
					echo "<tr>";
                    echo "<td>".$row['Id_Pessoa_Produto']."</td>";
					echo "<td>".$row['Id_Pessoa']."</td>";
					echo "<td>".$row['Nome']."</td>";
					echo "<td>".$row['Sobrenome']."</td>";
					echo "<td>".$row['Idade']."</td>";
					echo "<td>".$row['Genero']."</td>";
					echo "<td>".$row['ID_Produto']."</td>";
					echo "<td>".$row['Produto']."</td>";
					echo "<td>".$row['Data_Registro']."</td>";
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