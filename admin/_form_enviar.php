<?php
/**
* Criado em 25/04/2024.
* 
* Ações específicas para a entidade Evento
* 
* @author Luis Olavo Garrido (sgtgarrido3rm@gmail.com)
* @version 0.0.1
*/

require_once($_SERVER['DOCUMENT_ROOT'].'/centroafricano/admin/inc/config.php'); //configuração do sistema
//require_once(CAMINHO_CLASSE.'Utils/CriptografarSenha.php');

$acao 	= $_POST["hdnAcao"];

foreach ($_POST as $key => $value) {
    echo $key ." - ". $value.'<br/>';
    //if (substr($key,0,13) == "txtPrioridade") {
    if (substr($key,0,11) == "prioridade_") {
        $idCidade 		= soNumero($key);
        $nroPrioridade 	= $value;
        $arrRanking[] = array("CidadeID" => $idCidade, "Prioridade" => $nroPrioridade);
    }
}
/*echo "<pre>";
var_dump($arrRanking);*/

$repetido = ExisteRepetido($arrRanking,'Prioridade');

if($repetido){
    $veioURL = $_SERVER['HTTP_REFERER'];
    $pos = strpos($veioURL, 'editarCadastro.php');

    if($pos > 0){
    	header("location: ".$_SERVER['HTTP_REFERER']."?cod=".md5(5));
    }else{
    	header("location: ".DOMINIO."index.php?cod=" . md5(10));	
    }
}

