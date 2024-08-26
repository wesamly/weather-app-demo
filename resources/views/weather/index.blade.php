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
    <form action="{{ url('/') }}" method="get">
        Search: <input type="text" name="q" value="{{ request('q') }}">
        <input type="hidden" name="field" value="name">
        <input type="hidden" name="operator" value="$contains">
        <input type="button" value="Search" onclick="searchCities()">
    </form>
    <ul>
        @forelse ($cities as $city)
            <li>
                <a href="{{ url('city/' . $city->code) }}">{{ $city->name }}</a> ({{ $city->code }})
            </li>
        @empty
            <p>No cities available.</p>
        @endforelse
    </ul>
    <script>
        function searchCities() {
            // URL as ?filters[field][operator]=value
            let url = "{{ url('/') }}";
            let field = document.getElementsByName('field')[0].value;
            let operator = document.getElementsByName('operator')[0].value;
            let value = document.getElementsByName('q')[0].value;
            url += `?filters[${field}][${operator}]=${value}`;
            window.location.href = url;
        }
    </script>
</body>
</html>