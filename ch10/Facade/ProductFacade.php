<?php

namespace ch10\Facade;

class ProductFacade
{
    private array $products = [];
    public function __construct(private string $file)
    {
        $this->compile();
    }
    private function compile(): void
    {
        $lines = getProductFileLines($this->file);
        foreach ($lines as $line) {
            $id = getIDFromLine($line);
            $name = getNameFromLine($line);
            $this->products[$id] =getProductObjectFromID($id, $name);
        }
    }
    public function getProducts(): array
    {
        return $this->products;
    }

    public function getProduct(string $id): ?\Product
    {
        if (isset($this->products[$id])) {
            return $this->products[$id];
        }
        return null;
    }
}