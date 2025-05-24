<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Todo</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            padding: 40px 20px;
            margin: 0;
        }

        .card {
            background-color: white;
            max-width: 500px;
            margin: auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-top: 0;
            color: #333;
            font-size: 24px;
        }

        h2.done {
            text-decoration: line-through;
            color: #888;
        }

        p {
            font-size: 16px;
            margin: 10px 0;
            color: #555;
        }

        strong {
            color: #000;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
            font-size: 15px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="card">
        <h2 class="{{ $task->is_completed ? 'done' : '' }}">{{ $task->task }}</h2>

        <p>Status: <strong>{{ $task->is_completed ? 'Done' : 'Pending' }}</strong></p>
        <p>Dibuat: {{ $task->created_at->format('d M Y H:i') }}</p>

        @if($task->is_completed)
            <p>Selesai: {{ $task->updated_at->format('d M Y H:i') }}</p>
        @endif

        <a href="{{ route('tasks.index') }}">← Kembali ke daftar</a>
    </div>

</body>
</html>
