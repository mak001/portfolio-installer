$ElementalArea

<div class="project-nav">
    <a href="$Link">Projects</a>
    <a href="$LanguageLink">Languages</a>
</div>

<div class="project-list">
<% if $PaginatedFrameworks %>
    <% loop $PaginatedFrameworks %>
        <% include Uses %>
    <% end_loop %>
    <% with $PaginatedFrameworks %>
        <% include Pagination %>
    <% end_with %>
<% else %>
    No Frameworks
<% end_if %>
</div>
