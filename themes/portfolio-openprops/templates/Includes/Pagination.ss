<% if $MoreThanOnePage %>
    <nav class="pagination">
        <% if $NotFirstPage %>
            <a class="prev btn" href="$PrevLink">Prev</a>
        <% else %>
            <span class="btn outline">Prev</span>
        <% end_if %>
        <% loop $PaginationSummary %>
            <% if $CurrentBool %>
                <span class="curr btn outline">$PageNum</span>
            <% else %>
                <% if $Link %>
                    <a href="$Link" class="btn">$PageNum</a>
                <% else %>
                    <span class="btn outline">...</span>
                <% end_if %>
            <% end_if %>
        <% end_loop %>
        <% if $NotLastPage %>
            <a class="btn" href="$NextLink">Next</a>
        <% else %>
            <span class="btn outline">Next</span>
        <% end_if %>
    </nav>
    <% require themedCSS('dist/css/parts/pagination.css') %>
<% end_if %>
