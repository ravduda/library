{{extends file="Main.tpl"}}
{block name="content"}
    <p>Imię: {$user['firstname']}</p>
    <p>Nazwisko: {$user['lastname']}</p>
    <p>email: {$user['email']}</p>
{{include file="Table.tpl"}}
{/block}
