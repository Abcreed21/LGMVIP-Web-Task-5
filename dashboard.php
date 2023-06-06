<?php
include("connect.php");

$no_of_classes = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `class`"));
$no_of_students = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `students`"));
$no_of_result = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(*) FROM `result`"));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Home.css">
    <link rel="icon" type="image/x-icon" href="images/Main-Logo.png">
    <title>Dashboard</title>
    <style>
        .main {
            border-radius: 10px;
            border-width: 5px;
            border-style: solid;
            padding: 20px;
            margin: 7% 20% 0 20%;
        }
    </style>
</head>

<body>

    <div class="title">
        <a href="dashboard.php"><img src="./images/Main-Logo.png" alt="" class="logo"></a>
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
                    <a href="add_courses.php">Add Class</a>
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
        <?php
        echo '<p>Number of classes:' . $no_of_classes[0] . '</p>';
        echo '<p>Number of students:' . $no_of_students[0] . '</p>';
        echo '<p>Number of results:' . $no_of_result[0] . '</p>';
        ?>
    </div>

</body>

</html>

<?php
include('session.php');
?>