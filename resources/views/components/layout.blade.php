@props([
    'title' => 'Laracast Tutorial'
    ])

<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}}</title>

</head>
<body class="bg-gray-700">
    <main  class="bg-gray-700 p6 max-w-xl mx-auto">
    {{$slot}}
    </main>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</body>
