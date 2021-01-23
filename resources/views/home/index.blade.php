@extends('layouts.app')

@section('title', 'Home page')

@section('content')
    <h1>{{__('messages.hello')}}</h1>
    <h1>@lang('messages.hello')</h1>

    <p>@lang('messages.example_with_value', ['name' =>'John'])</p>

    <p>{{trans_choice('messages.plural', 0, ['a' => 4444])}}</p>
    <p>{{trans_choice('messages.plural', 1)}}</p>
    <p>{{trans_choice('messages.plural', 2)}}</p>
    <p>{{trans_choice('messages.plural', 3)}}</p>

    <p>@lang('Hello world!')</p>
    <p>@lang('Hello :name', ['name' => 'Bartu'])</p>

    <div>
        @for ($i = 0; $i < 10; $i++)
            <div>The current value is {{ $i }}</div>
        @endfor
    </div>

    <div>
        @php $done = false @endphp
        @while(!$done)
            <div>I'm not done</div>

            @php
                if (random_int(0, 1) === 1) $done = true
            @endphp
        @endwhile
    </div>
@endsection
