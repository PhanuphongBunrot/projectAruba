@extends('header')

<div class="d-flex vh-100">
    <div style="background-color : #e6e6e6 ;width: 400px ;border-radius: 24px; padding: 45px 16px 77px 16px;" class="mx-auto align-self-center">
        <div>

        </div>
        <form action="/">
            <input type="text" placeholder="UserName">
            <input type="password" placeholder="Password"><br>
            <input type="submit" class="btn btn-outline-primary" value="Login">
        </form>
    </div>
</div>
<style>
    input[type="text"],
    input[type="password"] {
        display: block;
        padding: 14px;
        margin-bottom: 24px;
        width: 100%;
        border: 2px solid #f8f8f7;
        background: none;
        border-radius: 24px;
    }

    input[type="text"]:focus,
    input[type="password"]:focus,
    input[type="text"]:hover,
    input[type="password"]:hover {
        border: 2px solid #f09206;
        outline: none;
    }

    input[type="submit"] {
        display: block;
        width: 100%;
        border-radius: 24px;
    }
</style>