{{extends file="Main.tpl"}}
{block name="content"}
    <h1 class="text-4xl">Moje wypożyczone książki</h1>
{{include file="LinkButton.tpl" linkhref="{$conf->action_url}extend" linklabel="Prologuj wszystkie"}}
{{include file="Table.tpl"}}
{/block}
