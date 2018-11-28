<?php 

function Connect(){
 try {
     $conn = new PDO('mysql:host=localhost;dbname=bdpim', 'root','');
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
     return $conn;
    } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
      return null;
   }
}

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = MD5($_POST['senha']);
$conn = Connect();
if($conn){
  $stmt = $conn->prepare('SELECT email FROM usuarios WHERE email = :email');
  $stmt->execute(array('email' => $email));
  while($registro = $stmt->fetch()) {
        $logarray = $array['email'];
    }
}

  if($email == "" || $email == null){
    echo"<script language='javascript' type='text/javascript'>alert('O campo nome deve ser preenchido');window.location.href='cadastro.html';</script>";
 
    }else{
      if($logarray == $email){
 
        echo"<script language='javascript' type='text/javascript'>alert('Esse email já existe');window.location.href='cadastro.html';</script>";
        die();
 
      }else{
        $query = "INSERT INTO usuarios (nome,sobrenome,email,senha) VALUES ('$nome','$sobrenome','$email','$senha')";
        $insert = mysql_query($query,$connect);
         
        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
        }
      }
    }
?>
