<?php
session_start();
include 'koneksi.php';

if (isset($_POST['Register'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['FullName']);
    $nohp = mysqli_real_escape_string($conn, $_POST['PhoneNumber']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['passwd'], PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM t_user WHERE FullName='$nama'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<script lang="javascript">';
        echo 'alert("Username sudah terdaftar, Silakan gunakan username lain.")';
        echo "window.location.href = 'index.html';";
        echo '</script>';
    } else {
        $insertQuery = "INSERT INTO t_user (FullName, PhoneNumber, email, passwd) VALUES ('$nama', '$nohp', '$email', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['daftar_success'] = true;
            header("Location: index.html");
            exit();
        } else {
            echo "Terjadi kesalahan saat pendaftaran: " . $conn->error;
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <title>Tugas UAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form method="POST" action="../public/Home.html" >
											<div class="form-group">
												<input type="email" class="form-style" placeholder="Email" required>
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" placeholder="Password" required>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input type="submit" name="Log In" value="Log In" class="btn mt-4" >
											</form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<form method="POST" action="../index.php">
											<h4 class="mb-3 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" class="form-style" placeholder="Full Name" id="FullName" name="FullName">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="tel" class="form-style" placeholder="Phone Number" id="PhoneNumber" name="PhoneNumber">
												<i class="input-icon uil uil-phone"></i>
											</div>	
                      						<div class="form-group mt-2">
												<input type="email" class="form-style" placeholder="Email" id="email" name="email">
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" class="form-style" placeholder="Password" id="passwd" name="passwd">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input type="submit" name="Register" value="Register" class="btn mt-4" >
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>

