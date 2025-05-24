<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        .button { margin-top: 15px; background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task">Task:</label>
        <input type="text" name="task" value="{{ $task->task }}" required>

        <label for="is_completed">Selesai?</label>
        <select name="is_completed">
            <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Belum</option>
            <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Selesai</option>
        </select>

        <button type="submit" class="button">Update</button>
    </form>
</body>
</html>
