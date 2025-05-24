<!DOCTYPE html>
<html>
<head>
    <title>Tambah Task</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        .button { margin-top: 15px; background: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Tambah Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <label for="user_id">User ID:</label>
        <input type="number" name="user_id" required>

        <label for="task">Task:</label>
        <input type="text" name="task" required>

        <label for="is_completed">Selesai?</label>
        <select name="is_completed">
            <option value="0">Belum</option>
            <option value="1">Selesai</option>
        </select>

        <button type="submit" class="button">Simpan</button>
    </form>
</body>
</html>
