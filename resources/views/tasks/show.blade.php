<!DOCTYPE html>
<html>
<head>
    <title>Detail Task</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        .button { background: #007bff; color: white; padding: 10px 15px; text-decoration: none; border-radius: 4px; }
        .info { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Detail Task</h1>

    <div class="info">
        <strong>User:</strong> {{ $task->user->name ?? 'N/A' }}<br>
        <strong>Task:</strong> {{ $task->task }}<br>
        <strong>Status:</strong> {{ $task->is_completed ? 'Selesai' : 'Belum' }}<br>
        <strong>Dibuat:</strong> {{ $task->created_at->format('d M Y') }}<br>
    </div>

    <br>
    <a href="{{ route('tasks.index') }}" class="button">Kembali ke Daftar</a>
</body>
</html>
