<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @if(Auth::user()->role == 'siswa')
        <li class="list-group">Menu siswa</li>
    @endif

    @if(Auth::user()->role == 'guru_bk')
        <li class="list-group">Menu Konseling</li>
    @endif

</html>
