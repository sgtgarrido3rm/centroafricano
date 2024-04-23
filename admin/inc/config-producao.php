<?php
	/**
	* Criado em 23/06/2014.
	* 
	* Arquivo de configuracao da aplicacao.
	* 
	* @author Sgt Garrido (garrido@3rm.eb.mil.br)
	* @version 0.0.1	
	*/
	@session_start();
	error_reporting(E_ALL);
	// @header("Content-type: text/html; charset=utf-8");

	/**
	 * Define a data final do processo seletivo
	 *
	 * @name DIAFIM
	 * ex = "dd/mm/aaaa"
	 */
	define("DIAFIM","1/08/2017");

	/**
	 * Define o ano
	 *
	 * @name ANO
	 * ex = "aaaa"
	 */
	define("ANO",date('Y'));

	/**
	 * Define o servidor do banco de dados da aplicacao
	 *
	 * @name SERVIDOR
	 */
	define("SERVIDOR","10.25.111.161");
	
	/**
	 * Define o usuario do banco de dados da aplicacao
	 *
	 * @name USUARIO
	 */	
	define("USUARIO","web_mfdv");
	
	/**
	 * Define o senha do banco de dados da aplicacao
	 *
	 * @name SENHA
	 */	
	define("SENHA","vaST5xeS");
		
	/**
	 * Define o banco utilizado na aplicacao
	 *
	 * @name BANCO
	 */	
	define("BANCO","3rm_mfdv");
		
	/**
	 * Define o tipo de banco de dados da aplicacao
	 *
	 * @name TIPO_BANCO
	 */	
	define("TIPO_BANCO","mysql");
	
	/**
	 * Define o titulo do projeto
	 *
	 * @name TITULO
	 */
	$proximoAno = ANO + 1;
	define("TITULO","Formulário de Inscrição MFDV ".ANO."/".$proximoAno);	

	/**
	 * Define a imagem do rodape
	 *
	 * @name IMG_RODAPE
	 */
	define("IMG_RODAPE","");

	/**
	 * Define a imagem do banner das paginas internas
	 *
	 * @name BANNER
	 */
	define("BANNER",'<img src="../images/Banner_cabecalho_site.jpg" width="780" height="90" />');

	/**
	 * Define a imagem do banner na pagina principal
	 *
	 * @name BANNER_INDEX
	 */
	define("BANNER_INDEX",'<img src="images/Banner_cabecalho_site.jpg" width="780" height="90" />');

	/**
	 * Define a imagem do banner do gerenciador
	 *
	 * @name BANNER_GERENCIADOR
	 */
	define("BANNER_GERENCIADOR",'<img src="../../images/Banner_cabecalho_site.jpg" width="780" height="90" />');


	/**
	 * Define a mensagem de acesso negado
	 *
	 * @name MSG_ACESSO_NEGADO
	 */
	define("MSG_ACESSO_NEGADO",'Você não está autorizado. Faça o login');

	/**
	 * Define a mensagem de erro de conexao com o bd
	 *
	 * @name MSG_ACESSO_NEGADO_BD
	 */
	define("MSG_ACESSO_NEGADO_BD",'ERRO DE CONEXÃO. FAVOR CONTACTAR O SERVIÇO MILITAR');

	/**
	 * Define a mensagem de erro de gravação dos dados no bd
	 *
	 * @name MSG_ERRO_GRAVAR_BD
	 */
	define("MSG_ERRO_GRAVAR_BD",'ERRO AO GRAVAR OS DADOS. FAVOR CONTACTAR O SERVIÇO MILITAR');

	/**
	 * Define a mensagem de consulta vazia
	 *
	 * @name MSG_CONSULTA_VAZIA
	 */
	define("MSG_CONSULTA_VAZIA",'ESTA CONSULTA NÃO RETORNOU NENHUM RESULTADO');

	/**
	 * Define a mensagem de usuario/senha inválido
	 *
	 * @name MSG_CONSULTA_VAZIA
	 */
	define("MSG_USUARIO_SENHA",'USUÁRIO/SENHA INVÁLIDO');

	/**
	 * Define a mensagem de dados gravados com sucesso
	 *
	 * @name MSG_SUCESSO
	 */
	define("MSG_SUCESSO",'DADOS GRAVADOS COM SUCESSO');

	/**
	 * Define a mensagem de dados gravados com sucesso
	 *
	 * @name MSG_SUCESSO
	 */
	define("MSG_ERRO_EMAIL",'Dados gravados com sucesso.<br />E-mail de confirmação não foi enviado.');

	/**
	 * Define a mensagem de dados atualizados com sucesso
	 *
	 * @name MSG_ATUALIZACAO_SUCESSO
	 */
	define("MSG_ATUALIZACAO_SUCESSO",'DADOS ATUALIZADOS COM SUCESSO');

	/**
	 * Define a mensagem de cpf inválido
	 *
	 * @name MSG_CPF_INVALIDO
	 */
	define("MSG_CPF_INVALIDO",'Usuário/senha inválidos');

