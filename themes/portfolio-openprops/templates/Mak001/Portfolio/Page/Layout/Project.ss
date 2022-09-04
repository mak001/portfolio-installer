<div class="uses">
    <div class="languages">
        <h5>Languages</h5>
        <% if $Languages %>
            <% loop $Languages %>
                <a href="$Link" class="btn outline">$Title</a>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
    <div class="frameworks">
        <h5>Frameworks</h5>
        <% if $Frameworks %>
            <% loop $Frameworks %>
                <a href="$Link" class="btn outline">$Title</a>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
    <div class="sources">
        <h5>Sources</h5>
        <% if $Sources %>
            <% loop $Sources %>
                <a href="$URL" class="btn outline">$Title</a>
            <% end_loop %>
        <% else %>
            <div><span class="">None</span></div>
        <% end_if %>
    </div>
</div>

$ElementalArea
