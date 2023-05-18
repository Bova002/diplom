<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>D</title>
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
    
    <div class="board">
        <div id="parent"><h1 class="title">Канбан Доска для мобильного приложения "UNIS"</h1></div>
     
        <form id="todo-form">
        <input type="text" placeholder="Новая задача" id="todo-input" />
        <button type="submit">Добавить</button>
      </form>
      <form id="todo-form2">
        <input type="text" placeholder="Новый статус" id="todo-input2" />
        <button type="submit">Добавить</button>
      </form>
      <div class="lanes" >
        <div class="swim-lane" id="todo-lane" >
          <h3 class="heading">Запланировано</h3>
          <p class="task"  data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Создание макетов экранов приложения</p>
          <p class="task"  data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Разработка функциональности входа в приложение</p>
          <p class="task"  data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Разработка функциональности регистрации в приложении</p>
        </div>

        <div class="swim-lane" >
          
          <h3 class="heading">В работе</h3>

          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Разработка функциональности поиска контента в приложении</p>
          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Разработка функциональности добавления контента в избранное</p>
          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Разработка функциональности оплаты через приложение</p>
        </div>

        <div class="swim-lane" >
          <h3 class="heading">Готово</h3>

          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Запуск приложения в App Store и Google Play</p>
          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Поддержка и обновление приложения</p>
          <p class="task" data-tooltip="Нажмите, чтобы увидеть описание задачи" draggable="true">Сбор и анализ отзывов пользователей о приложении</p>
        </div>
      </div>
    </div>
    <?php 
    require "connect.php"; 
    $sql = "SELECT * FROM task ORDER BY id DESC LIMIT 1";
    $data = $db->query($sql); 
    $users_array = $data->fetchAll();
    ?>
    <?php foreach($users_array as $task): ?>
    <div id="my_modal" class="modal">
    <div class="modal_content">
      <span class="close_modal_window"><svg class="closes" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2982ff" d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg></span>
      <p class="edit_modal_window"><img src="pencil.png" alt="" class="edit"></p>
      <p>Описание: <?php echo $task['description'] ?></p>
      <p>Кто должен сделать: <?php echo $task['employe'] ?></p>
      <p>Дедлайн: <?php echo $task['dedline'] ?></p>
    </div>
  </div>
  <?php endforeach; ?>

  <div class="popup__bg">
      <form class="popup" method="post" action="task.php">
          <svg class="close-popup" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="#2982ff" d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"/></svg>
          <label>
            <input type="text" name="title" id="title_input" required >
            <div class="label__text">
                Hазвание
            </div>
        </label>
          <label>
              <textarea name="message" required></textarea>
              <div class="label__text">
                  Описание
              </div>
          </label>
          <label>
              <input type="text" name="employe" required>

              <div class="label__text">
                  Кто должен сделать
              </div>
          </label>
          <label>
              <input type="date" name="dedline" required></input>
              <div class="label__text">
                  Дедлайн
              </div>
          </label>
          <button type="submit">Сохранить</button>
      </form>
  </div>
    <script src="drag.js" defer></script>
  </body>
</html>


