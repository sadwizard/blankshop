<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/inc/css/normalize.css">
	<link rel="stylesheet" href="/inc/css/admin.css">
</head>
<body style='background:#e6e6e6'>
	<div class="container">
		<?if(isset($error)){print_r($error);}?>
		<div class="auth-form">
			<h2 class="title">Login</h2>
			<form action="/auth/login" method="POST">
				<input type="text" placeholder='Login' name='login' required>
				<input type="text" placeholder='Password' name='password' required>
				<button type='submit' name='submit'>Войти</button>
			</form>
		</div>
	</div>
</body>
</html>
