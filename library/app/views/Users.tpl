{{extends file="Main.tpl"}}
{block name="content"}
{{include file="LinkButton.tpl" linkhref="{$conf->action_url}userform" linklabel="Dodaj użytkownika"}}
{{include file="Table.tpl"}}
{/block}
