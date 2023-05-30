{{extends file="Main.tpl"}}
{block name="content"}
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-2 sm:m-8">
  {foreach $titles as $t}
  <div class="border rounded-lg">
    <img
      class="w-full"
      src="https://wolnelektury.pl/media/book/cover_api_thumb/20-000-mil-podmorskiej-zeglugi_LP0CnaG.jpg"
    />
    <h1 class="text-4xl">{$t["name"]}</h1>
    <p>{$t["firstname"]} {$t["lastname"]}</p>
  </div>
  {/foreach}
</div>
{/block}