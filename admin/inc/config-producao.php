<?php
	/**
	* Criado em 23/06/2014.
	* 
	* Arquivo de configuracao da aplicacao.
	* 
	* @author Sgt Garrido (sgtgarrido3rm@gmail.com)
	* @version 0.0.1	
	*/
	@session_start();
	error_reporting(E_ALL);
	@header("Content-type: text/html; charset=utf-8");

	/**
	 * Define o servidor do banco de dados da aplicacao
	 *
	 * @name SERVIDOR
	 */
	define("SERVIDOR","localhost");
	
	/**
	 * Define o usuario do banco de dados da aplicacao
	 *
	 * @name USUARIO
	 */	
	define("USUARIO","gisrsi");
	
	/**
	 * Define o senha do banco de dados da aplicacao
	 *
	 * @name SENHA
	 */	
	define("SENHA","paksiulum");
		
	/**
	 * Define o banco utilizado na aplicacao
	 *
	 * @name BANCO
	 */	
	define("BANCO","gisrsi_centroafricano");
		
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
	define("TITULO","Centro Africano Oxalá e Iemanjá");	

	/**
	 * Define a imagem do rodape
	 *
	 * @name IMG_RODAPE
	 */
	define("IMG_RODAPE","");

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
	define("MSG_ACESSO_NEGADO_BD",'ERRO DE CONEXÃO.');

	/**
	 * Define a mensagem de erro de gravação dos dados no bd
	 *
	 * @name MSG_ERRO_GRAVAR_BD
	 */
	define("MSG_ERRO_GRAVAR_BD",'ERRO AO GRAVAR OS DADOS.');

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
	define("MSG_ERRO_EMAIL",'Dados gravados com sucesso.');

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
	 * Define o e-mail do administrador
	 *
	 * @name EMAIL
	 */	
	define("EMAIL","sgtgarrido3rm@gmail.com");
	
	/**
	 * Define o asssunto do E-Mail
	 *
	 * @name ASSUNTO
	 */

	define("ASSUNTO","Centro Africano Oxalá e Iemanjá");
	
	/**
	 * Define o nome que aparecera no remetente dos e-mails
	 *
	 * @name NOME_EMAIL
	 */
	define("NOME_EMAIL","Pai Fábio de Oxalá");
	
	/**
	 * Define o dominio do site
	 *
	 * @name DOMINIO
	 */
	define("DOMINIO","http://".$_SERVER['HTTP_HOST']."/");	//SERVIDOR WWW

	/**
	 * Define o caminho dos arquivos
	 *
	 * @name PATH
	 */
	define("PATH",$_SERVER['DOCUMENT_ROOT']."/"); //produção

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
	* @author Garrido <sgtgarrido3rm@gmail.com>
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
	* @author Garrido <sgtgarrido3rm@gmail.com>
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

	require_once('Funcao.php');
	
	//require_once(CAMINHO_CLASSE.'Utils/Conexao.php');	

	// Funcao padrao que trata todos os tipos de excecoes que ocorrerem
	set_error_handler('TratarErro');
?>