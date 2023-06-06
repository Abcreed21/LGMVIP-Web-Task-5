<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/Home.css">
    <link rel="stylesheet" href="css/Input-Field.css">
    <link rel="icon" type="image/x-icon" href="images/Main-Logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Class</title>
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
                <legend>Add Class</legend>
                <input type="text" name="class_name" placeholder="Class Name">
                <input type="text" name="class_id" placeholder="Class ID">
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

</body>

</html>

<?php
include('connect.php');
include('session.php');

if (isset($_POST['class_name'], $_POST['class_id'])) {
    $name = $_POST["class_name"];
    $id = $_POST["class_id"];

    // validation
    if (empty($name) or empty($id) or preg_match("/[a-z]/i", $id)) {
        if (empty($name))
            echo '<p class="error">Please enter class</p>';
        if (empty($id))
            echo '<p class="error">Please enter class id</p>';
        if (preg_match("/[a-z]/i", $id))
            echo '<p class="error">Please enter valid class id</p>';
        exit();
    }

    $sql = "INSERT INTO `class` (`name`, `id`) VALUES ('$name', '$id')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo '<script language="javascript">';
        echo 'alert("Invalid class name or class id")';
        echo '</script>';
    } else {
        echo '<script language="javascript">';
        echo 'alert("Successful)';
        echo '</script>';
    }
}

?>