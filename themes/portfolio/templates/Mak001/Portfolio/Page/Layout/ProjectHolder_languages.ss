<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 btn-group btn-group-lg">
            <a href="$Link" class="btn btn-outline-dark">Projects</a>
            <span class="btn btn-outline-dark active">Languages</span>
            <a href="$FrameworkLink" class="btn btn-outline-dark">Frameworks</a>
        </div>
    </div>
    <% if $Language %>
        <div class="row">
            <div class="col-sm-12">
                <div class="content">$Description</div>
            </div>
        </div>
        <% if $PaginatedProjects %>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <% loop $PaginatedProjects %>
                    <% include ProjectCard %>
                <% end_loop %>
            </div>
        <% end_if %>
    <% else_if $PaginatedLanguages %>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <% loop $PaginatedLanguages %>
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
