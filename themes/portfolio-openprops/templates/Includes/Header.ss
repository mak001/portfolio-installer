<header>
    <a class="brand no-decoration" href="$BaseHref" rel="home">$SiteConfig.Title</a>

    <input type="checkbox" id="side-menu"/>
    <label for="side-menu"><span></span></label>
    <nav>
        <ul>
            <% loop $Menu(1) %>
                <% if $isCurrent %>
                    <li class="$LinkingMode default-cursor">$MenuTitle.XML</li>
                <% else %>
                    <li class="$LinkingMode"><a href="$Link" title="$Title.XML" class="underlined">$MenuTitle.XML</a></li>
                <% end_if %>
            <% end_loop %>
        </ul>
    </nav>
</header>
