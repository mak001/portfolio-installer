<menu class="breadcrumb">
    <li><a href="/" title="Go to the Home Page" class="underlined"><i class="bi bi-house-fill"></i> Home</a></li>
    <% loop Pages %>
        <% if $Last && $Unlinked %>
            <li aria-current="page" class="current unlinked default-cursor">$MenuTitle.XML</li>
        <% else_if $Last %>
            <li aria-current="page" class="current default-cursor">$MenuTitle.XML</li>
        <% else_if $Unlinked %>
            <li aria-current="page" class="unlinked default-cursor">$MenuTitle.XML</li>
        <% else %>
            <li ><a href="$Link" title="Go to the $MenuTitle.XML page" class="underlined">$MenuTitle.XML</a></li>
        <% end_if %>
    <% end_loop %>
</menu>
