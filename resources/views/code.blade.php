

<!-- resources/views/child.blade.php -->

@extends('layout')

@section('title', 'Page Title')

@section('sidebar')
@parent

<p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    @if(auth()->user()->canUpdate($code))
        <form method="POST" action="{{ route('codes.update', $code) }}">
            @csrf

            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ $code->name }}" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                <div class="col-md-6">
                    <input id="content" type="text" step="1" class="form-control" name="content" value="{{ $code->content }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                <div class="col-md-6">
                    <select id="type" class="form-control" name="type" value="{{ $code->type }}" required>
                        @foreach(\App\Models\Code::TYPES as $val => $type)
                            <option value="{{$val}}" @if($code->type == $val) selected @endif>{{ $type }}</option>
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
    @endif
    @if($code)
        @if($code->type == \App\Models\Code::IMAGE)
            <div>
                <img src="{{$code->content}}" style="width: 100%">
            </div>
        @elseif($code->type == \App\Models\Code::REDIRECT)
            <div style="padding: 50px;">
                <a href="{{$code->content}}">PSA</a>
            </div>

        @elseif($code->type == \App\Models\Code::TEXT)
            <div style="padding: 50px;">
                <p>{{$code->content}}</p>
            </div>
        @endif
    @endif
@endsection
