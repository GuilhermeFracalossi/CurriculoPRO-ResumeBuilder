<!DOCTYPE html>
<html lang='pt-br'>
<head>
<meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Currículo Modelo 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel='stylesheet' href='curriculo-pronto.css'>
  
    <link href="https://fonts.googleapis.com/css?family=Catamaran:400,500,700&display=swap" rel="stylesheet">
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
  $imageName = $_FILES['foto']['name'];
  move_uploaded_file($imageTemp, $pasta . $imageName);




  echo "<div class='container-curriculo'>
  <div class='left-box'>
      <div class='img-perfil'>
          <img src='../images/{$imageName}' alt='Sua foto!'>
      
    </div>
      <hr>

      <div class='name'>$nome</div>
      <div class='sobrenome'>$sobrenome</div>

      <div>
          <span class='idade'>$idade anos, </span>
          <span class='formacao'>$grau_formacao</span>
      </div>

      <hr>

      <div class='contato'>
        ";
        for($i=0; $i<count($telefone);$i++){
          echo "<div><img src='phone-icon.png' alt=''> <span>$telefone[$i]</span></div>";
        }
        for($i=0; $i<count($celular);$i++){
          echo "<div><img src='phone-icon.png' alt=''> <span>$celular[$i]</span></div>";
        }

        echo"
          <div><img src='email-icon.png' alt=''> <span>$email</span></div>
          <div><img src='house-icon.png' alt=''> <span>$estado, </span> <span>$cidade</span>
          </div>
          <div><img src='globe-icon.png' alt=''> <span>$nacionalidade</span></div>
          <div><img src='hearth-icon.png' alt=''><span>$estado_civil</span></div>

          <div><img src='pin-icon.png' alt= ''><span>$endereco, </span><span>$bairro,
              </span><span>$numero_residencia</span></div>

      </div>

      <hr>
      <div class='objetivo'>
          <h2>Objetivo</h2>
          <p class='text'>$objetivo</p>


      </div>

      <hr>



  </div>

  <div class='right-box'>
      <div class='perfil'>
          <h1>Perfil</h1>
          <p class='text'>$perfil</p>
      </div>

      <h1>Experiência</h1>";
      for($i=0; $i<count($empresa); $i++){
        echo "<div class='experiencia'>
        <div class='cargo-ano'>
            <div class='cargo'>$cargo[$i]</div>
            <div class='ano'>$ano_entrada[$i] - $ano_saida[$i]</div>
        </div>
        <div class='empresa-funcao'>
            <div class='empresa'>$empresa[$i]</div>
            <div class='funcao'>$funcao_cargo[$i]
            </div>
        </div>

    </div>";
      }

      echo"<h1>Educação</h1>";
      
for($i=0; $i< count($curso); $i++){
  echo "<div class='educacao'>
  <div class='instituicao-ano'>
      <div class='instituicao'>{$instituicao[$i]}</div>
      <div class='situacao-ano'><span>{$situacao_curso[$i][0]},</span> <span>{$anoConclusao[$i]}</span></div>
   </div>

  <div class='curso'>{$curso[$i]} </div>
</div>";
}
      

echo"

  </div>
</div>";

  ?>
</body>
</html>
