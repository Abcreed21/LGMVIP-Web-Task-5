<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="images/Main-Logo.png">
    <link rel="stylesheet" type='text/css' href="css/Input-Field.css">
    <title>Dashboard</title>
</head>

<body>

    <div class="title">
        <a href="dashboard.php"><img src="images/Main-Logo.png" alt="" class="logo"></a>
        <span class="heading">Dashboard</span>
        <a href="logout.php" style="color: white"><span><svg width="46" height="46" fill="none" stroke="currentColor"
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 8.25V6.375A1.875 1.875 0 0 0 13.125 4.5h-9A1.875 1.875 0 0 0 2.25 6.375v11.25A1.875 1.875 0 0 0 4.125 19.5h9A1.875 1.875 0 0 0 15 17.625V15.75">
                    </path>
                    <path d="M18 8.25 21.75 12 18 15.75"></path>
                    <path d="M8.953 12H21.75"></path>
                </svg></span></a>
    </div>

    <div class="nav">
        <ul>
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Courses &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_courses.php">Add Courses</a>
                    <a href="manage_courses.php">Manage Courses</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Students &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Results &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend>Delete Result</legend>
                <?php
                include('connect.php');
                include('session.php');

                $courses_result = mysqli_query($conn, "SELECT `name` FROM `class`");
                echo '<select name="class_name">';
                echo '<option selected disabled>Select Class</option>';
                while ($row = mysqli_fetch_array($courses_result)) {
                    $display = $row['name'];
                    echo '<option value="' . $display . '">' . $display . '</option>';
                }
                echo '</select>'
                    ?>
                <input type="text" name="rno" placeholder="Roll No">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        <br><br>

        <form action="" method="post">
            <fieldset>
                <legend>Update Result</legend>

                <?php
                $courses_result = mysqli_query($conn, "SELECT `name` FROM `class`");
                echo '<select name="class">';
                echo '<option selected disabled>Select Class</option>';
                while ($row = mysqli_fetch_array($courses_result)) {
                    $display = $row['name'];
                    echo '<option value="' . $display . '">' . $display . '</option>';
                }
                echo '</select>'
                    ?>

                <input type="text" name="rn" placeholder="Roll No">
                <input type="text" name="p1" id="" placeholder="Course 1">
                <input type="text" name="p2" id="" placeholder="Course 2">
                <input type="text" name="p3" id="" placeholder="Course 3">
                <input type="text" name="p4" id="" placeholder="Course 4">
                <input type="text" name="p5" id="" placeholder="Course 5">
                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>

</body>

</html>

<?php
if (isset($_POST['class_name'], $_POST['rno'])) {
    $courses_name = $_POST['class_name'];
    $rno = $_POST['rno'];
    echo $courses_name;
    echo $rno;
    $delete_sql = mysqli_query($conn, "DELETE from `result` where `rno`='$rno' and `class`='$courses_name'");
    if (!$delete_sql) {
        echo '<script language="javascript">';
        echo 'alert("Not available")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Deleted")';
        echo '</script>';
    }
}

if (isset($_POST['rn'], $_POST['p1'], $_POST['p2'], $_POST['p3'], $_POST['p4'], $_POST['p5'], $_POST['class'])) {
    $rno = $_POST['rn'];
    $courses_name = $_POST['class'];
    $p1 = (int) $_POST['p1'];
    $p2 = (int) $_POST['p2'];
    $p3 = (int) $_POST['p3'];
    $p4 = (int) $_POST['p4'];
    $p5 = (int) $_POST['p5'];

    $marks = $p1 + $p2 + $p3 + $p4 + $p5;
    $percentage = $marks / 5;

    $sql = "UPDATE `result` SET `p1`='$p1',`p2`='$p2',`p3`='$p3',`p4`='$p4',`p5`='$p5',`marks`='$marks',`percentage`='$percentage' WHERE `rno`='$rno' and `class`='$courses_name'";
    $update_sql = mysqli_query($conn, $sql);

    if (!$update_sql) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Updated")';
        echo '</script>';
    }
}
?>