{foreach $elements as $el}
{include file="FormInput.tpl" inputElement=$el}
{/foreach}
<input type="submit" value="Zapisz" class="bg-gray-200 rounded-md p-1 my-2" />