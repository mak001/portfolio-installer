<div class="container">

    <% if $Framework %>
        <div class="content">$Description</div>
        <% if $PaginatedProjects %>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <% loop $PaginatedProjects %>
                    <% include ProjectCard %>
                <% end_loop %>
            </div>
        <% end_if %>
    <% else_if $PaginatedFrameworks %>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <% loop $PaginatedFrameworks %>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">$Title</h5>
                            <p class="card-text">$Description</p>
                        </div>
                        <div class="card-footer">
                            <a href="$Link" class="btn btn-dark" title="$Title Projects">Projects</a>
                        </div>
                    </div>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
</div>
