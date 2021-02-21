<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image processing</title>
</head>
<body style="margin: 0; padding: 0">
    <div style="display: flex; justify-content:center; height: 100vh; align-items:center;">
        <div style="border:1px solid black; padding:1em;">
            <form action="{{ route('upload') }}" method="POST">
                @csrf
                <label for="file">Select Image:</label>
                <input type="file" name="file">
                <button type="submit">Upload file</button>
            </form>
        </div>
    </div>
</body>
</html>