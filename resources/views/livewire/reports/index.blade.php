<div>
    @if(user()->isAdmin())
        <x-resource-list :links="$links"/>
    @else
        <ul class="flex flex-col gap-4">
            @foreach(user()->currentAvailableReports() as $report)
                <li class="flex gap-1 group">
                    <div class="flex bg-neutral-high p-2 rounded-xl">
                        <div class="w-5 flex">
                            @svg('heroicon-o-plus-circle',  ['class' => "text-primary group-hover:text-neutral-low-dark"])
                        </div>
                    </div>
                    <a href="{{ route('reports.create', kebabClassBaseName($report)) }}" class="w-full p-2 text-primary font-extrabold uppercase bg-neutral-high rounded-xl group-hover:text-neutral-low-dark">
                        {{$report::SINGULAR_LABEL}}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
