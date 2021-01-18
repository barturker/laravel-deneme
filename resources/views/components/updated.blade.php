<p>

    {{empty(trim($slot)) ? 'Added' : $slot}} {{$date->diffForHumans() }}

@if(isset($name))
        By: {{$name}}
    @endif

</p>
