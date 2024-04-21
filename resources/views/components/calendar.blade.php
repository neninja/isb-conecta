@php
    $model = $attributes->whereStartsWith('wire:model')->first();
@endphp
<div x-data="calendar($wire, '{{$model}}')">
    @vite('resources/js/components/calendar.js')
    <div class="w-fit text-primary font-extrabold">
        <div class="text-center lg:col-start-8 lg:col-end-13 lg:row-start-1 xl:col-start-9">
            <div class="flex bg-white p-2.5 rounded-3xl items-center">
                <button type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5" @click="previousMonth">
                    <span class="sr-only">Previous month</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="flex-auto uppercase" x-text="months[selectedMonth] + ' ' + selectedYear">
                </div>
                <button type="button" class="-m-1.5 flex flex-none items-center justify-center p-1.5" @click="nextMonth">
                    <span class="sr-only">Next month</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="isolate bg-white  p-2.5 rounded-3xl mt-2 grid grid-cols-7 gap-1">
                <template x-for="day in ['DOM', 'SEG', 'TER', 'QUA', 'QUI', 'SEX', 'SAB']">
                    <div class="flex justify-center w-full text-xs">
                        <span class="bg-primary-light w-full rounded-lg py-[1px] px-1 font-mono" x-text="day"></span>
                    </div>
                </template>
                <template x-for="day in days">
                    <div>
                        <button
                            :class="{
                                'bg-primary text-white': day.isSelected,
                                'invisible': !day.fromSelectedMonth && !day.isSelected,
                                'bg-primary-light': !day.isToday && !day.isSelected,
                                'bg-primary-light text-secondary': day.isToday && !day.isSelected,
                            }"
                            class="rounded-lg p-2 w-full flex justify-center items-center aspect-square"
                            @click="handleSelectDay(day)"
                            type="button">
                            <time :datetime="day.date" x-text="day.day"></time>
                        </button>
                    </div>
                </template>
            </div>
        </div>
    </div>
    <input type="hidden" x-model="selectedDate" x-ref="selectedDate"></input>
    <x-input-error :for="$model"></x-input-error>
</div>
