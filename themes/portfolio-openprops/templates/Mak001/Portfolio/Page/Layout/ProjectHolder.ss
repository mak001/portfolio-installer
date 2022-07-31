$ElementalArea

<div class="project-nav">
    <a href="$LanguageLink">Languages</a>
    <a href="$FrameworkLink">Frameworks</a>
</div>

<div class="project-list">
<% if $PaginatedProjects %>
    <div class="projects">
    <% loop $PaginatedProjects %>
        $Title
    <% end_loop %>
    </div>
    <% with $PaginatedProjects %>
        <% include Pagination %>
    <% end_with %>
<% else %>
    No Projects
<% end_if %>
</div>
