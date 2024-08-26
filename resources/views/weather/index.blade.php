<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities List</title>
</head>
<body>
    <h1>Cities</h1>
    <hr>
    <ul>
        @forelse ($cities as $city)
            <li>
                <a href="{{ url('city/' . $city->code) }}">{{ $city->name }}</a> ({{ $city->code }})
            </li>
        @empty
            <p>No cities available.</p>
        @endforelse
    </ul>
</body>
</html>