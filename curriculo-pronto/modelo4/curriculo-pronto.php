<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Currículo Modelo 4</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='curriculo-pronto.css'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,300i,400,400i,700,700i&display=swap"
        rel="stylesheet">

</head>

<body>
<?php 

#TODAS INFORMACOES

  //DADOS PESSOAIS
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $nacionalidade = $_POST['nacionalidade'];
  $estado = $_POST['estados'];
  $cidade = $_POST['cidade'];
  $grau_formacao = $_POST['formacao'];
  $estado_civil = $_POST['estadoCivil'];
  $sexo = $_POST['sexo'];
  $email = $_POST['email'];
  $endereco = $_POST['endereco'];
  $bairro = $_POST['bairro'];
  $numero_residencia = $_POST['resNumero'];
  $idade = $_POST['idade'];
  $celular = $_POST['celular'];
  $telefone = $_POST['telefone'];


  //FORMACAO
  $curso = $_POST['curso'];
  $instituicao = $_POST['instituicao'];
  $situacao_curso = $_POST['situacaoCurso'];
  $anoConclusao = $_POST['anoConclusao'];

  //EXPERIENCIA

  $empresa = $_POST['empresa'];
  $cargo = $_POST['cargo'];
  $funcao_cargo = $_POST['funcao-trabalho'];
  $ano_entrada = $_POST['ano-entrada'];
  $ano_saida = $_POST['ano-saida'];


  //INFORMACOES ADICIONAIS
  $objetivo = $_POST['objetivo'];
  $perfil = $_POST['faleMais'];
  $pasta = '../images/';
  $imageTemp = $_FILES['foto']['tmp_name'];
  $imageName = $_FILES['foto']['name'];
  move_uploaded_file($imageTemp, $pasta . $imageName);



echo "<div class='container-curriculo'>
<div class='top'>
    <div class='name'>$nome $sobrenome</div>
    <div class='grau-formacao'>$grau_formacao, $idade Anos</div>
</div>
<div class='image-container'>
    <img src='../images/$imageName' alt=''>
</div>
<div class='container-center'>
    <div class='left-box'>

        <div class='perfil'>
            <h2>Perfil</h2>
            <p class='text'>$perfil </p>
        </div>
        <div class='informacoes'>
            <h2>Informações</h2>
            "; 
            for($i=0; $i<count($telefone); $i++){
              echo"<div><img src='phone-icon.png' alt=''><span>$telefone[$i]</span></div>
              <hr>";
            }

            for($i=0; $i<count($celular); $i++){
              echo"<div><img src='phone-icon.png' alt=''><span>$celular[$i]</span></div>
              <hr>";
            }
            echo"
            <div><img src='globe-icon.png' alt=''><span>$nacionalidade</span></div>
            <hr>
            <div><img src='pin-icon.png' alt=''><span>$endereco, $bairro, $numero_residencia</span></div>
            <hr>
            <div><img src='sex-icon.png' alt=''><span>$sexo</span></div>
            <hr>
            <div><img src='relationship-icon.png' alt=''><span>$estado_civil</span></div>
            <hr>
        </div>
    </div>
    <div class='right-box'>
        <h2>Objetivo</h2>
        <p class='text'>$objetivo</h2>
        
        ";
        for($i=0; $i<count($empresa); $i++){
          echo "
        <div class='experiencia'>
          <div class='experiencia-title'>
            <span>$ano_entrada[$i] </span> - <span> $ano_saida[$i] / </span>
            <span>$cargo[$i] / </span>
            <span>$empresa[$i] </span>
          </div>
          <p class='text'>$funcao_cargo[$i]</p>

        </div>";
        }
          

        echo "<h2>Formação Acadêmica</h2>";
        for($i=0; $i<count($instituicao); $i++){
          echo" <div class='formacao'>
          <div class='formacao-title'>
              <span class='ano'>$anoConclusao[$i], </span> <span class='situacao-curso'>{$situacao_curso[$i][0]}/ </span><span
                  class='curso'>$curso[$i]</span>

          </div>
          <div class='instituicao'>$instituicao[$i]</div>
      </div>";
        }
        
echo"
    </div>
</div>



<div class='bottom'>
    <div class='email'>$email</div>
    <div class='estado'>$estado</div>
    <div class='cidade'>$cidade</div>

</div>

</div>";

?>



</body>

</html>