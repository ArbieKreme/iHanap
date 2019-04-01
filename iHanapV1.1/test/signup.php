<link rel="stylesheet" href="css/login-signup-style.css" type="text/css">

<span onclick="document.getElementById('signupModal').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" required>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button id="cancelbtn" type="button" onclick="
        document.getElementById('signupModal').style.display='none';"
        class="button cancelbtn ">Cancel
        </button>
        <button id="signupbtn" type="submit" class="button signupbtn">Sign Up</button>
      </div>
    </div>
  </form>