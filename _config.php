<?php

if(strpos($_REQUEST["url"], 'admin/sidetextwidget') !== false) {
	Object::add_extension("LeftAndMain", "SideTextWidget_CMSHack");
}

