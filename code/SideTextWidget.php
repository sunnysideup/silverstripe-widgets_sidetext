<?php
class SideTextWidget extends Widget
{
    public static $has_one = array(
        "SideTextWidgetContent" => "SideTextWidgetDataObject"
    );

    public static $title       = "Side bar section";

    public static $cmsTitle    = "Side bar section";

    public static $description = "Add a section to your side bar";

    public function SideText()
    {
        return DataObject::get_by_id("SideTextWidgetDataObject", $this->SideTextWidgetContentID);
    }

    public function getCMSFields()
    {
        $source = DataObject::get("SideTextWidgetDataObject");
        if ($source && $source->count()) {
            $list = $source->map("ID", "Title");
            $listField = new DropdownField("SideTextWidgetContentID", _t('SideTextWidget.CHOOSE', 'Side Text Widget'), $list);
            return new FieldList($listField);
        }
    }

    public function getCmsTitle()
    {
        return _t('SideTextWidget.CMSTITLE', $this->stat('cmsTitle'));
    }
}

class SideTextWidget_CMSHack extends LeftAndMainExtension
{
    public function init()
    {
        HtmlEditorConfig::get('cms')->setOption('theme_advanced_blockformats', 'p,h1');
        HtmlEditorConfig::get('cms')->setButtonsForLine(1, 'undo, redo, separator, cut, copy, pastetext, separator, ssimage, sslink, unlink, separator, fullscreen, advcode, formatselect');
        HtmlEditorConfig::get('cms')->setButtonsForLine(2);
        HtmlEditorConfig::get('cms')->setButtonsForLine(3);
    }
}
