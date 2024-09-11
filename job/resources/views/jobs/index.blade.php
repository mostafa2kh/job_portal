<!-- resources/views/jobs/index.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Jobs</title>
</head>

<body>
    <h1>Jobs</h1>
    <ul>
        @foreach ($jobs as $job)
            <li><a href="{{ route('jobs.show', $job->id) }}">{{ $job->title }}</a></li>
        @endforeach
    </ul>
</body>

</html>