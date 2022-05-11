<?php
date_default_timezone_set("Asia/Vladivostok");

$file = 'static/messages.json';

$authorized = !($_COOKIE["auth"] == 0);

if (file_exists($file)) {
    $messages = json_decode(file_get_contents($file), true);
} else {
    $messages = [
        "messages" => []
    ];
}

$username = $_COOKIE["username"] ?? null;

if ($authorized && isset($_GET["message"])) {
    $messages["messages"][] = [
        "date" => date("d.m.Y H:i"),
        "username" => $username,
        "message" => $_GET["message"]
    ];
    file_put_contents($file, json_encode($messages, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT), LOCK_EX);
}

function isAuthorize()
{
    if (isset($_COOKIE["auth"]))
        echo($_COOKIE["auth"] == 0 ? "Вы не авторизованы" : $_COOKIE["username"]);
}

function getMessages($textMessages, $textUsername)
{
    if ($textMessages === null)
        echo "Чатик пуст, заполните его своими кринжовыми сообщениями";
    else {
        foreach ($textMessages["messages"] as $message)
            echo '<div class="mb-2 card ' . ($message["username"] === $textUsername ? "bg-dark text-white" : "") . '">' .
                '<div class="card-body">
                <div class="user d-flex align-items-center justify-content-between"
                     style="min-width: 100px;">
                    <div class="user-name"><strong>@' . $message["username"] . '</strong></div>
                    <div class="user-time" style="font-size: 12px; color: darkgrey">' . $message["date"] . '</div>
                </div>
                <div class="user-message">' . htmlspecialchars($message["message"], ENT_QUOTES) . '</div>
            </div>
            </div>';
    }
}

function getDoorExit()
{
    echo '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-door-closed" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2zm1 0v13h8V2H4z"/>
  <path d="M7 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
  <path fill-rule="evenodd" d="M1 15.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5z"/>
</svg>';
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link rel="stylesheet" href="static/scroll.css">
</head>
<body>
<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0 align-middle"
     style="flex-direction: column;">
    <h1>Chat</h1>
    <a href="index.php" class="d-flex align-items-center"
       style="text-decoration: none; align-items: center;">
        <?php
        getDoorExit();
        ?>
        <div style="padding-left: 3px">Go back</div>
    </a>
    <div class="card w-75" style="align-items: center; max-height: 500px; min-width: 200px">
        <div class="card-header w-100 text-center"><?php
            isAuthorize();
            ?>
        </div>
        <div class="messages card-body w-100" style="overflow-y: scroll; width: 300px">
            <?php
            getMessages($messages, $username);
            ?>
        </div>
        <div class="card-footer w-100 d-flex align-items-center justify-content-between">
            <input
                    type="text"
                    class="form-control"
                    name="message"
                    id="inputMessage"
                    placeholder="Input your message"
                    value=""
                <?php echo $authorized == "0" ? "disabled" : "" ?>
                    style="margin-right: 5px; overflow-y: scroll;"
            >

            <button
                    class="send-message btn btn-primary"
                    onclick="sendMessage()"
                    type="submit"
                <?php echo $authorized == "0" ? "disabled" : "" ?>
            >
                Send
            </button>
        </div>
    </div>
</div>
<script src="static/messages.js"></script>
</body>
</html>