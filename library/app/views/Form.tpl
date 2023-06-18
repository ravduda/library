{{extends file="Main.tpl"}}
{block name="content"}
    <form action="{$conf->action_root}{$actionName}/{$id}" method="post">
        {foreach $elements as $el}
            {include file="FormInput.tpl" inputElement=$el}
        {/foreach}
        <input type="submit" value="Zapisz" class="bg-gray-200 rounded-md p-1 my-2" />
    </form>
{/block}
