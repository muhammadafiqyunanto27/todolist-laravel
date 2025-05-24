<!DOCTYPE html>
<html>
<head>
    <title>Tasks List</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f8f8f8; }
        a.button { padding: 6px 12px; background: #007bff; color: #fff; text-decoration: none; border-radius: 4px; }
        form { display: inline; }
        .alert { background: #d4edda; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Daftar Tasks</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="button">+ Tambah Task</a>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Task</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->user->name ?? 'N/A' }}</td>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->is_completed ? 'Selesai' : 'Belum' }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="button">Detail</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="button" style="background: #28a745;">Edit</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background: #dc3545;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
