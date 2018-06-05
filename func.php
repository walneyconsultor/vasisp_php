<?php
// variáveis do Banco de Dados
$host = "10.1.1.45";
$usuario = "postgres";
$senha = "prodepaalmenara2011";
$banco = "seinfra_desenv";

function testarBanco(){
    global $host, $usuario, $senha, $banco; 
    $str  = "host=" . $host;
    $str .= " port=5432";
    $str .= " dbname=" . $banco;
    $str .= " user=" . $usuario;
    $str .= " password=" . $senha;

    $conn = pg_connect($str);
    if($conn) { echo "Conexão com o banco funcionando normalmente"; }
    else { echo "Erro ao conectar com a base de dados"; }
}

function testarPermissoes() {
    $tmp = is_writable("../../relatorio/tmp");
    $templates = is_writable("../../templates");
    $uploads = is_writable("../../uploads");

    permissions($tmp, "tmp");
    permissions($templates, "templates");
    permissions($uploads, "uploads");
  }

function permissions($dir, $nome) {
    if($dir) {
        echo "Permissão para a pasta <strong>\"$nome\"</strong> concedida e funcionando normalmente. <br>";
    } else {
        echo "<strong style='color: #cd0000;''><i>ERRO:</i></strong> A pasta <strong>\"$nome\"</strong> não contém permissões de escrita. <br>";
    }
  }

  call_user_func($_POST['function']);
?>