<footer class="footer container-fluid text-center">
    $SiteConfig.Title

    <div class="links">
        <% loop $SiteConfig.Links %>
            <% include FooterLinkContent %>
        <% end_loop %>
    </div>
</footer>
