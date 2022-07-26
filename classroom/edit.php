<?php
	include "../connection.php";
	$id = $_GET['id'];
    $sql = "SELECT * FROM classroom";
    $query = mysqli_query($connection, $sql);
    while($row = mysqli_fetch_assoc($query)) {
        $grade_id = $row['grade_id'];
		$period_id = $row['period_id'];
	}
	
	if(isset($_POST['submit'])) {
		$grade_id = $_POST['grade'];
		$period_id = $_POST['period'];
		$sql = "UPDATE classroom SET grade_id = '$grade_id', period_id = '$period_id' WHERE id = $id";
        $query = mysqli_query($connection, $sql);
		header("location: classroom.php");
	}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
        <link rel="stylesheet" href="../css/style_index.css">
        <link rel="shortcut icon" href="../img/icon.ico"/>
        <!--<link rel="stylesheet" href="../css/function.css">!-->
        <title>Editar Sala</title>
        <!--
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
            crossorigin="anonymous"
        >
        -->
    </head>
	<header>
        <nav class="navbar">
                <a href="../index.html"><img src="../img/logo.png" class="img"></a>
            <ul>
                <a href="../function/function.php"><li>Função</li></a>
                <a href="../employee/employee.php"><li>Funcionário</li></a>
                <a href="../subject/subject.php"><li>Contato</li></a>
                <a href="../grade/grade.php"><li>Ano Escolar</li></a>
                <a href="../period/period.php"><li>Período</li></a>
                <a href="../teacher/teacher.php"><li>Professor</li></a>
                <a href="../classroom/classroom.php"><li>Sala</li></a>
                <a href="../student/student.php"><li>Estudante</li></a>
                <a href="../grades_attendance/grades_attendance.php"><li>Notas</li></a>
            </ul>
        </nav>
    </header>
    <body>
    <div class="main">
		<form method="POST">
			<table>
				<tr class="table-header">
					<th>Editar cadastro</th>
				</tr>
				<tr>
					<th><h3>ID: <?php echo $id; ?></h3></th>
				</tr>
				<tr>
					<th>
						<label for="grade">Ano Escolar:</label>
						<select class="myBtn" name="grade" id="grade">
							<?php
								$sql = "SELECT * FROM grade ORDER BY id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									if($id == $grade_id)
										echo '<option value="'.$id.'" selected>'.$name.'</option>';
									else
										echo '<option value="'.$id.'">'.$name.'</option>';
									}
							?>
						</select><br>
						<label for="period">Período Escolar:</label>
						<select class="myBtn" name="period" id="period">
							<?php
								$sql = "SELECT * FROM period ORDER BY id";
								$query = mysqli_query($connection, $sql);
								while($row = mysqli_fetch_assoc($query)) {
									$id = $row['id'];
									$name = $row['name'];
									if($id == $period_id)
										echo '<option value="'.$id.'" selected>'.$name.'</option>';
									else
										echo '<option value="'.$id.'">'.$name.'</option>';
									}
								mysqli_close($connection);
							?>
						</select><br>
            			<input class="myBtn" type="submit" name="submit" value="Editar">
					</th>
				</tr>

			</table>
		</form>
	</body>
</html>