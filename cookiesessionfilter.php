<?php
ob_start();
session_start();
include 'phpheader.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);


    if ($name && $age && $age > 0) {

        $_SESSION['name'] = $name;
        $_SESSION['age'] = $age;

        setcookie('name', $name, time() + 3600, "/");
        setcookie('age', $age, time() + 3600, "/");

        header("Location: intprog.php");
        exit();
    } else {
        echo "<p style='color:red;'>Invalid input. Please enter valid details.</p>";
    }
}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #3AAFA9 url('bgtech1.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        .form-container {
            margin-top: 20px;
            display: inline-block;
            text-align: left;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        .form-container label {
            font-size: 1.2em;
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        .form-container input {
            font-size: 1em;
            padding: 10px;
            width: calc(100% - 22px);
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-container input:focus {
            outline: none;
            border-color: #004d40;
            box-shadow: 0 0 5px #004d40;
        }
        .form-container button {
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #004d40;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .form-container button:hover {
            background-color: #00332e;
        }
    </style>
</head>
<body>

<div class="form-container">
    <form action="cookiesessionfilter.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" min="1" required>
        <button type="submit">Submit</button>
    </form>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
