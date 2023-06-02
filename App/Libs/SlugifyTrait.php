<?php

trait SlugifyTrait
{
    private function slugify(string $text)
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    }
}