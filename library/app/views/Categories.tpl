{{extends file="Main.tpl"}}
{block name="content"}
{{include file="LinkButton.tpl" linkhref="{$conf->action_url}categoryform" linklabel="Dodaj kategorię"}}

{{include file="Table.tpl"}}
{/block}
