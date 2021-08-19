<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="content">$Content</div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <% loop $PaginatedProjects %>
            <% include ProjectCard %>
        <% end_loop %>
    </div>
</div>
