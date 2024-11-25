<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tasques per categories</h1>
    @foreach($categories as $category)
        <h2>{{ $category->name }}</h2>
        <p>
            Categoria --- Descipcio
        </p>
        @foreach ($category->tasks as $task)
            <p>
                {{ $task->name }} --- {{ $task->description }}
            </p>

        @endforeach
    @endforeach
    <hr>
    <a href="/">Index</a>
    
</body>
</html>