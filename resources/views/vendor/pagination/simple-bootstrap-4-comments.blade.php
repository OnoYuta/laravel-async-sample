@if ($paginator->hasPages())
<nav>
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled" aria-disabled="true">
            <!-- 下記を修正 -->
            <span class="page-link">新しい投稿</span>
        </li>
        @else
        <li class="page-item">
            <!-- 下記を修正 -->
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">新しい投稿</a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <!-- 下記を修正 -->
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">過去の投稿</a>
        </li>
        @else
        <li class="page-item disabled" aria-disabled="true">
            <!-- 下記を修正 -->
            <span class="page-link">過去の投稿</span>
        </li>
        @endif
    </ul>
</nav>
@endif