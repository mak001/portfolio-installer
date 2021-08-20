<div class="container">
    <div class="row justify-content-center g-4">
        <div class="col-sm-6 text-center">
            <div class="card">
                <div class="card-header">Languages</div>
                <div class="list-group list-group-flush">
                    <% if $Languages %>
                        <% loop $Languages %>
                            <a href="$Link" class="text-decoration-none text-body list-group-item">$Title</a>
                        <% end_loop %>
                    <% else %>
                        <div class="list-group-item">None</div>
                    <% end_if %>
                </div>
            </div>
        </div>
        <div class="col-sm-6 text-center">
            <div class="card">
                <div class="card-header">Frameworks</div>
                <div class="list-group list-group-flush">
                    <% if $Frameworks %>
                        <% loop $Frameworks %>
                            <a href="$Link" class="text-decoration-none text-body list-group-item">$Title</a>
                        <% end_loop %>
                    <% else %>
                        <div class="list-group-item">None</div>
                    <% end_if %>
                </div>
            </div>
        </div>
        <% if $Sources %>
            <div class="col-sm-6 col-md-4 text-center">
                <div class="card">
                    <div class="card-header">Links</div>
                    <div class="list-group list-group-flush">
                        <% loop $Sources %>
                            <a href="$URL" class="text-decoration-none text-body list-group-item">$Title</a>
                        <% end_loop %>
                    </div>
                </div>
            </div>
        <% end_if %>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="content">$ElementalArea</div>
        </div>
    </div>
</div>
