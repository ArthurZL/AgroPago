# AgroPago

## Objetivo
  Este projeto tem como finalidade desenvolver uma solução para os problemas apresentados no arquivo “Teste de Aptidão Técnica”, que tem por intuito avaliar as capacidades técnicas dos candidatos à vaga de estágio para a empresa AgroPago.

## Configuração de Ambiente
Para a realização da tarefa torna-se necessário realizar a instalação de alguns softwares, note que muitos destes podem ser substituídos por outros programas ou utilizar de versões diferentes. A seguir, segue uma lista de alguns softwares usados localmente para o desenvolvimento do projeto:
	<ul>
	<li>IDE Visual Studio Code 2019 <br />
		*Nota:* Usada a versão de 2019 por questões de compatibilidade <br />
		*Link de download:* https://visualstudio.microsoft.com/pt-br/vs/older-downloads/ </li>
	<li>Wampserver 3.2.6 (x64) <br />
		*Nota:* Software que efetua instalações de diversos outros softwares com finalidade de auxiliar a configurar o banco de dados local. <br />
		*Link de download:* https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.2.6_x64.exe/download/ </li>
	<li>Python 3.10.8 <br />
		*Nota:* Necessário para a instalação do “MySQL Connector Python 8.0.31” <br />
		*Link de download:* https://www.python.org/downloads/ </li>
	<li>MySQL Community <br />
		*Nota:* Banco de dados selecionado para o desenvolvimento, MySQL Workbench fou usado primariamente para execução de testes. <br />
		*Link de download:* https://dev.mysql.com/downloads/ </li>
	<li>MySQL Connector Python 8.0.31 <br />
		*Nota:* Necessário para a instalação do “MySQL Community” <br />
		*Link de download:* https://dev.mysql.com/downloads/connector/python/ </li>
	<li>MySQL for Visual Studio 1.2.10 <br />
		*Nota:* Necessário para a instalação do “MySQL Community” <br />
		*Link de download:* https://dev.mysql.com/downloads/windows/visualstudio/ </li>
  </ul>

## Considerações
Visto que para o desenvolvimento deste projeto utilizou-se Wampserver, os arquivos presentes neste repositório estavam sendo armazenados no caminho “...\wamp64\www\AgroPago”. Com isso, torna-se possível acessar o banco através da URL “http://localhost/phpmyadmin”, onde por padrão o usuário é “root” e a senha vazia. <br />
Com o acesso devidamente feito, pode-se rodar o arquivo “conexão.php” digitando na URL “http://localhost/AgroPago/conexao” para realizar a criação do banco de dados, criação da tabela e inserção dos dados. Após isto, para visualizar a tabela por completa, basta rodar o arquivo “index.php” digitando na URL “http://localhost/AgroPago/index”. <br />
A respeito dos formulários, para que novas informações sejam acrescentadas em uma tabela, basca adicionar uma nova linha no formulário correspondente a tabela desejada, com os devidos dados separados por ponto e vírgula.

## Tabelas
Todas as informações sensíveis, como nomes e endereços, presente neste repositório são meramente ilustrativos e não possuem quaisquer intenções de exposição explicita de dados. <br />
As tabelas tem por objetivo simular de maneira simplificada a comunicação interna entre tabelas de uma distribuidora do ramo da agronomia. A seguir será descrito um pequeno resumo sobre cada uma delas. <br />
Por questões de simplificação, a tabela Estados possui registrado apenas seis estados brasileiros, para cada um destes estados foram inseridas três cidades na tabela Cidade. A tabela Logradouro por sua vez só terá novos registros quando um novo cliente for adicionado na tabela Pessoa, essa decisão foi tomada em virtude dos problemas advindos de se adicionar todos os logradouros registrados em território brasileiro. <br />
A tabela Pessoa foi construída de forma a demonstrar a importância de se distinguir o cliente por seu Id, visto que foi previamente elaborada pensando no Desafio proposto no final deste artigo. No Desafio pode-se notar clientes com nomes e sobrenomes idênticos, sendo possível diferencia-los unicamente por seu Id. <br />
As tabelas Produto e Fabricante carregam informações importantes de negócio, sendo elas imprescindíveis na tomada de decisão. <br />
A tabela Pedido basicamente carrega consigo os Ids das clientes e de seus respectivos produtos solicitados, assim como a quantidade de cada mercadoria comprada naquele pedido.

## Desafio
Por fim, o Desafio proposto tenta simular uma chamada real por OS de um cliente interno desta distribuidora, o cliente se chama Roberto e é da área de negócios, ele deseja que o analista de dados construa uma tabela com algumas especificações, sendo elas:
<ul>
	<li>Roberto diz que as principais informações são o Números de Pedidos e os Números dos Cliente, ele não sabe, mas no banco de dados isso equivale ao id_pedido e ao id_pessoa, respectivamente.</li>
	<li>Deseja saber o preço total e a quantia de produtos comprados em cada número de pedido</li>
	<li>Pede o nome e sobrenome dos clientes, assim como a cidade, estado e o bairro em que vive. Roberto comenta que a informação completa contida no logradouro polui muito a tela, então se contenta apenas com o bairro.</li>
	<li>Solicita também qual produto foi comprado e seu respectivo fabricante</li>
	<li>Para os filtros, Roberto diz que precisa saber apenas das clientes mulheres</li>
	<li>Além disso, Roberto comenta que deve ser aplicado um filtro que traga o número do pedido apenas se a cliente tiver idade menor ou igual a cinquenta anos ou que a fabricante do produto comprada seja de uma empresa nacional</li>
	<li>Por fim, Roberto pede que a tabela seja ordenada pelo número do pedido de forma crescente</li>
</ul>