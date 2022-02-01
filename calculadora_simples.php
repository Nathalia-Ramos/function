<?php
		//declaração de varieveis
		$valor1 = (double) 0;
		$valor2 = (double) 0;
		$opcao = (string) null;
		$resultado =(double) 0;

		function operacaoMatematica ($numero1, $numero2, $operacao) {
			//declaração de variaveis locais da função (todas as variaveis recebem 
			//os dados do parametro da function)
			$num1 = (double) $numero1;
			$num2 = (double) $numero2;
			$tipoCalculo = (string) $operacao;
			$result = (double) 0;
			
		switch ($tipoCalculo){

			case ("SOMAR"):
					$result = $num1 + $num2;
					break;
			case ("SUBTRAIR"):
					$result = $num1 - $num2;
					break;
			case ("MULTIPLICAR"):
					$result = $num1 * $num2;
					break;
			case ("DIVIDIR"):
					{ if($valor2 == 0)
					//fazendo o tratamento caso o usuario divida um numero por 0
						echo('<script> alert ("Não é possivel fazer a divisão com o valor 0")</script>');
					else
						$result= $num1 / $num2;
					break;
					}
				}
				// o comando round escolhe quantas casas decimais vai ter após a virgula
			$result = round($result, 2);
				return $result;
		} 
		

	/*O comando gettype verifica o tipo de dados na variável
		o comando settype força a mudança de uma variável */

	/* Exemplo de uma variavel que nasce do tipo inteiro e depois é
		covertida para sitring
	/*$nome =10;
	echo(gettype(nome));

	settype($nome, "string");

	echo (gettype($nome))

	strtoupper () -> coverte um texto para maiusculo
	strtolower() -> converte um texto para minusculo
	*/

	//validação para verificar se o botao foi clicado
		if(isset($_POST['btncalc'])) {  
		//recebe os dados do formulario
		$valor1 = $_POST['txtn1'];
		$valor2 = $_POST ['txtn2'];
	
		//fazendo o tratamento da caixa vazia
		if ($_POST ['txtn1'] == "" || $_POST['txtn2'] == "") {
			echo ('<script> alert ("Coloque os valores"); </script>'); //fizemos isso apenas para o site dar uma alerta ao usuário
		}else{

		if(!is_numeric($valor1) || !is_numeric($valor2)){
				//validação de tratamento para a entrada de string ao inves de numeros
			echo ('<script> alert ("Não é possível realizar cálculos com letras")</script>');
	   }else{
			$opcao = strtoupper($_POST ['rdocalc']) ;
		
			//chamada da funçao de calculos matematicos, passamos os valores e o 
			//tipo da operação recebemos o valor de resultado
		$resultado	 = operacaoMatematica ($valor1, $valor2, $opcao);
		
			
		}
	}
}			
	
	
?>
<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>" >  <br>
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>" > <br>
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opcao == 'SOMAR'? 'checked': ''; ?>>Somar <br>
							<input type="radio" name="rdocalc" value="subtrair" <?=$opcao =='SUBTRAIR' ? 'checked': '';?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opcao == 'MULTIPLICAR' ? 'checked': ''; ?>>Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opcao == 'DIVIDIR' ? 'checked': ''; ?>>Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
							<?php echo ($resultado);?>
						</div>
						
					</form>
            </div>
           
        </div>
        
		
	</body>

</html>

