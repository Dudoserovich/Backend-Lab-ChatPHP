<?php

function init(): ArrayObject
{
    return new ArrayObject(
        array(
            ["username" => "dudoser", "password" => "12345"],
            ["username" => "LosRomka", "password" => "12345"],
            ["username" => "anonymus", "password" => "anonymus"],
            ["username" => "CarManager", "password" => "CarManager"]
        )
    );
}

function singUp(): int
{
    if (isset($_GET['auth']) && $_GET['auth'] === "false") {
        return 0;
    } else {
        $username = $_GET["username"] === '' ? null : $_GET["username"];
        $password = $_GET["password"] === '' ? null : $_GET["password"];

        if ($username !== null && $password !== null) {
            $users = init();
            foreach ($users as $value) {
                if ($value["username"] === $username && $value["password"] === $password) {
                    echo "Вы вошли как $username";
                    return 1;
                }
            }

            setcookie("username", $username);
            setcookie("password", $password);
            throw new Exception('Неверный логин или пароль!');
        } else
            throw new Exception('Одно из полей не было заполнено!');
    }
}

try {
    setcookie("auth", singUp());
    setcookie("username", $_GET["username"]);
    header('Location: chat.php');
} catch (Exception $e) {
    setcookie("error_message", $e->getMessage());
    header('Location: index.php');
}