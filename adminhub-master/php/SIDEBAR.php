
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="tools/css/bootstrap.min.css">
	<link rel="stylesheet" href="tools/css/all.min.css">
	<link rel="stylesheet" href="tools/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<section id="sidebar">
		<a  href="#" class="brand text-decoration-none">
			<i class='bx bxs-smile'></i>
			<span class="text">Admin-Hub</span>
		</a>
		<ul class="side-menu top">
			<li  class="<?= ($title_page=="Home") ? "active" : "" ?>">
				<a class="text-decoration-none" href="index.php">
					<i class='bx bxs-home'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li class="<?= ($title_page=="") ? "active" : "" ?>">
				<a class="text-decoration-none" href="reponses.php">
					<i class='bx bx-plus-circle' ></i>
					<span class="text">Reponses</span>
				</a>
			</li>
			<li class="<?= ($title_page=="questions") ? "active" : "" ?>">
				<a class="text-decoration-none" href="questions.php">
					<i class='bx bx-minus-circle' ></i>
					<span class="text">Questions</span>
				</a>
			</li>
			<li class="<?= ($title_page=="maladie") ? "active" : "" ?>">
				<a class="text-decoration-none" href="maladies.php">
					<i class='bx bxs-book-add'></i>
					<span class="text">Maladies</span>
				</a>
			</li>
		</ul>
	</section>
	</body>
	</html>