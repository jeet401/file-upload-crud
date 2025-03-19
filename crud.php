<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Operations & Upload in PHP</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #2193b0, #6dd5ed);
            color: #fff;
            text-align: center;
            padding: 20px;
        }
        h1 {
            font-size: 2.5em;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }
        form {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            margin: 20px auto;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
        }
        input[type="file"] {
            padding: 10px;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            color: #000;
        }
        input[type="submit"] {
            background: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background: #0056b3;
        }
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        li {
            width: 80%;
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 5px;
            margin: 5px;
            transition: 0.3s;
        }
        li:hover {
            background: rgba(255, 255, 255, 0.6);
        }
        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            margin: 0 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>File Upload & Operations</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="fileUpload">Choose a file to upload:</label>
        <input type="file" name="fileUpload" id="fileUpload" required><br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
    <hr>
    <h3>Uploaded Files:</h3>
    <ul> 
        <?php
        $dir = 'uploads/';
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..') {
                    echo "<li>
                        <span>$file</span>
                        <span>
                            <a href='?action=read&file=$file'>Read</a> | 
                            <a href='?action=write&file=$file'>Write</a> | 
                            <a href='?action=append&file=$file'>Append</a> | 
                            <a href='?action=delete&file=$file'>Delete</a> | 
                            <a href='?action=download&file=$file'>Download</a>
                        </span>
                    </li>";
                }
            }
        }
        ?>
    </ul>
</body>
</html>