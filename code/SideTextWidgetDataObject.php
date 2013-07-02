<?php

class SideTextWidgetDataObject extends DataObject {

	static $db = array(
		"Title"	=> "Text",
		"Body"	=> "HTMLText",
		"Caption" => "Varchar",
		"TextLinkExternal" => "Varchar(255)",
		"LinkText" => "Varchar(255)"
	);

	static $has_one = array(
		"Image"	=> "Image",
		"ImageLink" => "SiteTree",
		"TextLinkInternal" => "SiteTree"
	);
	public static $summary_fields = array("Title" => "Title");
	public static $singular_name = "Sidebar Section";
	public static $plural_name = "Sidebar Sections";

	//defaults
	public static $default_sort = "Title";

	function getCMSFields(){
		$fields = parent::getCMSFields();
		$fields->removeByName("Caption");
		$fields->removeByName("ImageLinkID");
		$fields->removeByName("Image");
		$fields->removeByName("TextLinkInternalID");
		$fields->addFieldToTab("Root.Main", new TextField('Title', _t('SideTextWidgetAdmin.TITLE', "Title")));
		$fields->addFieldToTab("Root.Main", new HTMLEditorField( "Body", _t('SideTextWidgetAdmin.TEXT', "Text")));
		$fields->addFieldToTab("Root.Main", new TextField( "LinkText", _t('SideTextWidgetAdmin.LINKTEXT', "Link Text")));
		$fields->addFieldToTab("Root.Main", new TextField( "TextLinkExternal", _t('SideTextWidgetAdmin.EXTERNALLINK', "External Link")));
		$fields->addFieldToTab("Root.Main", new TreeDropdownField( "TextLinkInternalID", _t('SideTextWidgetAdmin.INTERNALLINK', "Internal Link"), "SiteTree"));
		$fields->addFieldToTab("Root."._t('SideTextWidgetAdmin.IMAGE', "Image"), new TreeDropdownField( "ImageLinkID", _t('SideTextWidgetAdmin.IMAGELINK',"Image Link"), "SiteTree"));
		$fields->addFieldToTab("Root."._t('SideTextWidgetAdmin.IMAGE', "Image"), new TextField( "Caption", _t('SideTextWidgetAdmin.CAPTION', "Image Caption" )));
		$fields->addFieldToTab("Root."._t('SideTextWidgetAdmin.IMAGE', "Image"), new UploadField( "Image", _t('SideTextWidgetAdmin.IMAGEHINT', "Image (width will be set to 100pixels)" )));
		
		return $fields;
	}

}
