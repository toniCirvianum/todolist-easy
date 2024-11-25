<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo List</title>
</head>
<body>
    <h1>ToDo List</h1>
    <form action="/tasks" method='POST'>
        @csrf 
        <input type="text" name="name" placeholder="Nova Tasca">
        <input type="text" name="description" placeholder="Descripció">
        <select name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name}}</option>
            @endforeach
        </select>
        <input type="submit" value="Afegir">
        <!-- Mostrar errors -->
        @if ($errors->has('name'))
            <p style="color: red;">{{ $errors->first('name') }}</p>
        @endif
        @if ($errors->has('description'))
            <p style="color: red;">{{ $errors->first('description') }}</p>
        @endif
    </form>
    <hr>
        <ul>
            <li>
                <a href="/categories">Llistes per categories</a>

            </li>
        </ul>

    <hr>
    <h1>Llista de tasques</h1>
    <ul>
        @foreach ($tasks as $task)
        <li>
            {{ $task -> name}} - {{ $task -> description }} - {{ ($task->category->name) }}
            <form action="/tasks/{{ $task->id }}" method='POST' style="display:inline;">
                @csrf 
                @method('DELETE')
                <input type="submit" value="Borrar">
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>