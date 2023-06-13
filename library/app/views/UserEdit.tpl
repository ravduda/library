{{extends file="Main.tpl"}}
{block name="content"}
    <form action="{$conf->action_root}saveUser" method="post">
        {{include file="Form.tpl"}}
    </form>
{/block}
