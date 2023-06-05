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
        </tr>
    {/foreach}
</table>