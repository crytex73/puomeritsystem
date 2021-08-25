<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>Hi, {{ $student_name }} you just got 1 compound.</h2>
    <ul>
        <li>Reason : {{ $compound_reason }}</li>
        <li>Value : {{ $compound_value }}</li>
        <li>By : {{ $lecturer_name }}</li>
    </ul>
  </body>
</html>