<!-- resources/views/jobs/create.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Create Job</title>
</head>

<body>
    <h1>Create Job</h1>
    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="skills">Skills (comma separated)</label>
            <input type="text" id="skills" name="skills[]" required>
        </div>
        <button type="submit">Create Job</button>
    </form>

</body>

</html>