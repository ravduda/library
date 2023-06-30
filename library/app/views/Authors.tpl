{{extends file="Main.tpl"}}
{block name="content"}
{{include file="LinkButton.tpl" linkhref="{$conf->action_url}authorform" linklabel="Dodaj autora"}}

{{include file="Table.tpl"}}
{/block}
