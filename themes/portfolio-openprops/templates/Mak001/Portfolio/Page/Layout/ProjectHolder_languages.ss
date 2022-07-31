$ElementalArea

<div class="project-nav">
    <a href="$Link">Projects</a>
    <a href="$FrameworkLink">Frameworks</a>
</div>

<div class="project-list">
<% if $PaginatedLanguages %>
    <div class="projects">
    <% loop $PaginatedLanguages %>
        <% include Uses %>
    <% end_loop %>
    </div>
    <% with $PaginatedLanguages %>
        <% include Pagination %>
    <% end_with %>
<% else %>
    No Languages
<% end_if %>
</div>
