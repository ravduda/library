{{extends file="Main.tpl"}}
{block name="content"}
    <div class="border rounded-lg w-1/5 mt-3">
    <img
      class=""
      src="{$title["img"]}"
    />
    <h1 class="text-4xl">{$title["name"]}</h1>
    </div>
    <p class="my-3">
        {$title["description"]}
    </p>
    {{include file="LinkButton.tpl" linkhref="{$conf->action_url}addbook/{$id}" linklabel="Dodaj książkę"}}
    {{include file="LinkButton.tpl" linkhref="{$conf->action_url}titleform/{$id}" linklabel="Edytuj tytuł"}}

    <p class="font-bold">Dostępne książki:</p>
    {{include file="Table.tpl"}}
    <p class="font-bold">Niedostępne książki:</p>

    {{include file="Table.tpl" tableR=$tableAvR tableB=[]}}
{/block}
