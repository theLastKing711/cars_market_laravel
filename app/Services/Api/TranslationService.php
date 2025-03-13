<?php

namespace App\Services\Api;

use Datlechin\GoogleTranslate\Facades\GoogleTranslate;

class TranslationService
{
    public function translateFromArabicToEnglish(string $text): string
    {
        $result = GoogleTranslate::source('ar')
            ->target('en')
            ->translate($text);

        return $result->getTranslatedText();

    }

    public function translateFromEnglishToArabic(string $text): string
    {
        $result = GoogleTranslate::source('en')
            ->target('ar')
            ->translate($text);

        return $result->getTranslatedText();

    }
}
