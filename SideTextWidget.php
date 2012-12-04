<?php
class SideTextWidget extends Widget {

	static $has_one = array(
		"Content" => "SideTextWidget_DataObject"
	);

	static $title = "Side bar section";

	static $cmsTitle	= "Side bar section";

	static $description	= "Add a section to your side bar";

	function MyContent(){
		return DataObject::get_by_id("SideTextWidget_DataObject", $this->ContentID);
	}

	function getCMSFields(){
		$source = DataObject::get("SideTextWidget_DataObject");
		if($source) {
			$list = $source->toDropdownMap("ID", "Title", "--- SELECT SIDE TEXT WIDGET ---");
			$listField = new DropdownField( "ContentID", "Side Text Widget <a href=\"/admin/sidetextwidget/\" target=\"_blank\">edit options here</a>", $list);
		}
		else {
			$listField = new DropdownField( "ContentID", "Side Text Widget <a href=\"/admin/sidetextwidget/\" target=\"_blank\">edit options here</a>", array());
		}
		return new FieldSet(
			$listField
		);
	}
}

class SideTextWidget_DataObject extends DataObject{

	static $db = array(
		"Title"	=> "Varchar(256)",
		"Body"	=> "HTMLText",
		"Caption"	=> "Varchar"
	);

	static $has_one = array(
		"Image"	=> "Image",
		"ImageLink"	=> "SiteTree"
	);
	public static $summary_fields = array("Title" => "Title"); //note no => for relational fields

	public static $singular_name = "Sidebar Section";

	public static $plural_name = "Sidebar Sections";

	//defaults
	public static $default_sort = "Title";

	function SideText(){
		if( strcmp( $this->Title(), "" ) == 0 && strcmp( $this->Text(), "" ) == 0 ) {
			return false;
		}
		else {
			return true;
		}
	}

	function getCMSFields(){
		HtmlEditorConfig::get('sidetextwidget')->setOption('priority',2);
		HtmlEditorConfig::set_active("sidetextwidget");
		$fields = parent::getCMSFields();
		$fields->removeByName("Caption");
		$fields->removeByName("ImageLinkID");
		$fields->removeByName("Image");
		$fields->addFieldsToTab(
			"Root.Main",
			new TextField( "Title", "Title" )

		);
		$fields->addFieldToTab("Root.Images",new TreeDropdownField( "ImageLinkID", "Image Link", "SiteTree"));
		$fields->addFieldToTab("Root.Images",new TextField( "Caption", "Image Caption" ));
		$fields->addFieldToTab("Root.Images",new ImageField( "Image", "Image (width will be set to 100pixels)" ));
		$fields->addFieldToTab("Root.Main",new HTMLEditorField( "Body", "Text", 2, 2));
		return $fields;
	}




}


class SideTextWidget_ModelAdmin extends ModelAdmin {

	public static $managed_models = array("SideTextWidget_DataObject");

	public static $url_segment = 'sidetextwidget';

	public static $menu_title = 'Side Text Widgets';

	public $showImportForm = false;

	function init(){
		parent::init();
	}

}

class SideTextWidget_CMSHack extends LeftAndMainDecorator {
	function init(){
		HtmlEditorConfig::get('cms')->setOption('theme_advanced_blockformats','p,h1');
		HtmlEditorConfig::get('cms')->setButtonsForLine(1,'undo, redo, separator, cut, copy, pastetext, separator, ssimage, sslink, unlink, separator, fullscreen, advcode, formatselect');
		HtmlEditorConfig::get('cms')->setButtonsForLine(2);
		HtmlEditorConfig::get('cms')->setButtonsForLine(3);
	}
}

