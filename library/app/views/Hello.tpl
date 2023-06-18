<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <head>
    <meta charset="utf-8" />
    <title>Hello World | Amelia framework</title>

    <link
      href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="{$conf->action_root}select.js"></script>
  </head>

  <body>
    My value: {$value} {if $msgs->isInfo()}
    <ul>
      {foreach $msgs->getMessages() as $msg}
      <li>{$msg->text}</li>
      {/foreach}
    </ul>
    {/if}
    <select name="test" id="test">
      <option value="test1">test1</option>
      <option value="test2">test2</option>
      <option value="inna opcaj" selected>inna opcaj</option>
    </select>
  </body>
</html>
