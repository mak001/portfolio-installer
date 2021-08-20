<div class="col">
    <div class="card h-100">
        <a href="$Link" class="card-img-top">
            <% if $MainPhoto %>
                <img src="$MainPhoto.Fill(510, 200).URL" class="card-img-top rounded-top-md">
            <% else %>
                <img src="$ThemeDir/images/code.png" class="card-img-top rounded-top-md">
            <% end_if %>
        </a>
        <div class="card-body">
            <a href="$Link" class="text-decoration-none text-body">
                <h5 class="card-title">$Title</h5>
            </a>
            <p class="card-text">$Teaser</p>
            <div class="row text-center">
                <div class=" col-lg-6 py-1">
                    <div class="card">
                        <div class="card-header">
                            Languages
                        </div>
                        <ul class="list-group list-group-flush">
                            <% loop $Languages %>
                                <li class="list-group-item">
                                    <a href="$Link" class="text-decoration-none text-body">$Title</a>
                                </li>
                            <% end_loop %>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 py-1">
                    <div class="card">
                        <div class="card-header">
                            Frameworks
                        </div>
                        <ul class="list-group list-group-flush">
                            <% loop $Frameworks %>
                                <li class="list-group-item">
                                    <a href="$Link" class="text-decoration-none text-body">$Title</a>
                                </li>
                            <% end_loop %>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <% if $Sources %>
            <% loop $Sources %>
                <a href="$URL" class="text-decoration-none text-muted text-center" target="_blank">
                    <div class="card-footer">$Title</div>
                </a>
            <% end_loop %>
        <% end_if %>
        <a href="$Link" class="text-decoration-none text-body text-center">
            <div class="card-footer">Read More</div>
        </a>
    </div>
</div>
