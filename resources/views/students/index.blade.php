<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Students</h1>
    <ul>
        @foreach($students as $student)
            <li>
                fullname: {{  $student->fullname  }}, id: {{  $student->id  }}
            </li>
        @endforeach  
    </ul>
</body>
</html>