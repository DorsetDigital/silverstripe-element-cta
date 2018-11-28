<?php

namespace DorsetDigital\Elements\CTA\Models;

use DNADesign\Elemental\Models\BaseElement;
use DorsetDigital\Elements\CTA\Controllers\CTAController;
use DorsetDigital\Elements\Slider\DataObjects\CTA;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;
use TractorCow\Colorpicker\Forms\ColorField;

class CTAElement extends BaseElement
{
    private static $singular_name = 'Call to action block';
    private static $plural_name = 'Call to action blocks';
    private static $description = 'Calls to action block';
    private static $table_name = 'DorsetDigital_Elements_CTAElement';
    private static $controller_class = CTAController::class;

    private static $db = [
        'TitleColour' => 'Color',
        'SubTitleColour' => 'Color'
    ];

    private static $many_many = [
        'CTAs' => CTA::class
    ];

    private static $owns = [
        'CTAs'
    ];


    public function getType()
    {
        return 'Call to action block';
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $grid = GridField::create('Slides', 'Slides', $this->CTAs(),
            GridFieldConfig_RelationEditor::create()
                ->addComponent(GridFieldOrderableRows::create()));

        $fields->addFieldsToTab('Root.Main', [
            ColorField::create('TitleColour')
                ->setTitle(_t(__CLASS__ . '.TitleColour', 'Title Colour'))
                ->setDescription(_t(__CLASS__ . '.TitleColourDesc', 'Colour of the title text in the calls-to-action')),
            ColorField::create('SubTitleColour')
                ->setTitle(_t(__CLASS__ . '.SubTitleColour', 'Subtitle Colour'))
                ->setDescription(_t(__CLASS__ . '.SubTitleColourDesc',
                    'Colour of the subtitle text in the calls-to-action')),
            $grid
        ]);

        return $fields;
    }

}