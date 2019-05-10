
        <?php
        require 'vendor/autoload.php';
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mensagem = $_POST['mensagem'];
        

        $from = new SendGrid\Email(null, "leandro.sampaio.017@outlook.com.br");
        $subject = "Mensagem de contato";
        $to = new SendGrid\Email(null, "leandro.sampaio.017@outlook.com.br");
        $content = new SendGrid\Content("text/html", "Olá, <br><br><br> Nova mensagem <br><br>nome:$name<br>Email:$email<br>Mensagem:$mensagem");
        $mail = new SendGrid\Mail($from, $subject, $to, $content);
        
        //Necessário inserir a chave
        $apiKey = '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';
        $sg = new \SendGrid($apiKey);

        $response = $sg->client->mail()->send()->POST($mail);
        echo "Mensagem enviada com sucesso";

        ?>
