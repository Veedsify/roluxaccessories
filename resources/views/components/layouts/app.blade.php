<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head', ['title' => $title ?? config('app.name')])
    @include('partials.scripts', ['title' => $title ?? config('app.name')])
</head>

{{$slot}}

</html>
