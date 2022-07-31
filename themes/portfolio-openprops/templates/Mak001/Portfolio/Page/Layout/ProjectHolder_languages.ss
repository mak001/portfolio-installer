$ElementalArea

<div class="project-nav">
    <a href="$Link">Projects</a>
    <a href="$FrameworkLink">Frameworks</a>
</div>

<% if $PaginatedLanguages %>
    <% loop $PaginatedLanguages %>
        <% include Uses %>
    <% end_loop %>
    <% with $PaginatedLanguages %>
        <% include Pagination %>
    <% end_with %>
<% else %>
    No Languages
<% end_if %>
