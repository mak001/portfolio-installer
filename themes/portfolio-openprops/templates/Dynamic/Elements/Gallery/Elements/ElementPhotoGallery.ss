<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>

<div class="row">
    <% if $Images %>
        <% loop $Images %>
            <div class="photogallery-holder">
                <a href="#gallery-$Up.ID-$ID" data-title="<h4>$Title</h4> $Content" class="no-decoration">
                    <div><img src="$Image.Fill(576,576).URL" alt="$Image.Title"></div>
                </a>
                <a href="#close-lighbox" class="no-decoration lightbox" id="gallery-$Up.ID-$ID">
                    <span style="background-image: url('$Image.URL');"></span>
                </a>
            </div>
        <% end_loop %>
    <% end_if %>
</div>

<% require themedCSS('dist/css/parts/elements/gallery.css') %>
