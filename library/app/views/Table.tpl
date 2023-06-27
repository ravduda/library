<table class="border-collapse border">
    <tr>
        {foreach from=$tableL item=l}
            <th class="border p-3">{$l}</th>
        {/foreach}
    </tr>
    {foreach from=$tableR item=r}
        <tr>
        {foreach from=$tableN item=n}
            <td class="border p-3">{$r[$n]}</td>
        {/foreach}
        {foreach from=$tableB item=b}
            <td class="border p-3">
                <a href="{$conf->action_root}{$b["action"]}/{$r["id"]}"><img height="15px" src="{$conf->action_root}buttonIcons/{$b["icon"]}" alt="{$b["alt"]}" title="{$b["alt"]}"></a>
            </td>
        {/foreach}
        </tr>
    {/foreach}
</table>