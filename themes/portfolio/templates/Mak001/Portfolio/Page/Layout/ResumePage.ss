<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="content">$Content</div>
        </div>
        <% if $Schools || $Skills || $Jobs %>
            <div class="col-sm-12 btn-group btn-group-lg my-4">
                <% if $Schools %><a href="#education" class="btn btn-outline-dark">Education</a><% end_if %>
                <% if $Skills %><a href="#skills" class="btn btn-outline-dark">Skills</a><% end_if %>
                <% if $Jobs %><a href="#experience" class="btn btn-outline-dark">Experience</a><% end_if %>
            </div>
        <% end_if %>
        <div class="col-12 col-md-9 col-lg-6">
            <% if $Schools %>
                <a id="education" class="text-decoration-none text-body"><h3 class="text-center">Education</h3></a>
                <% loop $Schools %>
                    <p>$Title <i>$Location</i><% if $Degree %> ($Degree)<% end_if %></p>
                    <ul>
                        <li>$Graduated</li>
                        <% if $Honors %>
                            <li>$Honors</li><% end_if %>
                    </ul>
                <% end_loop %>
                <% if $Skills || $Jobs %><div class="mb-5"></div><% end_if %>
            <% end_if %>
            <% if $Skills %>
                <a id="skills" class="text-decoration-none text-body"><h3 class="text-center">Skills</h3></a>
                <ul>
                    <% loop $Skills %>
                        <li>$Title<% if $Description %>$Description<% end_if %></li>
                    <% end_loop %>
                </ul>
                <% if $Jobs %><div class="mb-5"></div><% end_if %>
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
                <a id="experience" class="text-decoration-none text-body"><h3 class="text-center">Experience</h3></a>
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
