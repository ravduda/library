<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{$conf->action_root}select.js"></script>
    <title>Biblioteka</title>
  </head>
  <body>
    {{include file="Navbar.tpl"}}
    <div class="max-w-screen-xl m-auto min-h-screen">
      {block name=content} {/block} {block name=messages} {if
      $msgs->isMessage()}
      <div class="messages bottom-margin">
        <ul>
          {foreach $msgs->getMessages() as $msg} {strip}
          <li
            class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}"
          >
            {$msg->text}
          </li>
          {/strip} {/foreach}
        </ul>
      </div>
      {/if} {/block}
    </div>
    {{include file="Footer.tpl"}}
  </body>
</html>
