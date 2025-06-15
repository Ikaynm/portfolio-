<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = strip_tags(trim($_POST["name"]));
  $email   = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $subject = strip_tags(trim($_POST["subject"]));
  $message = trim($_POST["message"]);

  $to = "caiobicalho394@gmail.com";
  $headers = "From: $name <$email>";

  $body = "Você recebeu uma nova mensagem do formulário de contato:\n\n";
  $body .= "Nome: $name\n";
  $body .= "Email: $email\n";
  $body .= "Assunto: $subject\n\n";
  $body .= "Mensagem:\n$message\n";

  if (mail($to, $subject, $body, $headers)) {
    echo 'Mensagem enviada com sucesso!';
  } else {
    echo 'Erro ao enviar a mensagem.';
  }
}
?>
