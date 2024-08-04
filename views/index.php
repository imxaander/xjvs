<!doctype html>
  <html>
    <head>
      <link rel="stylesheet" href="./static/css/main.css">
      <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    </head>

    <body>
      <div id="servers-pane"class="pane">
        <h3>Servers</h3>
        <hr>
        <div>
          <table>
            <thead>
              <td>Name</td>
              <td>Address</td>
              <td>Status</td>
              <td>Action</td>
            </thead>
            <tbody id="user-server-list">
            </tbody>
          </table>
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
          <button type="submit" name="request" value="create-server">Create</button>
        </form>
      </div>

      <script src="./static/js/index.js"></script>
    </body>
  </html>