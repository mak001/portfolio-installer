<!DOCTYPE html>
<html lang="$ContentLocale">
    <head>
        <% base_tag %>
        <title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> &raquo; $SiteConfig.Title</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        $MetaTags(false)

        <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KQRQFVQ');</script>
    <!-- End Google Tag Manager -->
    </head>
    <body class="$ClassName.ShortName">
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KQRQFVQ"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <% include Header %>
        <% if $Breadcrumbs && not $isHomePage %>$Breadcrumbs</div><% end_if %>

        <main id="content">
        <% if not $isHomePage %>
            <h1>$Title</h1>
        <% end_if %>
            $Layout
        </main>

        <% include Footer %>

        $BetterNavigator
    </body>
</html>
