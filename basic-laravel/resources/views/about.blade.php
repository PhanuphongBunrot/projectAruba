<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เกี่ยวกับเราt</title>
</head>

<body>
    <h1>เกี่ยวกับผู้พ้ฒนาเว็ป</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam quos ducimus officia fuga, natus non odio nesciunt ex incidunt cupiditate enim adipisci ipsam accusantium earum doloremque dolorum! Iure, eligendi aperiam?</p>
</body>
    <p>ที่อยู่ {{$address}}</p>
    <p>เบอร์ {{$tel}}</p>
    <p>{{$error}}</p>
    <a href="{{url('/')}}">Home</a>
    <a href="{{url('/admin')}}">Admin</a>
    <a href="{{route('user')}}">User</a> <!-- เมื่อตั้งชื่อเเล้วให้ใช้คำสั่งนี้ -->
    <a href="{{url('/about')}}">About</a>

</html>