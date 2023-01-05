

<!-- resources/views/child.blade.php -->

@extends('layout')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div style="padding-left: 15px; padding-right: 15px">
        <form method="POST" action="{{ route('codes.store') }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code') }}</label>

                <div class="col-md-6">
                    <input id="code" type="number" step="1" class="form-control" name="code" value="" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                <div class="col-md-6">
                    <input id="content" type="text" step="1" class="form-control" name="content" value="" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <select id="type" class="form-control" name="type" value="" required>
                        @foreach(\App\Models\Code::TYPES as $val => $type)
                            <option value="{{$val}}">{{ $type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
