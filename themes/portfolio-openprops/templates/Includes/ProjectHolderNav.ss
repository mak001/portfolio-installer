<div class="project-nav">
    <% if $Section == 'projects' %>
        <span class="btn">Projects</span>
    <% else %>
        <a href="$Link" class="btn outline">Projects</a>
    <% end_if %>
    <% if $Section == 'languages' %>
        <span class="btn">Languages</span>
    <% else %>
        <a href="$LanguageLink" class="btn outline">Languages</a>
    <% end_if %>
    <% if $Section == 'frameworks' %>
        <span class="btn">Frameworks</span>
    <% else %>
        <a href="$FrameworkLink" class="btn outline">Frameworks</a>
    <% end_if %>
</div>
