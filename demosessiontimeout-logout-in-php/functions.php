<?php
$login_session_duration_clone; 
function isLoginSessionExpired() {
	$login_session_duration = 5; 
	$login_session_duration_clone = $login_session_duration;
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) and isset($_SESSION["user_id"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}
?>