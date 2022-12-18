

<!-- resources/views/child.blade.php -->

@extends('layout')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div style="padding: 15px">
        <p>
            <em>This is where your life is created. You've been inside that box your whole life and you had no idea that you were inside the box. Just like when an animal is born in captivity and grows up in a zoo. That animal is completely unaware that there is a whole other world outside beyond the fence. Well this is like that, Mate, and someone else has been drawing your life for ya. It's about time you think for yourself, where you decide what happens. You ever heard that song by the Beatles, 'Think for Yourself'. George Harrison, Mate. You see, he fucking knew it.</em> - Sassy the Sasquatch
        </p>
    </div>

@endsection
