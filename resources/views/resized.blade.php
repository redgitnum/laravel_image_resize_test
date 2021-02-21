<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resized Images</title>
</head>
<body>
    <div style="">
        <div style="display: grid; place-items:center;">
            <img src="{{ asset($originalImage) }}" alt="" style="max-width: 100%">
        </div>
        <div style="width: 100%; display: flex; align-items:center; justify-content:center; gap: 1em;">
            @foreach($images as $image)
                <img src="{{ asset($image) }}" alt="" style="max-width: 100%">
            @endforeach
        </div>
    </div>
</body>
</html>