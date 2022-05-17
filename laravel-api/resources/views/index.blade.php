@extends('header')
    <center>
        <div class="row">

            <h1>Test the System</h1>
                <h6  style="color: red">{{$sid}}</h6>
            <form action="/clients">
                <input type="submit" class="btn btn-danger" value="Clients" />    
        </form>
        <form action="/login">
                <input type="submit" class="btn btn-danger" value="Back" />    
        </form>
        </div>
    </center>

