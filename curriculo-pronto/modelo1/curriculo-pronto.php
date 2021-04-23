<!DOCTYPE html>
<html lang='pt-br'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Currículo Modelo 1</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='curriculo-modelo.css'>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap" rel="stylesheet">
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
  $endereco= $_POST['endereco'];
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
  $imageName = time().$_FILES['foto']['name'];
  move_uploaded_file($imageTemp, $pasta . $imageName);

  var_dump($imageName);
?>

<?php

  echo "<div class='container-curriculo'>

  <div class='left-box'>
      <div class='photo'>
          <img src='../images/{$imageName}' alt=''>
      </div>


      <h2>Objetivos</h2>
      <p class='text objetivo'>{$objetivo}</p>


      <h2>Formação Acadêmica</h2>
";

    for ($i=0; $i<count($curso); $i++) { 

      echo "<div class='formacao'>
                <p class='curso'>{$curso[$i]}</p>
               <p class='instituicao'>{$instituicao[$i]}</p>
                 <p><span>Situação:</span> <span class='situacao'>{$situacao_curso[$i][0]}</span></p>
                 <p>{$anoConclusao[$i]}</p>
              <hr>
            </div>";
    }
      
    echo "
      <div class='contato'>
          <h2>Contato</h2>
          <h3 class='estado'>Estado: <span class='estado'>{$estado}</span></h3>
          <h3 class='cidade'>Cidade: <span class='estado'>{$cidade}</span></h3>
          <h3 class='endereco'>Endereço: <span>{$endereco}</p>
          </h3>
          <h3 class='bairro'>Bairro: <span>{$bairro}</span> </h3>

      

      ";
      for ($i=0; $i < count($telefone); $i++) { 
        echo "<h3 class='telefone'>Telefone: <span>{$telefone[$i]}</span></h3>";
      }

      for ($i=0; $i < count($celular); $i++) { 
        echo "<h3 class='celular'>Celular: <span>{$celular[$i]}</span></h3>";
      }

      echo "
    <hr>
</div>
      <div class='dados-pessoais'>
          <h2>Perfil</h2>
          <h3>Nacionalidade: <span class='estado'>{$nacionalidade}</span></h3>
          <h3>Estado Civil: <span class='estado'>{$estado_civil}</span></h3>
          <h3>Sexo: <span>{$sexo}</p></h3>
          </div>
      </div>




  <div class='right-box'>
      <div style='margin-bottom: 30px;'>
          <h1 class='nome'>{$nome} {$sobrenome}</h1>
          <div class='grau-formacao'>{$grau_formacao}, </div><span class='idade'> {$idade}</span>
      </div>
      <div class='grey-circle big'></div><span class='email'>{$email}</span>


      <h2 class='perfil'>Perfil</h2>

      <p class='text'>{$perfil}</p>

      <h2 class='experiencia'>Experiência Profissional</h2>
";

      for ($i=0; $i < count($empresa); $i++) { 
        echo "<div class='experiencia-profissional'>
        <div class='d-flex'>
            <div class='empresa-cargo'>
                <h3 class='empresa'>{$empresa[$i]}</h3>
                <div class='cargo'>{$cargo[$i]}</div>
            </div>
            <div class='trabalho'>
                <div class='entrada-saida'>
                    <span class='entrada'>{$ano_entrada[$i]}</span> - <span class='saida'>{$ano_saida[$i]}</span>
                </div>
            </div>
        </div>

        <p class='text funcao'>{$funcao_cargo[$i]}</p>
    </div>
    <hr>";
      }
      
   echo "
  </div>


</div>



<div class='footer'>
  <div class='grey-squares'>
      <div class='grey1'></div>
      <div class='grey2'></div>
      <div class='grey3'></div>
  </div>
</div>";



?>
</body>
</html>
