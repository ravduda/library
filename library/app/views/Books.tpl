{{extends file="Main.tpl"}}
{block name="content"}
    <div class="border rounded-lg w-1/5">
    <img
      class=""
      src="https://wolnelektury.pl/media/book/cover_api_thumb/20-000-mil-podmorskiej-zeglugi_LP0CnaG.jpg"
    />
    <h1 class="text-4xl">{$title["name"]}</h1>
    </div>
    <p class="my-3">
        {$title["description"]}
    </p>
    
<a href="{$conf->action_url}titleform/{$id}">Edytuj książkę</a>
<a href="{$conf->action_url}addbook/{$id}">Dodaj książkę</a>
{{include file="Table.tpl"}}
{/block}
