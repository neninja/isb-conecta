<div>
    @foreach($dynamic as $component)
        @livewire($component['name'], ['options' => $component['options'], 'content' => $component['content']])
    @endforeach
</div>
