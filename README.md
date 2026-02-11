<h1>🌿 Planti</h1>
<p>Planti é uma aplicação web desenvolvida com CodeIgniter 4 para ajudar no gerenciamento do cuidado com plantas. Com ela, você pode cadastrar plantas, registrar cuidados, organizar tipos e acompanhar todas as atividades.</p>

<h2>🚀 Tecnologias Utilizadas</h2>
<ul>
   <li><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" width="20" height="20" /> PHP 8.x</li>
   <li><img src="https://cdn.worldvectorlogo.com/logos/codeigniter.svg" width="20" height="20" /> CodeIgniter 4</li>
   <li><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg" width="20" height="20" /> MySQL</li>
   <li><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/composer/composer-original.svg" width="20" height="20" /> Composer</li>
   <li><img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/docker/docker-original.svg" width="20" height="20" /> Docker</li>
</ul>
<h2>Screen Shots</h2>

Login</br>
<img width="500" height="350" alt="login" src="https://github.com/user-attachments/assets/e18e8bc5-d3bc-43a4-8924-36e2dfa7b33a" />

Home</br>
<img width="500" height="350" alt="{3986BB23-DBBD-426B-83DE-E363457FE53D}" src="https://github.com/user-attachments/assets/f88c1ddd-1c59-4e51-be4a-3ff132b28d84" />

Detalhe de Cuidados</br>
<img width="500" height="350" alt="{00DE2870-31FD-415D-A276-50A2522E2573}" src="https://github.com/user-attachments/assets/2f79d7ce-e2f4-45fd-a8cb-f3220ce218c3" />

Cadastro de Plantas</br>
<img width="500" height="350" alt="{AA61F3DF-206F-4682-B647-035E2CA3E1F1}" src="https://github.com/user-attachments/assets/866675e7-8de6-4941-a73a-6cc23a8b588e" />

Edição de Cuidados e Menu
<img width="500" height="350" alt="{D7684F11-48B1-43BA-8736-ADD0C0D33C17}" src="https://github.com/user-attachments/assets/bc555e41-7b1f-4663-941f-6f764f7d7f15" />

<h3>📦 Instalação</h3>
<p>Siga os passos abaixo para rodar o projeto localmente.</p>

<h3>1. Clone o repositório</h3>
<p>git clone https://github.com/leonardomarcattidasilva/planti.git</p>
<p>cd planti</p>

<h3>2. Build e execução do container</h3>
<p>docker compose up -d --build</p>
<p>Nas próximas vezes que iniciar o container deve-se remover a flag --build do comando anterior "docker compose up -d"</p>

<h3>3. Copie o arquivo de ambiente</h3>
<p>Renomeie o arquivo .env_example para .env com os dados de conexão com seu MySQL.</p>
<p>Remova o comentário da linha de ambiente e o renomeie como production</p>
<b>CI_ENVIRONMENT = production</b>

<p>Em app/Config/App.php altere a linha para public string $baseURL = 'http://localhost:3000'</p>
<p><b>O servidor estará acessível em: http://ip_server:3000</b></p>

<p>Em app/Config/Database altere as configurações do banco de dados para:</p>
<p>'hostname'     => '127.0.0.1',</p>
<p>'username'     => 'admin',</p>
<p>'password'     => '9x*UwARA5@',</p>
<p>'database'     => 'planti',</p>
<p>'DBDriver'     => 'MySQLi',</p>

<h4>📚 Rotas da Aplicação</h4>
<h5>🔐 Autenticação</h5>
Método	Rota	Descrição
<p>GET	/login	Página de login</p>
<p>POST	/loginAction	Processa o login</p>
<p>GET	/logup	Página de cadastro</p>
<p>POST	/logupAction	Processa o cadastro</p>
<p>GET	/logout	Logout</p>

<h4>🌱 Plantas</h4>
<h5>Método Rota Descrição</h5>
<p>GET	/	Página inicial</p>
<p>GET	/cadastroPlanta	Formulário de cadastro de planta</p>
<p>POST	/cadastrar	Cadastra uma planta</p>
<p>GET	/planta	Lista de plantas</p>
<p>GET	/detalhes	Visualiza detalhes de uma planta</p>
<p>GET	/editar	Formulário de edição</p>
<p>POST	/updatePlanta	Atualiza dados da planta</p>
<p>GET	/deletar	Confirmação de exclusão</p>
<p>POST	/confirmadeletar	Deleta a planta</p>

<h4>🪴 Tipos de Planta</h4>
<h5>Método Rota Descrição</h5>
<p>GET	/tipos	Cadastro de tipos de planta</p>
<p>POST	/cadastrarTipo	Cadastra novo tipo</p>

<h4>💧 Cuidados</h4>
<h5>Método Rota Descrição</h5>
<p>GET	/adicionarCuidados	Formulário de adicionar cuidado</p>
<p>POST	/cadastrarCuidado	Cadastra novo cuidado</p>
<p>GET	/editarCuidado	Página de edição de cuidado</p>
<p>POST	/updateCuidado	Atualiza dados do cuidado</p>
<p>GET	/deletarCuidado	Página de confirmação de exclusão</p>
<p>GET	/cuidadosTodas	Lista visual de todos os cuidados</p>
<p>POST	/cuidados	API para todos os cuidados</p>
<p>GET	/cuidadosTipos	Lista visual filtrada por tipo</p>
<p>POST	/cuidadosTipo	API para cuidados por tipo</p>

<h4>✅ Outros</h4>
<h5>Método Rota Descrição</h5>
<p>GET	/done	Tela de confirmação</p>
<p>GET	/success	Mensagem de sucesso</p>

<h3>🧪 Testes</h3>
<p>Se houver testes implementados:</p>
php vendor/bin/phpunit

<h4>🙋 Contribuições</h4>
<p>Contribuições são muito bem-vindas! Sinta-se à vontade para abrir uma issue ou enviar um pull request com melhorias.</p>

<h4>📄 Licença</h4>
<p>Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais informações.</p>
