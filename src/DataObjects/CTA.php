<?php

namespace DorsetDigital\Elements\CTA\DataObjects;

use DorsetDigital\Elements\CTA\Models\CTAElement;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\ORM\DataObject;



class CTA extends DataObject
{

    private static $singular_name = 'Call to action';
    private static $plural_name = 'Calls to action';
    private static $table_name = 'DorsetDigital_Elements_CTA';

    private static $db = [
        'Title' => 'Varchar(255)',
        'Sort' => 'Int',
        'SubTitle' => 'Varchar(255)',
        'ButtonText' => 'Varchar'
    ];

    private static $belongs_many_many = [
        'CTAElement' => CTAElement::class
    ];

    private static $has_one = [
        'CTAImage' => Image::class,
        'Link' => SiteTree::class
    ];

    private static $owns = [
        'CTAImage'
    ];

    private static $default_sort = 'Sort';

    public function getCMSFields()
    {

        $fields = parent::getCMSFields();
        $fields->removeByName('Sort');
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title')->setTitle(_t(__CLASS__ . '.Title', 'Main CTA Title')),
            TextField::create('SubTitle')->setTitle(_t(__CLASS__ . '.SubTitle', 'CTA Subtitle')),
            UploadField::create('CTAImage')->setTitle(_t(__CLASS__ . '.CTAImage', 'CTA Image'))->setAllowedFileCategories('image/supported')->setFolderName('cta-images'),
            UploadField::create('CTAImage')->setTitle(_t(__CLASS__ . '.CTAImage', 'CTA Image'))->setAllowedFileCategories('image/supported')->setFolderName('cta-images'),
            TreeDropdownField::create('LinkID', _t(__CLASS__ . '.Link', 'Link'), SiteTree::class),
            TextField::create('ButtonText', _t(__CLASS__ . '.ButtonText', 'Button Text'))->setDescription(_t(__CLASS__.'ButtonTextDescription', 'If added, the CTA will show a button to act as an additional link'))
        ]);

        return $fields;
    }

}
