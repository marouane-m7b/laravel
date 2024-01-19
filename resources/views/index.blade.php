@php
    use Illuminate\Support\Facades\Crypt;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body class="container my-5">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>titre</th>
                <th>descreption</th>
                <th>created at</th>
                <th>updated at</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->image ? 'Yes' : 'No' }}</td>
                    <td>{{ $post->titre }}</td>
                    <td>{{ $post->description }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('posts.show', Crypt::encrypt($post->id)) }}">Show
                            Post
                        </a>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
