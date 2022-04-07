<?php
    function getImgBook() {
        echo '<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-book" fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M3.214 1.072C4.813.752 6.916.71 8.354 2.146A.5.5 0 0 1 8.5 2.5v11a.5.5 0 0 1-.854.354c-.843-.844-2.115-1.059-3.47-.92-1.344.14-2.66.617-3.452 1.013A.5.5 0 0 1 0 13.5v-11a.5.5 0 0 1 .276-.447L.5 2.5l-.224-.447.002-.001.004-.002.013-.006a5.017 5.017 0 0 1 .22-.103 12.958 12.958 0 0 1 2.7-.869zM1 2.82v9.908c.846-.343 1.944-.672 3.074-.788 1.143-.118 2.387-.023 3.426.56V2.718c-1.063-.929-2.631-.956-4.09-.664A11.958 11.958 0 0 0 1 2.82z"/>
                        <path fill-rule="evenodd"
                              d="M12.786 1.072C11.188.752 9.084.71 7.646 2.146A.5.5 0 0 0 7.5 2.5v11a.5.5 0 0 0 .854.354c.843-.844 2.115-1.059 3.47-.92 1.344.14 2.66.617 3.452 1.013A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.276-.447L15.5 2.5l.224-.447-.002-.001-.004-.002-.013-.006-.047-.023a12.582 12.582 0 0 0-.799-.34 12.96 12.96 0 0 0-2.073-.609zM15 2.82v9.908c-.846-.343-1.944-.672-3.074-.788-1.143-.118-2.387-.023-3.426.56V2.718c1.063-.929 2.631-.956 4.09-.664A11.956 11.956 0 0 1 15 2.82z"/>
                    </svg>';
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat PHP</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid d-flex h-100 justify-content-center align-items-center p-0 align-middle">
    <form id="auth" action="signUp.php" method="get" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="inlineFormInputGroupUsername">Username</label>
            <div class="input-group">
                <div class="input-group-text">@</div>
                <input
                        type="text"
                        name="username"
                        class="form-control"
                        id="inlineFormInputGroupUsername"
                        placeholder="Username"
                        value=<?php echo $_COOKIE['username'] ?? '' ?>
                >
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="exampleInputPassword1"
                    placeholder="Password"
                    value=<?php echo $_COOKIE['password'] ?? '' ?>
            >
        </div>
        <div class="mb-3 d-flex align-items-center justify-content-between">
            <button type="submit" class="btn btn-primary">Submit</button>
            <div class="m-0 d-flex align-items-center">
                <a href="signUp.php?auth=false" class="d-flex align-items-center"
                   style="text-decoration: none; align-items: center;">
                    <?php
                    getImgBook()
                    ?>
                    <div style="padding-left: 3px">Go to chat</div>
                </a>
            </div>
        </div>
        <?php
        if (isset($_COOKIE['error_message'])) {
            echo '<script>';
            echo 'alert("' . $_COOKIE['error_message'] . '")';
            echo '</script>';

            setcookie("error_message", '', time() - 3600);
        }
        if (isset($_COOKIE['password']) || isset($_COOKIE['username']) || isset($_COOKIE['auth'])) {
            setcookie("password", '', time() - 3600);
            setcookie("username", '', time() - 3600);
            setcookie("auth", '', time() - 3600);
        }
        ?>
    </form>
</div>
</body>
<style>
    html, body {
        height: 100%;
    }
</style>
</html>