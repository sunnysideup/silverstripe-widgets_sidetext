<?php
class SideTextWidgetAdmin extends ModelAdmin {

	public static $managed_models = array("SideTextWidgetDataObject");
	public static $url_segment = 'sidetextwidget';
	public static $menu_title = 'Side Text Widgets';
	public static $menu_icon = '/widgets_sidetext/sidetext.png';
	public $showImportForm = false;

}
