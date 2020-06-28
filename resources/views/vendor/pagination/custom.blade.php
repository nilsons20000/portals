<?php
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
    <div id="news_paginate" class="dataTables_paginate paging_simple_numbers">
        <ul class="pager">
                    @if ($paginator->onFirstPage())
                    <li class="disabled"><span>← Prev</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Prev</a></li>
                @endif
            
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                    $half_total_links = floor($link_limit / 3);
                    $from = $paginator->currentPage() - $half_total_links;
                    $to = $paginator->currentPage() + $half_total_links;
                    if ($paginator->currentPage() < $half_total_links) {
                        $to += $half_total_links - $paginator->currentPage();
                    }
                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                    }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="paginate_button page-item  {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endif
            @endfor
            <li id="news_next" class="paginate_button page-item {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
            </li>
        </ul>
    </div>
@endif

