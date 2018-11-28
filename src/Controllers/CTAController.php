<?php

namespace DorsetDigital\Elements\CTA\Controllers;

use DNADesign\Elemental\Controllers\ElementController;
use SilverStripe\View\Requirements;

class CTAController extends ElementController
{
    public function init()
    {
        parent::init();
        Requirements::css('dorsetdigital/silverstripe-element-cta:client/dist/cta.css');
    }
}