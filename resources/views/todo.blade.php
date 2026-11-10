<!DOCTYPE html>
<html>
<head><title>Mis tareas</title></head>
<body>
    <h1>Mis tareas</h1>

    @if (session('ok')) <p>{{ session('ok') }}</p> @endif
    @error('title') <p style="color:red">{{ $message }}</p> @enderror

    <form method="POST" action="{{ route('todo.store') }}">
        @csrf
        <input type="text" name="title" required maxlength="255">
        <button>Agregar</button>
    </form>

    @foreach ($tasks as $task)
        <div>
            <form method="POST" action="{{ route('todo.toggle', $task->id) }}" style="display:inline">
                @csrf @method('PATCH')
                <button>{{ $task->done ? '✔' : '○' }}</button>
            </form>

            <span>{{ $task->title }}</span>

            <form method="POST" action="{{ route('todo.destroy', $task->id) }}" style="display:inline">
                @csrf @method('DELETE')
                <button>Eliminar</button>
            </form>
        </div>
    @endforeach
</body>
</html>