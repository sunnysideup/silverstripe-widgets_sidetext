<% if $SideText %>
<% loop $SideText %>
<div class="widget SideText">
    <h3>$Title</h3>
    <% if $Body %>
    $Body
    <% end_if %>
    <% if $LinkText %>
    <a class="link button darkgreen" href="<% if TextLinkExternal %>$TextLinkExternal<% else_if $TextLinkInternal %>$TextLinkInternal.Link<% end_if %>" <% if $Link %>target="_blank"<% end_if %>><span class="sprite arrow white"></span>$LinkText</a>
    <% end_if %>
    <% if $Image %>
    <div class="image"><% $if ImageLink %><a href="$ImageLink.Link"><% end_if %>$Image.SetWidth(285)<% if $ImageLink %></a><% end_if %>
        <% if Caption %><p class="caption">$Caption</p><% end_if %>
    </div>
    <% end_if %>
</div>
<% end_loop %>
<% end_if %>
