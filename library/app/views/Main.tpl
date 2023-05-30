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
        {block name=messages}

            {if $msgs->isMessage()}
            <div class="messages bottom-margin">
                <ul>
                {foreach $msgs->getMessages() as $msg}
                {strip}
                    <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                {/strip}
                {/foreach}
                </ul>
            </div>
            {/if}
            
        {/block}
    </div>
</body>
</html>