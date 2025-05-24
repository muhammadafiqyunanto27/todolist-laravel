<!DOCTYPE html>
<html>
<head>
    <title>Daftar Todo</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 40px 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s;
        }

        .btn-create { background-color: #28a745; color: white; }
        .btn-show   { background-color: #007bff; color: white; }
        .btn-edit   { background-color: #ffc107; color: white; }
        .btn-delete { background-color: #dc3545; color: white; }

        .btn:hover {
            opacity: 0.9;
        }

        .actions form, .actions a {
            display: inline-block;
            margin: 3px 2px;
        }

        .filter-buttons {
            text-align: center;
            margin-bottom: 30px;
        }

        .filter-buttons .btn {
            margin: 0 8px;
        }

        .top-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 16px 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr.done {
            background-color: #f9f9f9;
            color: #999;
            text-decoration: line-through;
        }

        @media (max-width: 768px) {
            .filter-buttons {
                text-align: center;
            }

            .top-buttons {
                flex-direction: column;
                gap: 10px;
            }

            .top-buttons a,
            .top-buttons form {
                width: 100%;
                text-align: center;
            }

            table {
                font-size: 14px;
            }

            th, td {
                padding: 12px 8px;
            }
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <h1>Daftar Todo</h1>

        <div class="filter-buttons">
            <a href="{{ route('tasks.index') }}" class="btn btn-show">Semua</a>
            <a href="{{ route('tasks.index', ['filter' => 'done']) }}" class="btn btn-edit">Selesai</a>
            <a href="{{ route('tasks.index', ['filter' => 'pending']) }}" class="btn btn-create">Belum Selesai</a>
        </div>

        <div class="top-buttons">
            <a href="{{ route('tasks.create') }}" class="btn btn-create">+ Tambah Task</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-delete">Logout</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Task</th>
                    <th>Status</th>
                    <th>Dibuat</th>
                    <th>Selesai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                <tr class="{{ $task->is_completed ? 'done' : '' }}">
                    <td>{{ $task->task }}</td>
                    <td><strong>{{ $task->is_completed ? 'Done' : 'Pending' }}</strong></td>
                    <td>{{ $task->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $task->is_completed ? $task->updated_at->format('d M Y H:i') : '-' }}</td>
                    <td class="actions">
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-show">Detail</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-edit">Edit</a>

                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus task ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>

                        @if(!$task->is_completed)
                        <form action="{{ route('tasks.update', $task) }}" method="POST" onsubmit="return confirm('Yakin ingin menyelesaikan task ini?')">
                            @csrf @method('PUT')
                            <input type="hidden" name="task" value="{{ $task->task }}">
                            <input type="hidden" name="is_completed" value="1">
                            <button type="submit" class="btn btn-show">Selesai</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding: 20px;">Belum ada task.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6'
            });
        </script>
        @endif
    </div>
</body>
</html>
