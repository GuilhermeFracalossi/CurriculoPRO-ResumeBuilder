<!DOCTYPE html>
<html lang='pt-br'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Currículo Modelo 3</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel='stylesheet' href='curriculo-pronto.css'>


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
 <div class='left-box'>
     <div class='image-container'>
         <img src='../images/$imageName' alt='Sua foto!'>
     </div>

     <div class='contato'>
         <h2>Contato</h2>
         <div>
             <img src='email-icon.png' alt=''>
             <span>$email</span>
         </div>
         <hr>
         <div>
             <img src='house-icon.png' alt=''>
             <span>$estado, $cidade</span>
         </div>
         <hr>
         <div>
             <img src='pin-icon.png' alt=''>
             <span>$endereco, $bairro, $numero_residencia</span>

         </div>
         <hr>
         ";
  for ($i = 0; $i <count($telefone) ; $i++) {
    echo "<div>
           <img src='phone-icon.png' alt=''>
           <span>$telefone[$i]</span>
       </div>
       <hr>";
  }
  for ($i = 0; $i < count($celular); $i++) {
    echo "<div>
          <img src='phone-icon.png' alt=''>
          <span>$celular[$i]</span>
      </div>
      <hr>";
  }

  echo "
     </div>

     <div class='pessoal'>
         <h2>Pessoal</h2>
         <div>
             <img src='hearth-icon.png' alt=''>
             <span>$estado_civil</span>

         </div>
         <hr>

         <div>
             <img src='globe-icon.png' alt=''>
             <span>$nacionalidade</span>

         </div>
         <hr>

         <div>
             <img src='sex-icon.png' alt=''>
             <span>$sexo</span>

         </div>
         <hr>
     </div>
     <div class='objetivo'>
         <h2>Objetivo</h2>
         <p class='text'>$objetivo</p>
         <hr>
     </div>

 </div>


 <div class='right-box'>
     <div>
         <h1 class='name'>$nome $sobrenome</h1>
         <div class='formacao-idade'>$grau_formacao, $idade Anos</div>
     </div>

     <div class='perfil'>
         <h2>Perfil Profissional</h2>
         <p class='text'>$perfil</p>
     </div>

     <h2>Experiência Profissional</h2>";
  for ($i = 0; $i < count($empresa); $i++) {
    echo "<div class='experiencia'>
       <div><span>$ano_entrada[$i]<span> - <span>$ano_saida[$i]</span>
                   <span>$empresa[$i]</span>
                   <span>$cargo[$i]</span></div>
       <p class='text'>
          {$funcao_cargo[$i]}
       </p>
   </div>";
  }






  echo "
     <h2>Educação</h2>

     ";
  for ($i = 0; $i < count($instituicao); $i++) {
    echo "<div class='experiencia'>
       <div><span>$anoConclusao[$i], <span>
                   <span> {$situacao_curso[$i][0]}, </span>
                   <span> {$instituicao[$i]}</span></div>

       <p class='text'>
           {$curso[$i]}
       </p>
   </div>";
  }


  echo "

 </div>
</div>";



  ?>

</body>

</html>