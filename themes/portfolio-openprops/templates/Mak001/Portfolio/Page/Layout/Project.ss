<h1>$Title</h1>

<div class="uses">
    <div class="languages">
        <h5>Languages</h5>
        <% if $Languages %>
            <% loop $Languages %>
                <div><a href="$Link" class="">$Title</a></div>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
    <div class="frameworks">
        <h5>Frameworks</h5>
        <% if $Frameworks %>
            <% loop $Frameworks %>
                <div><a href="$Link" class="">$Title</a></div>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
    <div class="sources">
        <h5>Sources</h5>
        <% if $Sources %>
            <% loop $Sources %>
                <div><a href="$Link" class="">$Title</a></div>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
</div>




$ElementalArea
