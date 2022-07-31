$ElementalArea

<div class="project-nav">
    <a href="$LanguageLink">Languages</a>
    <a href="$FrameworkLink">Frameworks</a>
</div>

<% if $PaginatedProjects %>
    <% loop $PaginatedProjects %>
        $Title
    <% end_loop %>
    <% with $PaginatedProjects %>
        <% include Pagination %>
    <% end_with %>
<% else %>
    No Projects
<% end_if %>
