{{extends file="Main.tpl"}}
{block name="content"}
<form action="{$conf->action_root}            " class="">
  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
    <input type="hidden" name="id" value="{$form->id}" />
    <div class="col-span-3">
      <label
        for="firstname"
        class="block text-sm font-medium leading-6 text-gray-900"
        >imię</label
      >
      <input
        type="text"
        name="firstname"
        id="firstname"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      />
    </div>
    <div class="col-span-3">
      <label
        for="lastname"
        class="block text-sm font-medium leading-6 text-gray-900"
        >nazwisko</label
      >
      <input
        type="text"
        name="lastname"
        id="lastname"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      />
    </div>
    <div class="col-span-3">
      <label
        for="email"
        class="block text-sm font-medium leading-6 text-gray-900"
        >email</label
      >
      <input
        type="text"
        name="email"
        id="email"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      />
    </div>
    <div class="col-span-3">
      <label
        for="pass"
        class="block text-sm font-medium leading-6 text-gray-900"
        >hasło</label
      >
      <input
        type="text"
        name="pass"
        id="pass"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
      />
    </div>

    <label for="role" class="block text-sm font-medium leading-6 text-gray-900"
      >rola</label
    >
    <select
      name="role"
      id="role"
      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    >
      <option value="user">user</option>
      <option value="admin">admin</option>
    </select>
  </div>
</form>

{/block}
