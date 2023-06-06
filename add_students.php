<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Home.css">
    <link rel="icon" type="image/x-icon" href="images/Main-Logo.png">
    <link rel="stylesheet" type="text/css" href="css/Input-Field.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Students</title>
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
        <form action="" method="post">
            <fieldset>
                <legend>Add Student</legend>
                <input type="text" name="student_name" placeholder="Student Name">
                <input type="text" name="roll_no" placeholder="Roll No">
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
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['student_name'], $_POST['roll_no'])) {
    $name = $_POST['student_name'];
    $rno = $_POST['roll_no'];
    if (!isset($_POST['class_name']))
        $courses_name = null;
    else
        $courses_name = $_POST['class_name'];

    // validation
    if (empty($name) or empty($rno) or empty($courses_name) or preg_match("/[a-z]/i", $rno) or !preg_match("/^[a-zA-Z ]*$/", $name)) {
        if (empty($name))
            echo '<p class="error">Please enter name</p>';
        if (empty($courses_name))
            echo '<p class="error">Please select your class</p>';
        if (empty($rno))
            echo '<p class="error">Please enter your roll number</p>';
        if (preg_match("/[a-z]/i", $rno))
            echo '<p class="error">Please enter valid roll number</p>';
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo '<p class="error">No numbers or symbols allowed in name</p>';
        }
        exit();
    }

    $sql = "INSERT INTO `students` (`name`, `rno`, `class_name`) VALUES ('$name', '$rno', '$courses_name')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid Details")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful")';
        echo '</script>';
    }

}
?>