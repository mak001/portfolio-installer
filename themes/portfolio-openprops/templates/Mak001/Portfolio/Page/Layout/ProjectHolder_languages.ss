$ElementalArea

<% include ProjectHolderNav %>

<% if $Language %>
    <% include ProjectList %>
<% else %>
    <div class="uses-list">
    <% if $PaginatedLanguages %>
        <div class="uses">
        <% loop $PaginatedLanguages %>
            <% include Uses %>
        <% end_loop %>
        </div>
        <% with $PaginatedLanguages %>
            <% include Pagination %>
        <% end_with %>
    <% else %>
        No Languages
    <% end_if %>
    </div>
<% end_if %>
