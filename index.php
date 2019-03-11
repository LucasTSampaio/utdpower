<?php
    
    //Incluindo os arquivos necessários
    include_once 'models/config.php';
    include_once 'models/class/User.class.php';

    //Validando sesseion
    session_start();

    if (isset($_SESSION[md5("user_data")])) {
        $user = $_SESSION[md5("user_data")];

        header("location: ".$user->profile_page); 
    }


?>

<html lang="pt-BR">
<head>
    <meta id="viewport" name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="https://web3.seplag.ce.gov.br/guardiao3cliente//Styles/images/favicon.ico" type="image/x-png">
    <link rel="shortcut icon" href="https://web3.seplag.ce.gov.br/guardiao3cliente//Styles/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="https://web3.seplag.ce.gov.br/guardiao3cliente//Styles/images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="https://web3.seplag.ce.gov.br/guardiao3cliente//http://www.ceara.gov.br/">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Governo do Estado do Ceará">
    <meta property="og:url" content="http://www.ceara.gov.br/">
    <meta property="og:site_name" content="Governo do Estado do Ceará">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema Utd Power - V 1.0</title>
    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="https://web3.seplag.ce.gov.br/guardiao3cliente//content/fontawesome/css/font-awesome.min.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="https://web3.seplag.ce.gov.br/guardiao3cliente//content/simple-line-icons/css/simple-line-icons.css">
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="https://web3.seplag.ce.gov.br/guardiao3cliente//Styles/bootstrap.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="https://web3.seplag.ce.gov.br/guardiao3cliente//Styles/login.css" id="maincss">
    <link href="https://web3.seplag.ce.gov.br/guardiao3cliente//Content/bootstrap-float-label/bootstrap-float-label.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
         <script src="Content/bootstrap/ie6/js/jquery-1.7.2.min.js"></script>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <script src="Content/bootstrap/ie6/selectivizr.js"></script>
    <![endif]-->
</head>

<body>
    <div class="wrapper">
        <div class="block-center mt-xl-lg wd-xl">
            
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center login-back">
                    <a href="#">
                        <img src="views/assets/images/utd.png" alt="Image" class="block-center img-rounded" style="height: 62px; padding-left: 15px;width:320px;" >
                    </a>
                </div>
                <div class="row row-table mt18">
                    <div class="text-center">
                        <p class="mb0 text-muted" style="color: #00853b; font-size: 21px;">Informe login e senha para entrar.</p>
                    </div>
                </div>
                <div class="panel-body lg-border mt18">
                    <form method="post" action="controllers/login.php" id="ctl00" data-parsley-validate="" class="mb-lg">

                        <div class="form-group">
                            <span class="has-float-label">
                                <input name="email" type="email" id="" data-masked="" placeholder="Email" data-parsley-required-message="Por favor, insira o email" autocomplete="on" required="" class="form-control cpf" />
                                <label for="txtCpf">Email</label>
                                <p class="fa fa-user form-control-feedback text-muted"></p>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="has-float-label">
                                <input name="password" type="password" id="txtSenha" autocomplete="on" placeholder="Senha" data-parsley-required-message="Por favor, insira a senha" required="" class="form-control senha" />
                                  <label for="txtSenha">Senha</label>
                                <p class="fa fa-lock form-control-feedback text-muted"></p>
                            </span>
                        </div>
                        <div class="clearfix">
                            <div class="checkbox c-checkbox pull-left mt0">
                                <label>
                                    <input type="checkbox" id="remember" value="" name="remember" data-parsley-multiple="remember">
                                    <span class="fa fa-check"></span>Lembrar-me
                                </label>
                            </div>
                            <div class="pull-right">
                                <a class="text-muted" href="">Esqueceu a senha?</a>

                            </div>
                        </div>
                        <p id="lbFalha" class="pt-lg text-center" style="color: red;"></p>
                        <input type="submit" name="ctl02" value="Entrar" class="btn btn-block btn-login mt-lg" />
                    </form>

                </div>
            </div>
            <!-- END panel-->
            <div class="p-lg text-center">
                <span>©</span>
                <span><?=date('Y');?></span>
                <span>-</span>
                <span>UTD.SCT.CE.GOV.BR</span>
                <br>
                <span>UtdPower System</span>
            </div>
        </div>
    </div>
    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/content/modernizr/modernizr.custom.js"></script>
    <!-- JQUERY-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/content/jquery/dist/jquery.js"></script>
    <!-- BOOTSTRAP-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/content/bootstrap/dist/js/bootstrap.js"></script>
    <!-- PARSLEY-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/content/parsleyjs/dist/parsley.min.js"></script>
    <!-- INPUT MASK-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/content/jquery.inputmask/dist/jquery.inputmask.bundle.js"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <script src="https://web3.seplag.ce.gov.br/guardiao3cliente/scripts/app.js"></script>
</body>
</html>

