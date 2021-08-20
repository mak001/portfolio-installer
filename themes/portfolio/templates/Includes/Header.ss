<nav class="navbar navbar-expand-lg navbar-light bg-purple box-shadow sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="$BaseHref" rel="home">$SiteConfig.Title</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <% loop $Menu(1) %>
                    <li class="nav-item $LinkingMode"><a class="nav-link" href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
                <% end_loop %>
            </ul>
            <form class="form-inline my-2 my-lg-0 d-flex">
                <input class="form-control me-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
