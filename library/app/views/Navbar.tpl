<nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <img class="block h-12 w-auto" src="{$conf->action_root}logo.png" alt="Biblioteka">
        </div>
        <div class="sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {* <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a> *}
            <a href="{$conf->action_root}titleslist" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Główna</a>
            {if $userrole == "admin"}
            <a href="{$conf->action_root}titles" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Tytuły</a>
            <a href="{$conf->action_root}users" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Użytkownicy</a>
            <a href="{$conf->action_root}authors" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Autorzy</a>
            <a href="{$conf->action_root}categories" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Kategorie</a>
            {/if}
            {if $userrole == "user"}
            <a href="{$conf->action_root}showprofile" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Profil</a>
            {/if}
            {if $userrole == "null"}
              <a href="{$conf->action_root}login" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Zaloguj</a>
            {else}
              <a href="{$conf->action_root}logout" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Wyloguj</a>
            {/if}
          </div>
        </div>
      </div>
    </div>
  </div>

  
</nav>