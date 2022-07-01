<footer>
    <div class="text-center">
        <a href="#" class="no-decoration">Jump to top of page</a>
    </div>
    <div class="text-center">
        <% loop $SiteConfig.Links %>
        <a href="$URL" class="icon" title="$Title">
            <% if $Icon %>
                <i class="bi bi-$Icon" aria-label="$Title" role="img"></i>
            <% else %>
            <span>$Title</span>
            <% end_if %>
        </a>
        <% end_loop %>
    </div>
</footer>
