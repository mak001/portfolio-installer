<% if $MoreThanOnePage %>
    <nav class="pagination">
        <% if $NotFirstPage %>
            <a class="prev" href="$PrevLink">Prev</a>
        <% end_if %>
        <% loop $PaginationSummary %>
            <% if $CurrentBool %>
                <span class="curr">$PageNum</span>
            <% else %>
                <% if $Link %>
                    <a href="$Link">$PageNum</a>
                <% else %>
                    ...
                <% end_if %>
            <% end_if %>
        <% end_loop %>
        <% if $NotLastPage %>
            <a class="next" href="$NextLink">Next</a>
        <% end_if %>
    </nav>
    <% require themedCSS('dist/css/parts/pagination.css') %>
<% end_if %>
