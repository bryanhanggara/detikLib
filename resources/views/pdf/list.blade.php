<!DOCTYPE html>
<html>
<head>
    <title>Books List Detiklib</span></title>
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Books List Detik<span style="color: red"><b>Lib</b></h1>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->category->name_categorie }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
