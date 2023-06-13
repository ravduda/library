<div class="col-span-3">
  <label
    for="{$inputElement->name}"
    class="block text-sm font-medium leading-6 text-gray-900"
    >{$inputElement->label}</label
  >
  {if $inputElement->label=="select"}
  <select
    name="role"
    id="role"
    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
  >
    {foreach $inputElement->options as $opt}
        <option value="{$opt}">{$opt}</option>
    {/foreach}
  </select>
  {else}
  <input
    type="{$inputElement->type}"
    name="{$inputElement->name}"
    id="{$inputElement->name}"
    value="{$inputElement->value}"
    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
  />
  {/if}
</div>
