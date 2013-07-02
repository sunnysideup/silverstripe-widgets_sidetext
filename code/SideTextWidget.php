<?php
class SideTextWidget extends Widget {

	static $has_one = array(
		"SideTextWidgetContent" => "SideTextWidgetDataObject"
	);
        
	static $title       = "Side bar section";
	static $cmsTitle    = "Side bar section";
	static $description = "Add a section to your side bar";

	function SideText(){
		return DataObject::get_by_id("SideTextWidgetDataObject", $this->SideTextWidgetContentID);
	}

	function getCMSFields(){
		$source = DataObject::get("SideTextWidgetDataObject");
		if($source) {
			$list = $source->map("ID", "Title");
                        $listField = new DropdownField( "SideTextWidgetContentID", _t('SideTextWidget.CHOOSE','Side Text Widget'), $list);
                        return new FieldList($listField);
                }
         }

	function getCmsTitle() {
		return _t('SideTextWidget.CMSTITLE', $this->stat('SomeVar'));
	}
}

class SideTextWidget_CMSHack extends LeftAndMainExtension {
	function init(){
		HtmlEditorConfig::get('cms')->setOption('theme_advanced_blockformats','p,h1');
		HtmlEditorConfig::get('cms')->setButtonsForLine(1,'undo, redo, separator, cut, copy, pastetext, separator, ssimage, sslink, unlink, separator, fullscreen, advcode, formatselect');
		HtmlEditorConfig::get('cms')->setButtonsForLine(2);
		HtmlEditorConfig::get('cms')->setButtonsForLine(3);
	}
}
