<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>

<div class="container">
    <h1>Short Link App</h1>

    <div class="card">
        <div class="card-body">

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>URL</th>
                    <th>Title</th>
                    <th>Views</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mostViewed as $view)
                    <tr>
                        <td>{{ $view->link }}</td>
                        <td>{{ $view->title }}</td>
                        <td>{{ $view->views }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
