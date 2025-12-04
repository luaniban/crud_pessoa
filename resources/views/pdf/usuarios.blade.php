<!DOCTYPE html>
<html>
<head>
    <title>Lista de Classificação</title>
    <style>
        @page { size: A4 portrait; margin: 1.5cm; }
        body { font-family: 'Roboto', sans-serif; margin: 0; padding: 0; }

        table, td, th {
            padding: 5px 0;
            border-bottom: 0.5px solid #dddddd;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            font-family: Arial, sans-serif;
        }

        thead th {
            background: #f2f2f2;
            font-weight: bold;
            font-size: 12px;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center; margin-bottom: 20px;">Lista de Usuários</h2>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="page-break-after: always;"></div>

</body>
</html>
