<div class="col-span-3">
  <label
    for="{$inputElement->name}"
    class="block text-sm font-medium leading-6 text-gray-900"
    >{$inputElement->label}</label
  >
  {if $inputElement->type=="select"}
  <select
    name="{$inputElement->name}"
    id="{$inputElement->name}"
    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
  >
    {foreach $inputElement->options as $opt}
    <option 
      value="{$opt[0]}"
      {if $opt == $inputElement->value}
        selected
      {/if}
      >{$opt[1]}</option>
    {/foreach}
  </select>
  {else}
  <input
    type="{$inputElement->type}"
    name="{$inputElement->name}"
    id="{$inputElement->name}"
    value="{$inputElement->value}"
    class="searchSelect block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
  />
  {/if}
</div>
