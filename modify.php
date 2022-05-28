<?php
	$acao=$_GET['acao'];

	if ($acao == "Cancelar")
	{
		//break;
	}
	else
	{
        
		include("./assets/sessions/session_admin.php");  

		$id=$_GET['id'];
		$name=$_GET['name'];
        $categoria = $_GET["categoria"];
        $endereco = $_GET["endereco"];
        $cep = $_GET["cep"];
        //$pic = $_GET["pic"];
 
		switch ($acao) {
			case "Alterar":
				$sql = "UPDATE locations SET
						name='$name', 
						category='$categoria',
						address='$endereco',
						cep='$cep'
						WHERE id='$id'";
				break;
			
			case "Excluir":
				$sql = "DELETE FROM locations 
						WHERE id='$id'";
				break;
			
		}
		$query = mysqli_query($con,$sql) or die (mysqli_error());            
		
		mysqli_close($con);
	}
    header("Location: read_location.php");
?>
