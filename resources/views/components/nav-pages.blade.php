@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between bg-white p-2 rounded-2xl">

    <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="flex items-center page-link {{$paginator->onFirstPage() ? 'page-unavailable' : ''}}">
        <x-heroicon-m-chevron-left class="w-5" />
        {!! __('pagination.previous') !!}
    </button>

    <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" class="flex items-center page-link {{!$paginator->hasMorePages() ? 'page-unavailable' : ''}}">
        {!! __('pagination.next') !!}
        <x-heroicon-m-chevron-right class="w-5" />
    </button>
</nav>
