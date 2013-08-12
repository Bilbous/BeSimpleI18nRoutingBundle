<?php

namespace BeSimple\I18nRoutingBundle\Routing\Translator;

use Symfony\Component\Translation\TranslatorInterface;

/**
 * Using a TranslatorInterface for translating route parameters.
 *
 * Selects the domain as concatenation of "route"_"attribute".
 *
 * @author Benjamin Eberlei <kontakt@beberlei.de>
 */
class TranslationTranslator implements AttributeTranslatorInterface
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     *
     */
    private $domain;

    public function __construct(TranslatorInterface $translator, $domain)
    {
        $this->translator = $translator;
        $this->domain = $domain;
    }

    public function reverseTranslate($route, $locale, $attribute, $originalValue)
    {
        return $this->translator->trans($originalValue, array(), $this->domain, $locale);
    }

    public function translate($route, $locale, $attribute, $localizedValue)
    {
        return $this->translator->trans($localizedValue, array(), $this->domain, $locale);
    }
}
