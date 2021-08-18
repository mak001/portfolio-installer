<footer class="footer container-fluid text-center">
    $SiteConfig.Title

    <div class="links">
        <% loop $SiteConfig.Links %>
            <% include LinkContent %>
        <% end_loop %>
    </div>
</footer>
