<?php 
$porta = 'COM5';
$nome_usuario = '1';
shell_exec('python args.py port:' . $porta . ' --caixa_cheia user_name::' . $nome_usuario . ' 2>&1');
?>