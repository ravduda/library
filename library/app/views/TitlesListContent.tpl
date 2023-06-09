<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-2 sm:m-8" >
{foreach $titles as $t}
<div class="border rounded-lg">
<img
    class="w-full"
    src="{$t["img"]}"
/>
<h1 class="text-4xl">{$t["name"]}</h1>
<p>{$t["firstname"]} {$t["lastname"]}</p>
</div>
{/foreach}
</div>
<div class="text-center">
    {if !empty($previous)}
        <button class="p-1 border rounded-full m-1 w-10 h-10 text-xl" onclick="fetchContent('titleslist/{$previous}', '#titlesListContent')"><</button>
    {/if}
    {if !empty($next)}
        <button class="p-1 border rounded-full m-1 w-10 h-10 text-xl" onclick="fetchContent('titleslist/{$next}', '#titlesListContent')">></button>
    {/if}
</div>