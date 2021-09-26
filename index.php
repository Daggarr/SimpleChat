<?php

require_once 'vendor/autoload.php';

use App\ChatMessages;

$chat = new ChatMessages();

if (isset($_POST['sendMessage']))
{
    $chat->addMessage($_POST['name'],$_POST['message']);
}

$messages = $chat->getMessages();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
          crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <?php foreach ($messages as $message): ?>
        <div class="m-5">
            <p class="font-weight-bold"><?php echo $message['name'] ?>:</p>
            <span class="border border-primary"><?php echo $message['message'] ?></span>
        </div>
    <?php endforeach; ?>

    <form method="post">
        <div class="form-group w-25 m-4 mt-3">
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name...">
        </div>

        <div class="form-group m-4 mt-3">
            <textarea class="form-control w-50" id="message" name="message" placeholder="Write something..." rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary m-4 mt-3" name="sendMessage">Send Message</button>
    </form>

</body>
</html>
