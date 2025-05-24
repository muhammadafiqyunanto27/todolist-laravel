<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        input[type="text"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #ffc107;
            color: white;
            padding: 10px 18px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
        }

        button:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

    <h2>Edit Todo</h2>

    <form action="{{ route('tasks.update', $task) }}" method="POST" onsubmit="return confirm('Yakin ingin mengupdate task ini?')">
        @csrf @method('PUT')

        <input type="text" name="task" value="{{ $task->task }}" required>

        <select name="is_completed" required>
            <option value="0" {{ !$task->is_completed ? 'selected' : '' }}>Pending</option>
            <option value="1" {{ $task->is_completed ? 'selected' : '' }}>Done</option>
        </select>

        <button type="submit">Update</button>
    </form>

</body>
</html>
