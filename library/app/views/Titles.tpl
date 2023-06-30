{{extends file="Main.tpl"}}
{block name="content"}
{{include file="LinkButton.tpl" linkhref="{$conf->action_url}titleform" linklabel="Dodaj tytuł"}}

{{include file="Table.tpl"}}
{/block}
