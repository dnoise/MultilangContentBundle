<?php

namespace Symfony\Cmf\Bundle\MultilangContentBundle\Document;

use Doctrine\ODM\PHPCR\Mapping\Annotations as PHPCRODM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Cmf\Component\Routing\RouteAwareInterface;
use Symfony\Cmf\Bundle\ContentBundle\Document\StaticContent;

/**
 * @PHPCRODM\Document(translator="child",referenceable=true)
 */
class MultilangStaticContent extends StaticContent
{
    /**
     * @PHPCRODM\Locale
     */
    protected $locale;

    /**
     * @Assert\NotBlank
     * @PHPCRODM\String(translated=true)
     */
    protected $title;

    /**
     * @PHPCRODM\String(translated=true)
     */
    protected $body;

    public function getLocale()
    {
        return $this->locale;
    }
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
}
