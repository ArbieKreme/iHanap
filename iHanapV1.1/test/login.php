<link rel="stylesheet" href="css/login-signup-style.css" type="text/css">

<span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Modal">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" action="/action_page.php">
    <div class="imgcontainer">
      <img src="img/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit" class="login-button w3-teal loginButton">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button
      id="cancelbtn" type="button" onclick="
      document.getElementById('loginModal').style.display='none';"
      class="button cancelbtn">Cancel
      </button>
      <button
      id="signupButton" type="button" onclick="
      document.getElementById('loginModal').style.display='none';
      document.getElementById('signupModal').style.display='block';"
      class="button signupbtn">Signup
      </button>
    </div>
  </form>