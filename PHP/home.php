<?php
    $content = get_content();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $content['title']; ?>
    </title>

    <link rel="stylesheet" href="/Styles/main.css">
    <!-- <link rel="stylesheet" href="estilo2.css"> -->
    <!-- <script type="module" src="/JS/main.js"></script> -->
    <script src="/node_modules/jquery/dist/jquery.js"></script>
</head>

<body class="home-body">
    <img src="../Styles/Img/greatest_composer.jpg" class="home-top"></img>
    <div class="home-bottom">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" viewBox="0 -960 960 960" width="48">
            <path d="M215.664-161.038q-22.229 0-38.427-16.199-16.199-16.198-16.199-38.427v-528.672q0-22.171 16.199-38.399 16.198-16.227 38.427-16.227h528.672q22.171 0 38.399 16.227 16.227 16.228 16.227 38.399v528.672q0 22.229-16.227 38.427-16.228 16.199-38.399 16.199H215.664Zm.182-30.193h134.423v-206.423h-21.5q-11.808 0-20.154-8.346t-8.346-20.154v-342.615h-84.423q-10.769 0-17.692 6.923t-6.923 17.692v528.308q0 10.769 6.923 17.692t17.692 6.923Zm394.769 0h133.539q10.769 0 17.692-6.923t6.923-17.692v-528.308q0-10.769-6.923-17.692t-17.692-6.923h-83.539v342.615q0 11.808-8.706 20.154-8.707 8.346-20.678 8.346h-20.616v206.423Zm-234.769 0h209.192v-206.423h-21.5q-12.557 0-20.528-8.346-7.972-8.346-7.972-20.154v-342.615H425.846v342.615q0 11.808-8.332 20.154-8.331 8.346-21.052 8.346h-20.616v206.423Z" />
        </svg>
    </div>
</body>

</html>