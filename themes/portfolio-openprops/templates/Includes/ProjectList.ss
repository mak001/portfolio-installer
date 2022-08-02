<div class="project-list">
    <% if $PaginatedProjects %>
        <% loop $PaginatedProjects %>
        <div class="projects">
            <div class="project">
                <h5>$Title</h5>
                <div class="description">$Teaser</div>
                <a href="$Link" class="btn outline">View</a>
            </div>
        </div>
        <% end_loop %>
        <% with $PaginatedProjects %>
            <% include Pagination %>
        <% end_with %>
    <% else %>
        No Projects
    <% end_if %>
</div>
