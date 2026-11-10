<!DOCTYPE html>
<html>
<head><title>Mis tareas</title></head>
<body>
    <h1>Mis tareas</h1>

    <form method="POST" action="/todo">
        @csrf
        <input type="text" name="title">
        <button>Agregar</button>
    </form>

    @foreach ($tasks as $task)
        <p>{!! $task->title !!}
           <a href="/todo/{{ $task->id }}/delete">X</a></p>
    @endforeach
</body>
</html>