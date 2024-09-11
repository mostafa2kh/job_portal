<!DOCTYPE html>
<html>

<head>
    <title>Employee Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
        }

        .options {
            margin-bottom: 20px;
        }

        .options a {
            display: block;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #5cb85c;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .options a:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <div class="container">


        <div class="options">
            <a href="{{ route('jobs.create', ['id' => $employee->id]) }}">Post a New Job</a>
            <a href="{{ route('jobs.index', ['id' => $employee->id]) }}">View My Posts</a>
            <a href="{{ route('jobs.manage', ['id' => $employee->id]) }}">Manage My Posts</a>
            <a href="{{ route('applications.manage') }}">Manage Job Applications</a>
        </div>
    </div>
</body>

</html>