//debug($acao);
switch ($acao){
	case "cadastraCandidato":			
		include(PATH . 'classe/RN/PessoaRN.php');	

		$Nome					= ucwords(strtolower(EvitarInjecao($_POST['txtNome'])));
		$Sexo					= preg_replace('/[^[:alpha:]_]/','',$_POST['selSexo']);
		$Situacao				= preg_replace('/[^[:alpha:]_]/','',$_POST['selSituacao']);
		$RA                     = preg_replace('/[^0-9]/','',RetirarMascara($_POST['txtRA']));
		$Forca					= preg_replace('/[^[:alpha:]_]/','',$_POST['selForca']);
		$CPF					= EvitarInjecao(preg_replace('/[^0-9]/','',RetirarMascara($_POST['txtCPF'])));
		$Senha                  = Bcrypt::hash(EvitarInjecao($_POST['txtSenha']), 12);
		$Senha2                 = Bcrypt::hash(EvitarInjecao($_POST['txtSenha2']), 12);	
		$Identidade             = EvitarInjecao($_POST['txtIdentidade']);
		$OrgaoExpedidor         = EvitarInjecao(ucwords(strtolower($_POST['txtOrgaoExpedidor'])));
		$Nacionalidade          = EvitarInjecao(ucwords(strtolower($_POST['txtNacionalidade'])));
		$Naturalidade           = EvitarInjecao(ucwords(strtolower($_POST['txtNaturalidade'])));
		$DataNascimento 		= EvitarInjecao($_POST['txtDataNascimento']);
		$NomeMae                = EvitarInjecao(ucwords(strtolower($_POST['txtNomeMae'])));
		$NomePai                = EvitarInjecao(ucwords(strtolower($_POST['txtNomePai'])));
		$Cep 					= EvitarInjecao(ucwords(strtolower($_POST['txtCEP'])));
		$Rua               		= EvitarInjecao(ucwords(strtolower($_POST['txtRua'])));
		$Numero            		= EvitarInjecao(ucwords(strtolower($_POST['txtNumero'])));
		$Complemento       		= EvitarInjecao(ucwords(strtolower($_POST['txtComplemento'])));
		$Bairro           		= EvitarInjecao(ucwords(strtolower($_POST['txtBairro'])));
		$Cidade                 = EvitarInjecao(ucwords(strtolower($_POST['txtCidade'])));
		$Uf 					= EvitarInjecao(strtoupper(($_POST['txtUf'])));			
		$FoneRes                = EvitarInjecao($_POST['txtFoneRes']);
		$Celular                = EvitarInjecao($_POST['txtCelular']);
		$Formacao               = preg_replace('/[^0-9]/','',$_POST['hdnFormacaoID']);		

		$nroInscricao 			= $CPF.strtoupper($tipo).$Formacao;

		//debug($nroInscricao);

		if(ValidarEmail(strtolower($_POST['txtEmail']))){
			$Email = strtolower($_POST['txtEmail']);
		}else{
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));
		}

		if($CPF == ''){
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));	
		}
		
		$Browser = getBrowser();
		
		$PessoaRN	= new PessoaRN();
		$pessoa		= new stdClass();

		$pessoa->NroInscricao 		= $nroInscricao;
		$pessoa->DataHoraCadastro	= date("Y-m-d H:i:s");			
		$pessoa->Nome				= $Nome;		

		if($Sexo == 'M'){								
			$pessoa->Sexo = $Sexo;
		}else if($Sexo == 'F'){				
			$pessoa->Sexo = $Sexo;
		}else{
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));
		}	

		$pessoa->Situacao			= $Situacao;
		$pessoa->RA 				= $RA;
		$pessoa->Forca 				= $Forca;
		$pessoa->CPF				= $CPF;
		$pessoa->Senha				= $Senha;
		$pessoa->Senha2				= $Senha2;
		$pessoa->Identidade			= $Identidade;
		$pessoa->DataNascimento		= $DataNascimento;
		$pessoa->OrgaoExpedidor		= $OrgaoExpedidor;
		$pessoa->Nacionalidade		= $Nacionalidade;
		$pessoa->Naturalidade		= $Naturalidade;
		$pessoa->Cep				= $Cep;	
		$pessoa->Rua				= $Rua;		
		$pessoa->Numero				= $Numero;
		$pessoa->Complemento		= $Complemento;	
		$pessoa->Bairro				= $Bairro;
		$pessoa->Cidade				= $Cidade;
		$pessoa->Uf 				= $Uf;
		$pessoa->DataNascimento		= $DataNascimento;
		$pessoa->NomeMae			= $NomeMae;
		$pessoa->NomePai			= $NomePai;
		$pessoa->FoneRes			= $FoneRes;
		$pessoa->Celular			= $Celular;
		$pessoa->Email				= $Email;
		$pessoa->Formacao			= $Formacao;			
		$pessoa->Browser 			= $Browser;
		$pessoa->Tipo 				= $tipo;
		$pessoa->Ranking 			= $arrRanking;

		$inscrExiste = $PessoaRN->Existir($pessoa);

		if($inscrExiste)
			header("location: ".DOMINIO."index.php?cod=" . md5("11"));

