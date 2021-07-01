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

	<body>
		<?php
		function iterations($times, $arr)
		{
			$times += 1;
			echo 'Итерация номер ' . $times . '';
			for ($k = 0; $k < count($arr); $k++) {
				echo '<div class="arr_element">' . $k . ': ' .
					$arr[$k] . '</div>';
			}
			echo "<br>";
			return $times;
		}
		function arg_is_not_Num($arg)
		{
			if ($arg !== '') return true;
			for ($i = 0; $i < strlen($arg); $i++)
				if (
					$arg[$i] !== '0' && $arg[$i] !== '1' && $arg[$i] !== '2' &&
					$arg[$i] !== '3' && $arg[$i] !== '4' && $arg[$i] !== '5' &&
					$arg[$i] !== '6' && $arg[$i] !== '7' && $arg[$i] !== '8' &&
					$arg[$i] !== '9'
				)
					return true;

			return false;
		}

		function sorting_by_choice($arr)
		{
			$times = 0;
			for ($i = 0; $i < count($arr) - 1; $i++) {

				$min = $i;
				for ($j = $i + 1; $j < count($arr); $j++) {
					if ($arr[$j] < $arr[$min])
						$min = $j;
				}
				if ($min > $i) {
					$element = $arr[$i];
					$arr[$i] = $arr[$min];
					$arr[$min] = $element;
					$times = iterations($times, $arr);
				}
			}
			return $times;
		}


		function BubbleSort($arr)
		{
			$times = 0;
			for ($j = 0; $j < count($arr) - 1; $j++) {



				for ($i = 0; $i < count($arr) - 1 - $j; $i++)

					if ($arr[$i] > $arr[$i + 1]) {
						$temp = $arr[$i];
						$arr[$i] = $arr[$i + 1];
						$arr[$i + 1] = $temp;
						$times = iterations($times, $arr);
					}
			}
			return $times;
		}


		function ShellsSort($arr)
		{
			$times = 0; {

				for ($k = ceil(count($arr) / 2); $k >= 1; $k = floor($k / 2)) {

					for ($i = $k; $i < count($arr); $i++) {
						$val = $arr[$i];
						$j = $i - $k;

						while ($j >= 0 && $arr[$j] > $val) {

							$arr[$j + $k] = $arr[$j];
							$j -= $k;
						}

						$arr[$j + $k] = $val;
						$times = iterations($times, $arr);
					}
				}
				return $times;
			}
		}



		function gnomeSort($arr)
		{
			$times = 0;
			$i = 1;
			$j = 2;
			while ($i < count($arr)) {

				if (!$i || $arr[$i - 1] <= $arr[$i]) {
					$i = $j;
					$j++;
				} else {
					$temp = $arr[$i];
					$arr[$i] = $arr[$i - 1];
					$arr[$i - 1] = $temp;
					$i--;
					$times = iterations($times, $arr);
				}
			}
			return $times;
		}

		$qs_times = "";

		function quickSort(&$arr, $left, $right)
		{
			global $qs_times;
			$l = $left;
			$r = $right;
			$point = $arr[ceil(($left + $right) / 2)];
			$qs_times = iterations((int)$qs_times, $arr);
			do {

				while ($arr[$l] < $point) $l++;


				while ($arr[$r] > $point) {
					$r--;
				}
				if ($l <= $r) {

					$temp = $arr[$l];
					$arr[$l] = $arr[$r];
					$arr[$r] = $temp;

					$l++;
					$r--;
				}
			} while ($l <= $r);
			$qs_times = iterations((int)$qs_times, $arr);

			if ($r > $left) {
				quickSort($arr, $left, $r);
			}

			if ($l < $right) {
				quickSort($arr, $l, $right);
			}
		}

		?>

		<main>
			<?php
			if ((!isset($_POST['element0'])) || ((!isset($_POST['arleng'])))) {
				echo 'Массив не задан, сортировка невозможна';
				exit();
			}
			for ($i = 0; $i < $_POST['arleng']; $i++)
				if (is_numeric($_POST['element' . $i]) == false) {

					echo 'Элемент массива "' . $_POST['element' . $i] . '" – не число';
					exit();
				}

			if ($_POST['SORT'] == '0')
				echo '<h1>Алгоритм "Сортировка выбором" </h1>';
			else
if ($_POST['SORT'] == '1')
				echo '<h1>Алгоритм "Сортировка пузырьком"</h1>';
			else
if ($_POST['SORT'] == '2')
				echo '<h1>"Алгоритм Шелла"</h1>';
			else
if ($_POST['SORT'] == '3')
				echo '<h1>"Алгоритм садового гнома"</h1>';
			else
if ($_POST['SORT'] == '4')
				echo '<h1>Алгоритм "Быстрая сортировка"</h1>';
			else
if ($_POST['SORT'] == '5')
				echo '<h1>Встроенная функция РНР для сортировки списков по значению</h1>';
			$arr = array();
			echo 'Исходный массив <hr>';
			for ($i = 0; $i < $_POST['arleng']; $i++) {
				echo '<div class="arr_element">' . $i . ': ' .
					$_POST['element' . $i] . '</div>';
				$arr[$i] = $_POST['element' . $i];
			}

			echo '<hr>Массив проверен, сортировка возможна';
			echo '<br>';
			$time = microtime(true);
			if ($_POST['SORT'] == '0')
				$n = sorting_by_choice($arr);
			else
if ($_POST['SORT'] == '1')
				$n = BubbleSort($arr);
			else
if ($_POST['SORT'] == '2')
				$n = ShellsSort($arr);
			else
if ($_POST['SORT'] == '3')
				$n = gnomeSort($arr);
			else
if ($_POST['SORT'] == '4')
				$n = quickSort($arr, 0, count($arr) - 1);
			else 
if ($_POST['SORT'] == '5') {
				sort($arr);
				$n = 1;
				for ($i = 0; $i < count($arr); $i++) {

					echo $arr[$i] . " ";
					echo '<br>';
				}
			}
			echo '<br>';
			if ($_POST['SORT'] != '4') {

				echo 'Сортировка завершена, проведено ' . $n . ' итераций. ';
			} else echo 'Сортировка завершена, проведено ' . $qs_times . ' итераций. ';

			echo '<br>';

			echo 'Затрачено ' . (microtime(true)) . ' микросекунд';
			?>
		</main>

		<div class="footerwrapper">
			<footer>
			</footer>
		</div>
	</body>

</html>