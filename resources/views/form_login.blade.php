<!DOCTYPE html>
<html>
<head>
	<title>Masuk</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="container">
	<div class="title" align="center">MASUK</div>
	<div class="content">
		<form action="/login_user" method="post">
            @csrf
			<div class="user-details">
                <div class="input-inbox">
					<label for="level" class="details">User Type</label>
					<select name="level" id="">
                        <option value="karyawan">Karyawan</option>
                        <option value="owner">Owner</option>
                    </select>
				</div>
				<div class="input-inbox">
					<label for="username" class="details">Username</label>
					<input type="text" id="username" name="username">
				</div>
                <div class="input-inbox">
					<label for="password" class="details">Password</label>
					<input type="password" id="password" name="password">
				</div>
			</div>
			<div class="button">
				<input type="submit" name="login" value="Login">
			</div>
		</form>
	</div>
</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
