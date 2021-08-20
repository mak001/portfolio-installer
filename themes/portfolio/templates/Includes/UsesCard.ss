<div class="col">
    <div class="card h-100">
        <a href="$Link" class="card-img-top">
            <% if $Image %>
                <img src="$Image.Fill(510, 200).URL" class="card-img-top rounded-top-md">
            <% else %>
                <img src="$ThemeDir/images/code.png" class="card-img-top rounded-top-md">
            <% end_if %>
        </a>
        <div class="card-body">
            <a href="$Link" class="text-decoration-none text-body">
                <h5 class="card-title">$Title</h5>
            </a>
            <p class="card-text">$Description</p>
        </div>
        <a href="$Link" class="text-decoration-none text-body text-center">
            <div class="card-footer">Projects</div>
        </a>
    </div>
</div>
