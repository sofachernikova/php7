<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="styl.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<title>Черникова Софья Кирилловна, 201-321</title>
</head>

<body>
	<header>
		<div class="header">

			<div class="logo"><img src="logo.png" alt=""></div>
			<div class="name">
				<p>Черникова Софья Кирилловна, 201-321, <a href="https://github.com/sofachernikova/php7.git">Ссылка на гитхаб</a></p>
			</div>
		</div>
	</header>
	<main>
		<form action="result.php" method="post">
			<table id="elements">
				<tr>
					<td>0</td>
					<td class="element_row"><input type="text" name="element0"></td>
				</tr>
			</table>
			<input type="hidden" name="arleng" id="arrLength" value="1">
			<input type="button" value="Добавить еще один элемент" onClick="addElement('elements');">
			<br>
			<br>
			<div class="form">
				<label for="sort_1">Сортировка выбором </label>
				<input type="radio" name="SORT" checked value="0">
				<div class="form">
					<label for="sort_1">Сортировка пузырьком </label>
					<input type="radio" name="SORT" value="1">
				</div>
				<div class="form">
					<label for="sort_1">Алгоритм Шелла </label>
					<input type="radio" name="SORT" value="2">
				</div>
				<div class="form">
					<label for="sort_1">Алгоритм садового гнома </label>
					<input type="radio" name="SORT" value="3">
				</div>
				<div class="form">
					<label for="sort_1">Быстрая сортировка</label>
					<input type="radio" name="SORT" value="4">
				</div>
				<div class="form">
					<label for="sort_1">Встроенная функция РНР для сортировки списков по значению</label>
					<input type="radio" name="SORT" value="5">
				</div>
				<br>
				<input type="submit" name="submit" value="Сортировать массив">
		</form>
	</main>

	<div class="footerwrapper">
		<footer>
		</footer>
	</div>
	<script src="code.js"></script>
</body>

</html>