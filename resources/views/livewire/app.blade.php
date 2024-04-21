<div x-data="app" class="flex flex-col gap-7" @componentchanged="handleComponentChanged">
    @vite('resources/js/components/app.js')
    @foreach($dynamic as $component)
        @livewire($component['name'], ['options' => $component['options'], 'content' => $component['content']])
    @endforeach
</div>
