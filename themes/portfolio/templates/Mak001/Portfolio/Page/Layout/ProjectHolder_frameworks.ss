<div class="container">
    <div class="row mb-3">
        <div class="col-sm-12 btn-group btn-group-lg">
            <a href="$Link" class="btn btn-outline-dark">Projects</a>
            <a href="$LanguageLink" class="btn btn-outline-dark">Languages</a>
            <% if $Framework %>
                <a href="$FrameworkLink" class="btn btn-outline-dark active">Frameworks</a>
            <% else %>
            <span class="btn btn-outline-dark active">Frameworks</span>
            <% end_if %>
        </div>
    </div>
    <% if $Framework %>
        <div class="row">
            <div class="col-sm-12">
                <div class="content">$Description</div>
            </div>
        </div>
        <% if $PaginatedProjects %>
            <div class="row row-cols-1 row-cols-md-2 justify-content-center g-4">
                <% loop $PaginatedProjects %>
                    <% include ProjectCard %>
                <% end_loop %>
            </div>
        <% end_if %>
    <% else_if $PaginatedFrameworks %>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xxl-4 justify-content-center g-4">
            <% loop $PaginatedFrameworks %>
                <% include UsesCard %>
            <% end_loop %>
        </div>
    <% end_if %>
</div>