/**
	 * Define a mensagem de logoff
	 *
	 * @name MSG_LOGOFF_SUCESSO
	 */
	define("MSG_LOGOFF_SUCESSO",'Logoff realizado com sucesso!');

	/**
	 * Define o e-mail do administrador da 3ª RM
	 *
	 * @name EMAIL
	 */	
	define("EMAIL","sermilmfdv@3rm.eb.mil.br");
	
	/**
	 * Define o asssunto da inscricao
	 *
	 * @name ASSUNTO
	 */

	define("ASSUNTO","3RM - Inscrição MFDV ".ANO."/".$proximoAno);
	
	/**
	 * Define o nome que aparecera no remetente dos e-mails
	 *
	 * @name NOME_EMAIL
	 */
	define("NOME_EMAIL","Serviço Militar da 3ª RM");
	
	/**
	 * Define o dominio do site
	 *
	 * @name DOMINIO
	 */
	define("DOMINIO","http://".$_SERVER['HTTP_HOST']."/Servico_Militar/inscricao/mfdv".ANO."/");	//SERVIDOR WWW

	/**
	 * Define o caminho dos arquivos
	 *
	 * @name PATH
	 */
	define("PATH",$_SERVER['DOCUMENT_ROOT']."/Servico_Militar/inscricao/mfdv".ANO."/"); //produção

	/**
	 * Define o nome que aparecera no remetente dos e-mails
	 *
	 * @name NOME_EMAIL
	 */
	define("ARQUIVO_LOGS",PATH."/logs/log_".date('d-m-y').".log");
	
	/**
	 * Define o tipo de telefone do representante para exibição
	 *
	 * @name TIPO_TELEFONE
	 */
	define("TIPO_TELEFONE","Coml");
	
	/**
	 * Define o idoma do site
	 *
	 * @name IDIOMA
	 * 1 = PT-BR
	 * 2 = Ingles
	 */
	define("IDIOMA","1");
	
	/**
	* DEFINIÇÃO DINÂMICA DA CONSTANTE DO DIRETÓRIO DAS CLASSES
	* 
	* @author Garrido <garrido@3rm.eb.mil.br>
	*/
	if(is_dir("classe"))	
	{	
	 	define("CAMINHO_CLASSE","classe/");
	}
	elseif(is_dir("../classe"))
	{
	 	define("CAMINHO_CLASSE","../classe/");
	}
	elseif(is_dir("../../classe"))
	{
	 	define("CAMINHO_CLASSE","../../classe/");
	}elseif(is_dir("../../../classe"))
	{
	 	define("CAMINHO_CLASSE","../../../classe/");
	}

	/**
	* DEFINIÇÃO DINÂMICA DA CONSTANTE DO DIRETÓRIO DE INCLUDES
	* 
	* @author Garrido <garrido@3rm.eb.mil.br>
	*/
	if(is_dir("inc"))
	{	
	 	define("CAMINHO_INCLUDE","inc/");
	}
	elseif(is_dir("../inc"))
	{
	 	define("CAMINHO_INCLUDE","../inc/");
	}
	elseif(is_dir("../../inc"))
	{
	 	define("CAMINHO_INCLUDE","../../inc/");
	}elseif(is_dir("../../../inc"))
	{
	 	define("CAMINHO_INCLUDE","../../../inc/");
	}


	// Includes necessarios
	require_once(CAMINHO_INCLUDE . 'Funcao.php');
	require_once(CAMINHO_CLASSE.'Utils/Conexao.php');	
	// Funcao padrao que trata todos os tipos de excecoes que ocorrerem
	set_error_handler('TratarErro');
?>