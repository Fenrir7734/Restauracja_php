@if ($paginator->hasPages())
    <nav style="background-color: transparent;" class="d-flex justify-content-center" aria-label="Page navigation example">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" style="color: #E82B34">
                    <a class="page-link" href="#">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </li>
            @else
                <li class="page-item" >
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item" >
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" >
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" style="color: #E82B34">
                    <a class="page-link" href="#">
                        <i class="bi bi-caret-right-fill"></i>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
@endif
