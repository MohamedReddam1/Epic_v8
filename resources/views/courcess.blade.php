<!DOCTYPE html>
<html>
<head>
    <title>Course Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        th, td {
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Courses Report</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courseFormateur as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->titre }}</td>
                    <td>{{ $course->categorie }}</td>
                    <td>{{ $course->prix }} MAD</td>
                    <td>{{ $course->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
