<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="content">$Content</div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <% loop $Children %>
        <div class="col">
            <div class="card h-100">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <% end_loop %>
    </div>
</div>
