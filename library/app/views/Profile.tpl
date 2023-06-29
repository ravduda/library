{{extends file="Main.tpl"}}
{block name="content"}
    <h1 class="text-4xl">Moje wypożyczone książki</h1>
<a href="{$conf->action_url}extend">Prologuj wszystkie</a>
{{include file="Table.tpl"}}
{/block}
