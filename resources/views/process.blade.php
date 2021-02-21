<div>
    <img src="{{ asset($image) }}" alt="" width="500px">
    <div>
        <h1>Options:</h1>
        <form action="{{ route('image.process', ['image' => $imageData]) }}" method="POST">
        @csrf
            <label for="width">Width:</label>
            <input type="number" name="width">
            <label for="height">Height:</label>
            <input type="number" name="height">
            <button>Apply</button>
        </form>

    </div>
</div>