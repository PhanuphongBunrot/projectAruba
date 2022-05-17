<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเราt</title>
</head>

<body>

    <?php

    $user = "SenSORO";
    // $user = "Sen"
    $arr = array("Home", "Member", "About");
    ?>


    @if($user == "SenSORO")
    <h1>ยินดีตอนรับแอดมิน {{$user}}</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quos ducimus officia fuga, natus non odio nesciunt ex incidunt cupiditate enim adipisci ipsam accusantium earum doloremque dolorum! Iure, eligendi aperiam?</p>
    @else
    <h1>ผู้ใช้ท่านนี้ไม่เป็นแอดมิน</h1>
    @endif
    @foreach($arr as $menu)
    <a href="">{{$menu}}</a>
    @endforeach
    <ul>
        @for($i=1;$i<=5;$i++) <li>{{$i}}</li>
            @endfor
    </ul>
</body>

</html>