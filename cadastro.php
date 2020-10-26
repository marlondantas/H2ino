<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link id="tems" rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title>H2INO - CADASTRO</title>
</head>

<body id="bod">

    <div class="header" id="hed">
        <h1 class="logo"><a class='logoLink' href="index.php">H2<span class="ino">INO&#x1f4a7</span></a></h1>
    </div>

    <div class="row">
        <div class="col-3 menu">
        </div>

        <div class="col-6">
            <center>
                <div class="boxCad" id="boc">
                    <h1 class="tit">CADASTRO</h1>
                    <form action="#" method="post" id="form1">
                        <input class="entrada" name="email" id="t" type="text" placeholder="E-mail" required>
                        <input class="entrada" name="nome" id="t" type="text" placeholder="Nome" required>
                        <input class="entrada" name="senha"id="t2" type="password" placeholder="Senha" required>
                        <input class="entrada" name="senha1" id="t3" type="password" placeholder="Confirme sua senha" required>
                        <button class="btnEntrar" type="submit" name="cadastrar" value="Entrar">Cadastrar</button>
                    </form>
                </div>
                <br>
            </center>
        </div>

        <!--
    https://www.w3schools.com/css/css_rwd_mediaqueries.asp
    -->
</body>

</html>
<?php
    if (session_id() == '' || !isset($_SESSION)) {
        session_start();
    }

    if(isset($_POST['cadastrar'])) {
    require_once('conn.php');
    require_once('DAOusuario.php');

    $cadastrar = new UsuarioDAO();
    $nome = trim(strip_tags($_POST['nome'])); 
    $email = trim(strip_tags($_POST['email'])); 
    $senha = trim(strip_tags($_POST['senha'])); 
    $rep_senha = trim(strip_tags($_POST['senha1']));
    // confere se as senhas são iguais
    if($senha === $rep_senha) {
      $consulta = $cadastrar->unico($email);
      // caso o login escolhido já exista no banco retorna erro
      if($consulta == false) {
        header('location:cadastro.php?email');
      // caso não haja login parecido, inclui métoro de inserção de dados no banco de dados
      } else {
        $insere = $cadastrar->cadastra($nome,$email,$senha);
        // caso o usuario seja cadastrado, exibir mensagem de sucesso
        if($insere == true) {
          header('location:cadastro.php?success');
        }
      }

    } else {
      header('location:cadastro.php?senha');
    }
  }
 ?>

<?php
  if(isset($_GET['success'])) {
    echo '<script type="text/javascript">
    toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr["success"]("Usuário cadastrado com sucesso, agora você irá para a próxima etapa!", "H2INO")

        setTimeout(function(){window.location.href = "passos.php";}, 2000);
        </script>';
  }

  if(isset($_GET['email'])) {
    echo '<script type="text/javascript">
    toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr["error"]("O e-mail digitado já está registrado no sistema!", "ERRO")
        </script>';
  }

  if(isset($_GET['senha'])) {
    echo '<script type="text/javascript">
    toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        toastr["error"]("As senhas digitadas não são iguais!", "ERRO")
        </script>';
  }
?>