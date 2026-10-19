
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Método não permitido.');
}

// Receber os dados do formulário
$nome = trim($_POST['nome'] ?? '');
$whatsapp = trim($_POST['whatsapp'] ?? '');
$tipo = trim($_POST['tipo-projeto'] ?? '');
$negocio = trim($_POST['negocio'] ?? '');

// Validar campos obrigatórios
if ($nome === '' || $whatsapp === '' || $tipo === '') {
    exit('Preencha todos os campos obrigatórios.');
}

// Seu número de WhatsApp com código do país e DDD
$destino = '5531985747203';

// Montar a mensagem
$mensagem = "Ola! segue meus dados para um atendimento personalizado!\n\n"
    . "Nome: {$nome}\n"
    . "WhatsApp do cliente: {$whatsapp}\n"
    . "Tipo de projeto: {$tipo}\n"
    . "Sobre o negócio: {$negocio}";

// Criar o link do WhatsApp
$url = 'https://wa.me/' . $destino
    . '?text=' . rawurlencode($mensagem);

// Redirecionar para o WhatsApp
header('Location: ' . $url, true, 303);
exit;

?>
