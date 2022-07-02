<% if $Title && $ShowTitle %><h2 class="element__title">$Title</h2><% end_if %>
<% if $Images %>
    <% loop $Images %>
        <div class="photogallery-holder">
            <a href="#gallery-$Up.ID-$ID" data-title="<h4>$Title</h4> $Content" class="no-decoration">
                <img src="$Image.Fill(576,576).URL" alt="$Image.Title">
            </a>
            <a href="#close-lighbox" class="no-decoration lightbox" id="gallery-$Up.ID-$ID">
                <div class="image" style="background-image: url('$Image.URL');"></div>
                <div class="description">
                    <h4>$Title</h4>
                    $Content
                </div>
            </a>
        </div>
    <% end_loop %>
<% end_if %>
<% require themedCSS('dist/css/parts/elements/gallery.css') %>
