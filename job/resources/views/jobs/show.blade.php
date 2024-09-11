<!-- resources/views/jobs/show.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Job Details</title>
</head>

<body>
    <h1>{{ $job->title }}</h1>
    <p>{{ $job->description }}</p>
    <p>Skills: {{ implode(', ', json_decode($job->skills)) }}</p>

    <!-- نموذج التقديم -->
    @auth
        <form action="{{ route('applications.apply', $job->id) }}" method="POST">
            @csrf
            <div>
                <label for="cover_letter">Cover Letter</label>
                <textarea id="cover_letter" name="cover_letter" required></textarea>
            </div>
            <button type="submit">Apply</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to apply.</p>
    @endauth
</body>

</html>