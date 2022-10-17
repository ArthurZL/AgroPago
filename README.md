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
A tabela “pessoas_produto” por sua vez tem por objetivo simular uma tabela intermediária entre as tabelas fictícias “pessoas” e “produto”, normalmente estas tabelas conteriam apenas Ids, mas para fins de melhor visualização, foi adicionado a ela as descrições correspondentes de cada pessoa e produto.
