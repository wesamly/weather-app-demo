<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather in {{ $city->name }}</title>
</head>
<body>
    <h1>Weather in {{ $city->name }}</h1>
    <p>Temperature: {{ $weather['temperature'] }}</p>
    <p>Description: {{ $weather['description'] }}</p>
</body>
</html>