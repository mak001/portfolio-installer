<% if $Jobs %>
    <h2>Work Experience</h2>
    <% loop $Jobs %>
        <div class="job">
            <h3>$Title</h3>
            <h3><% if $CompanyURL %><a href="$CompanyURL">$CompanyName</a><% else %>$CompanyName<% end_if %></h3>
                <div class="side-by-side">
                    <p class="dates">$StartDate - <% if $EndDate %>$EndDate<% else %>Present<% end_if %></p>
                    <% if Location %>
                        <p class="location">$Location</p>
                    <% end_if %>
                </div>
            <% if $CompanyDescription %>
                <p class="company-description">$CompanyDescription</p>
            <% end_if %>

            $Description
        </div>
    <% end_loop %>
<% end_if %>



<% if $Schools %>
    <h2>Education</h2>
    <% loop $Schools %>
    <div class="school">
        <h3 class="degree">$Degree</h3>
        <h3 class="name">$Title</h3>
        <div class="side-by-side">
            <p class="graduated">$Graduated</p>
            <p class="location">$Location</p>
        </div>
    </div>
    <% end_loop %>
<% end_if %>

<% require themedCSS('dist/css/resume_page.css') %>
