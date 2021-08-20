<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 btn-group btn-group-lg">
            <span class="btn btn-outline-dark active">Projects</span>
            <a href="$LanguageLink" class="btn btn-outline-dark">Languages</a>
            <a href="$FrameworkLink" class="btn btn-outline-dark">Frameworks</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="content">$Content</div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 justify-content-center g-4">
        <% loop $PaginatedProjects %>
            <% include ProjectCard %>
        <% end_loop %>
    </div>
</div>
