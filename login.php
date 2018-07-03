<link rel="stylesheet" type="text/css" href="css/login.css">
<div id="loginModal" class="modal">
	<form class="modal-content animate" action="login_ok.php" method="post">
		<div class="modal-top">
			<span onclick="document.getElementById('loginModal').style.display='none'" class="close" title="Close Modal">&times;</span>
			<p id="modal-welcome">WELCOME</p>
		</div>
		<div class="modal_container">
			 <input type="text" placeholder="Your ID" name="uname" required>
      <input type="password" placeholder="Your Password" name="password" required><br>
      <button type="submit" id="inB" style="margin-top:15px;">LOGIN</button>
      <br>
      <button type="button" onclick="document.getElementById('loginModal').style.display='none'" id="canB">CANCEL</button>
  </div>
  <div class="modalR">
  	 <span class="psw">Forgot <a href="#">password?</a></span>
     <span id="reM">
        <input type="checkbox" checked="checked" name="remember"> Remember me</span>
    </div>
    <div class="modalD">
    	Don't have an account?
     <span class="upA">
      	<a href="signup.php">Sign Up</a>
      </span></div>
  </form>
</div>
<script>
	//Get the modal
	var modal=document.getElementById('loginModal');
	//When the user clicks anywhere outside of the modal, close it
	window.onclick=function(event) {
		if(event.target==modal) {
			modal.style.display = "none";
		}
	}
</script>