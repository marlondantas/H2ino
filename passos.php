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
                <div class="boxPassos" id="boc">
                    <h1 class="tit">Primeiros Passos</h1> 
                    <h2 class="p1" id="passo1">Passo 1</h2> 
                    <p class="passo1" id="passo2">Primeiro você deve instalar seu H2INO no topo de sua caixa de água vazia e clicar em "configurar"!</p> 
                    <h2 class="p2" id="passo3">Passo 2</h2> 
                    <p class="passo2" id="passo4">Agora que você já configurou seu H2INO com a caixa de água vazia, agora é hora de enche-la e clicar em "configurar" novamente!</p>
                    <form action="#" method="POST" id="form1">
                        <button class="btnEntrar" type="submit" name="b" value="Entrar">Cadastrar</button>
                    </form>
                    <br>
            </center>
        </div>

        <!--
    https://www.w3schools.com/css/css_rwd_mediaqueries.asp
    -->


    <div class="">
    <?php
      if(isset($_POST['b'])) {
          if (isset($_GET['1'])){
            header('location:passos.php?2');
          }else {
            header('location:passos.php?1');
          }
      }
    ?>
    </div>
</body>

</html>

<script>
<?php
    if(isset($_GET['1'])) {
        echo "
        document.getElementById('passo1').style.color = 'lightgray';
        document.getElementById('passo2').style.color = 'lightgray';
        document.getElementById('passo3').style.color = 'black';
        document.getElementById('passo4').style.color = 'black';";
    }
?>
</script>


<?php 
    //passo 1
    $porta = 'COM5';
    $nome_usuario = '1';
    if(isset($_GET['1'])) {
        shell_exec('python args.py port:' . $porta . ' --caixa_vazia user_name::' . $nome_usuario . ' 2>&1');
        
    }
    //passo 2
    if(isset($_GET['2'])) {
        shell_exec('python args.py port:' . $porta . ' --caixa_cheia user_name::' . $nome_usuario . ' 2>&1');               
        header('Location: painel.php');

        //levar pra outra pagina
    }          
?>
