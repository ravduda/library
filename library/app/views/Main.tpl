<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Biblioteka</title>
</head>
<body>
    {{include file="Navbar.tpl"}}
    <div class="max-w-screen-xl m-auto">
        {block name=content}
        {/block}
    </div>
</body>
</html>