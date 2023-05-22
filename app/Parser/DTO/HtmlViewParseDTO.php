<?php

namespace App\Parser\DTO;

class HtmlViewParseDTO
{

    /**
     * @param string $header
     * @param array $tags
     */
    public function __construct(private string $header, private array $tags)
    {
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }


}