<% if MyContent %>
	<% control MyContent %>
	<div class="SideText">
		<h3>$Title</h3>
		<div class="text">$Body</div>
		<div class="image"><% if ImageLink %><a href="$ImageLink.Link"><% end_if %>$Image.SetWidth(285)<% if ImageLink %></a><% end_if %>
			<% if Caption %><p class="caption">$Caption</p><% end_if %>
		</div>
	</div>
	<% end_control %>
<% end_if %>
