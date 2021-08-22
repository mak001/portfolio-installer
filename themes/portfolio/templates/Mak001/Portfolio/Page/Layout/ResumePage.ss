<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="content">$Content</div>
        </div>
        <div class="col-12 col-md-9 col-lg-6">
            <% if $Schools %>
                <h3 class="text-center">Education</h3>
                <% loop $Schools %>
                    <p>$Title <i>$Location</i><% if $Degree %> ($Degree)<% end_if %></p>
                    <ul>
                        <li>$Graduated</li>
                        <% if $Honors %>
                            <li>$Honors</li><% end_if %>
                    </ul>
                <% end_loop %>
            <% end_if %>
            <% if $Skills %>
                <h3 class="text-center">Skills</h3>
                <ul>
                    <% loop $Skills %>
                        <li>$Title<% if $Description %>$Description<% end_if %></li>
                    <% end_loop %>
                </ul>
            <% end_if %>
            <% if $Skills %>
                <h3 class="text-center">Skills</h3>
                <ul>
                    <% loop $Skills %>
                        <li>$Title<% if $Description %>$Description<% end_if %></li>
                    <% end_loop %>
                </ul>
            <% end_if %>
            <% if $Jobs %>
                <h3 class="text-center">Experience</h3>
                <div>
                    <% loop $Jobs %>
                        <div class="mb-5">
                            <p><i>$Title</i>, <a href="$CompanyURL">$CompanyName</a>, $Location ($StartDate<% if $EndDate %> - $EndDate<% end_if %>)</p>
                            $Description
                        </div>
                    <% end_loop %>
                </div>
            <% end_if %>
        </div>
    </div>
</div>
