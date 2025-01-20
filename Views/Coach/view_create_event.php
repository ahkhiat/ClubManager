<!-- Variables attendues :
    - les types d'events

    Faire les champs :
    - type d'event
    - date
    - quelle équipe 
    - visitor team si match
    - stade
    - saison 

-->

<?php
// var_dump($events, $teams, $seasons)
?>

<form class="max-w-sm mx-auto" action="" method="POST">
  

    <label for="event_type" class="block mb-2 text-sm font-medium text-gray-900">Type d'événement</label>
  <select id="event_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <<?php  foreach($events as $e): ?>
        <option value="<?=$e->id_event_type?>"><?php str_repeat('&nbsp;', 1) ?> <?=$e->name?></option>
    <?php endforeach; ?>
    
  </select>

 

  <div class="mb-5">
    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 ">Date</label>
    <input type="date" 
            id="date" 
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm 
                rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full 
                p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 
                dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            required />
  </div>

  <label for="team" class="block mb-2 text-sm font-medium text-gray-900">Equipe</label>
  <select id="team" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <?php  foreach($teams as $t ): ?>
        <option value="<?=$t->id_team?>"><?=$t->name?></option>
    <?php endforeach; ?>
  </select>

  <!-- Equipe visiteur si match -->
  <!-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Select your country</label>
  <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option>United States</option>
    <option>Canada</option>
    <option>France</option>
    <option>Germany</option>
  </select> -->

  <label for="season" class="block mb-2 text-sm font-medium text-gray-900 ">Saison</label>
  <select id="season" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <?php  foreach($seasons as $s ): ?>
        <option value="<?=$s->id_season?>"><?=$s->name?></option>
    <?php endforeach; ?>
  </select>

  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
</form>
