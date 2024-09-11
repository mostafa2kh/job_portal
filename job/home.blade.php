<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
</head>

<body>
    <h1>Welcome to the Home Page</h1>

    <!-- عرض رسالة النجاح إذا وجدت -->
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <!-- باقي محتوى الصفحة -->
</body>

</html>