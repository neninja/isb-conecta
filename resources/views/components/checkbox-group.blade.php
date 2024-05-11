@php
    $model = $attributes->whereStartsWith('wire:model')->first();
    $names = array_map(fn($option) => $option['name'], $options);
@endphp
<ul class="flex flex-col gap-3" x-data="{ options: $wire.entangle('{{$model}}').live }" id="{{$model}}">
    @foreach($options as $option)
        @php($id = $model . '.' . $option['name'])
        <label class="flex gap-3 cursor-pointer">
            <div class="flex bg-neutral-high p-2 rounded-xl">
                <div class="w-5 flex justify-center items-center">
                    @if($option['name'] === 'all')
                        <input type="checkbox" name="all" id="{{$id}}" @change="
                            cb = null;

                            if ($event.target.checked) {
                                cb = (el) => options.push(el.name);
                            } else {
                                cb = (el) => options = [];
                            }
                            document.querySelectorAll('#{{$model}} input[type=checkbox]:not([name=all])').forEach(el => cb(el))">
                    @else
                        <input x-model="options" value="{{$option['name']}}"  type="checkbox" name="{{$option['name']}}" id="{{$id}}" @change="
                            all = document.querySelectorAll('#{{$model}} input[type=checkbox]').length - 1;
                            allChecked = document.querySelectorAll('#{{$model}} input[type=checkbox]:checked').length;
                            if (!$event.target.checked) {
                                allChecked -= 1;
                            }
                            checkboxes = document.querySelectorAll('#{{$model}} input[name=all]').forEach((el) => el.checked = all === allChecked)">
                    @endif
                </div>
            </div>
            <div class="w-full p-2 text-primary font-extrabold uppercase bg-neutral-high rounded-xl">
                {{$option['label']}}
            </div>
        </label>
    @endforeach
    <x-input-error :for="$model"></x-input-error>
</ul>
