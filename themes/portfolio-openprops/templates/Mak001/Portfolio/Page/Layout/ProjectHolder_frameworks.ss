$ElementalArea

<% include ProjectHolderNav %>

<% if $Framework %>
    <% include ProjectList %>
<% else %>
    <div class="uses-list">
    <% if $PaginatedFrameworks %>
        <div class="uses">
        <% loop $PaginatedFrameworks %>
            <% include Uses %>
        <% end_loop %>
        </div>
        <% with $PaginatedFrameworks %>
            <% include Pagination %>
        <% end_with %>
    <% else %>
        No Frameworks
    <% end_if %>
    </div>
<% end_if %>
