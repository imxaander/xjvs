<?php
require_once 'vendor/autoload.php';

?>
<!doctype html>
  <html>
    <head>
      <link rel="stylesheet" href="./static/css/main.css">
    </head>
    <body>
      <div id="servers-pane"class="pane">
        <h3>Servers</h3>
        <hr>
        <div>
          <i>No servers owned...</i>
        </div>
      </div>

      <div id="add-server-pane" class="pane">
        <h3>Create Server</h3>
        <hr>
        <form action="./requests/server/" method="POST">
          <span>Name: </span><input type="text" name="name">
          <br>
          <span>Seed: </span><input type="text" name="seed">
          <br>
          <button type="submit" name="create-server" value="">Create</button>
        </form>
      </div>
    </body>
  </html>