//debug($pessoa);
		$Cadastrou 	= $PessoaRN->Salvar($pessoa);

		if($Cadastrou){
			include(PATH . 'classe/RN/RankingRN.php');
			$RankingRN	= new RankingRN();
			$ranking	= new stdClass();

			$ranking->NroInscricao 	= $pessoa->NroInscricao;
			$ranking->Ranking 		= $arrRanking;
			$ranking->DataHora 		= $pessoa->DataHoraCadastro;

			$CadastrouRanking 	= $RankingRN->Salvar($ranking);
		}

		if($CadastrouRanking){
			#########################################
			#Inicia a classe PHPMailer 
			$mail = new PHPMailer();
			#Define os dados do servidor e tipo de conexão 
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			$mail->Host = "smtp.1cta.eb.mil.br"; // Endereço do servidor SMTP
			$mail->SMTPAuth = false; // Autenticação
			// $mail->Username = 'usuario@3rm.eb.mil.br'; // Usuário do servidor SMTP
			$mail->Password = ''; // Senha da caixa postal utilizada
			#Define o remetente 
			$mail->From = "selecao_svtt@3rm.eb.mil.br"; 
			$mail->FromName = NOME_EMAIL;
	    		#Define os destinatário(s) 
			$mail->AddAddress($Email, $Nome);
			// $mail->AddCC('garrido@3rm.eb.mil.br', 'Sgt Garrido'); // Cópia
			$mail->AddBCC('garrido@3rm.eb.mil.br', 'Sgt Garrido'); // Cópia Oculta			
	    		#Define os dados técnicos da Mensagem 
	    		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
			#Texto e Assunto
			$mail->Subject  = ASSUNTO; // Assunto da mensagem
			$mensagem = "<p>Formulário enviado via site www.3rm.eb.mil.br, através do formulário de pré-inscrição:</p>
				
				Inscrção: ".$nroInscricao." <br> 
				Nome: ".$Nome." <br>
				E-mail: ".$Email." <br>
				CPF: ".$CPF." <br>
				Sua senha de acesso é: <strong>".$_POST['txtSenha']."</strong> <br>				
				<p>&nbsp;</p> 
				 
				------------------------------------------------------------------------------<br>
				|Essas informações foram enviadas para o banco de dados da 3ª Região Militar.|<br>
				|Esse e-mail é apenas um informativo de pré-inscrição.                       |<br>
				------------------------------------------------------------------------------<br>
				 <br>
				3ª Região Militar/Serviço Militar<br>
				(51) 3220-6352";
			
			$mail->Body = $mensagem;				
	    	#Envio da Mensagem 
	    	$enviado = $mail->Send();		    
    		#Limpa os destinatários e os anexos 
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
    		#Exibe uma mensagem de resultado 
			if($enviado){
				header("location: ".DOMINIO."index.php?cod=" . md5("6") ."&inscr=".$nroInscricao);
				exit();
			}else{
				//MSG caso tenha cadastrado e não tenha enviado o e-mail
				header("location: ".DOMINIO."index.php?cod=" . md5("8") ."&inscr=".$nroInscricao);				
				exit();
			}
			#########################################
			
		}else{				
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));
		}		
	break;

	case "atualizarEvento":			
		include(PATH . 'classe/RN/EventoRN.php');			

		$EventoID 	= EvitarInjecao($_POST['hdnEventoID']);
		$Titulo		= EvitarInjecao($_POST['txtTituloEvento']);
		$DataHora	= EvitarInjecao($_POST['txtDataHoraEvento']);
		$Endereco 	= EvitarInjecao($_POST['txtEndereco']);
		$Ativo 		= EvitarInjecao($_POST['chkAtivo']);
		
		$EventoRN	= new EventoRN();
		$evento		= new stdClass();

		$evento->EventoID 	= $EventoID;
		$evento->Titulo		= $Titulo;
		$evento->DataHora	= $DataHora;
		$evento->Endereco	= $Endereco;
		$evento->Ativo		= $Ativo;		

		$Cadastrou 	= $EventoRN->Salvar($evento);
		
		if($Cadastrou){	
			#########################################
			#Inicia a classe PHPMailer 
			$mail = new PHPMailer();
			#Define os dados do servidor e tipo de conexão 
			$mail->IsSMTP(); // Define que a mensagem será SMTP
			$mail->Host = "smtp.1cta.eb.mil.br"; // Endereço do servidor SMTP
			$mail->SMTPAuth = false; // Autenticação
			// $mail->Username = 'usuario@3rm.eb.mil.br'; // Usuário do servidor SMTP
			$mail->Password = ''; // Senha da caixa postal utilizada
			#Define o remetente 
			$mail->From = "selecao_svtt@3rm.eb.mil.br"; 
			$mail->FromName = NOME_EMAIL;
	    		#Define os destinatário(s) 
			$mail->AddAddress($Email, $Nome);
			// $mail->AddCC('garrido@3rm.eb.mil.br', 'Sgt Garrido'); // Cópia
			$mail->AddBCC('garrido@3rm.eb.mil.br', 'Sgt Garrido'); // Cópia Oculta			
	    		#Define os dados técnicos da Mensagem 
	    		$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
			$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
			#Texto e Assunto
			$mail->Subject  = ASSUNTO; // Assunto da mensagem
			$mensagem = "<p>Formulário enviado via site www.3rm.eb.mil.br, seus dados foram alterados através do ambiente do candidato, se você não fez essas alterações, informe imediatamente ao Serviço Militar/3ª RM.</p>
				 
				Nome: ".$Nome." <br>
				E-mail: ".$Email." <br>
				CPF: ".$CPF." <br>
				Sua senha de acesso é: <strong>".$_POST['txtSenha']."</strong> <br>
				<p>&nbsp;</p> 
				 
				------------------------------------------------------------------------------<br>
				|Essas informações foram enviadas para o banco de dados da 3ª Região Militar.|<br>
				|Esse e-mail é apenas um informativo de atualização de dados.                |<br>
				------------------------------------------------------------------------------<br>
				 <br>
				3ª Região Militar/Serviço Militar<br>
				(51) 3220-6352";
			
			$mail->Body = $mensagem;				
	    	#Envio da Mensagem 
	    	$enviado = $mail->Send();		    
    		#Limpa os destinatários e os anexos 
			$mail->ClearAllRecipients();
			$mail->ClearAttachments();
    		#Exibe uma mensagem de resultado 
			if($enviado){
				header("location: ".DOMINIO."index.php?cod=" . md5("6"));
				exit();
			}else{
				echo "Não foi possível enviar o e-mail.";
				echo "Informações do erro: " . $mail->ErrorInfo;
			}
			#########################################

			//MSG caso tenha cadastrado e não tenha enviado o e-mail
			header("location: ".DOMINIO."php/editarCadastro.php?cod=" . md5(6));
		}else{				
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));
		}		
	break;

	case "alteraSenha":
		require_once(PATH . 'classe/RN/PessoaRN.php');
		//debug($_POST['selTipo']);

		if($_POST['selTipo'] == "vazio"){			
			header("location: ".DOMINIO."php/trocarSenha.php?cod=" . md5("5"));
		}else{
			$tipo = $_POST['selTipo'];
		}
		

		//$CPF		= preg_replace('/[^0-9]/','',RetirarMascara($_POST['txtCpf']));
		$NroInscricao 	= EvitarInjecao($_POST['txtInscricao']);
		$Identidade 	= EvitarInjecao($_POST['txtIdentidade']);
		$Senha 			= EvitarInjecao(preg_replace('/[^[:alnum:]_]/','',$_POST['txtSenha']));
		$Senha2 		= EvitarInjecao(preg_replace('/[^[:alnum:]_]/','',$_POST['txtSenha2']));

		if($Senha == $Senha2){				
			$Senha = Bcrypt::hash($Senha, 12);				
		}else{
			header("location: ".DOMINIO."index.php?cod=" . md5("5"));
		}

		$PessoaRN 	= new PessoaRN();
		$pessoa		= new stdClass();			

		$pessoa->NroInscricao 	= $NroInscricao;
		$pessoa->Identidade		= $Identidade;
		$pessoa->Senha			= $Senha;
		$pessoa->Tipo 			= $tipo;

		$Alterou 	= $PessoaRN->Atualizar($pessoa);
//debug($Alterou);
		if($Alterou){
			header("location: ".DOMINIO."php/trocarSenha.php?cod=" . md5("6"));
		}else{
			header("location: ".DOMINIO."php/trocarSenha.php?cod=" . md5("5"));
		}	
	break;

	default:
		echo "Houve algum erro ao enviar os dados.<br />Tente novamente verificando atentamente os dados digitados, ou entre em contato caso necessário.<p>3ª Região Militar/Serviço Militar<br />(51) 3220-6352";
		echo "<p><a href='".DOMINIO."'>[:: voltar ::]</a>";
	break;

}
?>
