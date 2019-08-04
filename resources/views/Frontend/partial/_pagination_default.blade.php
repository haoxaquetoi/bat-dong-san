<?php
// config
$link_limit = 7; // maximum number of links (a little bit inaccurate, but will be ok for now)
$url = '';
if (isset($params)) {
    foreach ($params as $key => $value) {
        if($key != 'page'){
            $url .= "&$key=$value";
        }
    }
}
?>
@if ($paginator->lastPage() > 1)
<ul class="pagination">
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url(1) . $url }}">Trang đầu</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
    <?php
    $half_total_links = floor($link_limit / 2);
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
    <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
        <a href="{{ $paginator->url($i)  . $url }}">{{ $i }}</a>
    </li>
    @endif
    @endfor
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->lastPage())  . $url }}">Trang cuối</a>
    </li>
</ul>
@endif