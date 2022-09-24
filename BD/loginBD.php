
<?php
	session_start();	
	
	if(isset($_SESSION['usuario'])){
	header("Location: ../index.php");
}
	
	//Incluindo a conexão com banco de dados
	include_once("conecta.php");	
	//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['username'])) && (isset($_POST['password']))){
		$usuario = mysqli_real_escape_string($conexao, $_POST['username']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
		$senha = mysqli_real_escape_string($conexao, $_POST['password']);
		//$senha = md5($senha);
			
		//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
		$result_usuario = "SELECT * FROM usuario WHERE usuario = '$usuario' && BINARY senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conexao, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		//Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		if(isset($resultado)){
			$_SESSION['usuarioAtivo'] = $resultado['ativo'];
			if($_SESSION['usuarioAtivo']==0){
				$_SESSION['loginDesativado'] = "Usuário desativado, entre em contato com o administrador do site";
				header("Location: ../login.php");
				exit;
			}
			
			$_SESSION['pessoaId'] = $resultado['id_usuario'];
			$_SESSION['senha'] = $resultado['senha'];
			$_SESSION['usuario'] = $resultado['usuario'];
			$_SESSION['nivel'] = $resultado['nivel'];
			$_SESSION['usuarioEmail'] = $resultado['email'];
			$_SESSION['isento'] = $resultado['isento'];
			
			header("Location: ../admin/index.php");
			
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: ../login/index.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	}else{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: ../login/index.php");
	}
?>