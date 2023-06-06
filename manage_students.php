<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="images/Main-Logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type='text/css' href="css/Handle.css">
    <link rel="stylesheet" type='text/css' href="css/Home.css">
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
        <?php
        include('connect.php');
        include('session.php');

        $sql = "SELECT `name`, `rno`, `class_name` FROM `students`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>
                <tr>
                <th>NAME</th>
                <th>ROLL NO</th>
                <th>CLASS</th>
                </tr>";

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['rno'] . "</td>";
                echo "<td>" . $row['class_name'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "0 Students";
        }
        ?>
    </div>
</body>

</html>