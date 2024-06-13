<?php

namespace App\TiwgExtension;

use Symfony\Component\Validator\Constraints\Length;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MyCustomExtension extends AbstractExtension
{
    public function getFilt()
    {
        return [
            new TwigFilter('defultImage', [$this, 'defultImage'])
        ];
    }


    public function defaultImage(string $path): string
    {
        if(strlen(trim($path)) == 0) {
            return 'as.jpg';
        }

        return $path;

    }
}