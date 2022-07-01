<!DOCTYPE html>
<html lang="$ContentLocale">
    <head>
        <% base_tag %>
        <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        $MetaTags(false)

    </head>
    <body class="$ClassName.ShortName">
        <% include Header %>
        <% if $Breadcrumbs && not $isHomePage %>$Breadcrumbs</div><% end_if %>

        <main id="content">
            $Layout
        </main>

        <% include Footer %>

        $BetterNavigator
    </body>
</html>
