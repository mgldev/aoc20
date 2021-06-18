<?php

namespace AOC\D7\P1;

/**
 * Class BagBuilder
 *
 * @package AOC\D7\P1
 */
class BagBuilder
{
    /**
     * @param string $filename
     *
     * @return BagCollection
     */
    public function build(string $filename): BagCollection
    {
        $lines = file($filename);
        $bagCollection = new BagCollection();

        foreach ($lines as $index => $line) {
            $parts = explode('contain', $line);
            $bagColour = trim(str_replace(['bags', 'bag'], '', $parts[0]));
            $bag = $bagCollection->getBag($bagColour);

            if (!$bag) {
                $bag = new Bag($bagColour);
                $bagCollection->addBag($bag);
            }

            $specificationElements = explode(',', $parts[1]);
            $specificationElements = $this->buildSpecificationData($specificationElements);

            foreach ($specificationElements as $element) {
                $childBag = $bagCollection->getBag($element['colour']);
                if (!$childBag) {
                    $childBag = new Bag($element['colour']);
                    $bagCollection->addBag($childBag);
                }

                $specification = new BagStorageSpecification($childBag, $element['quantity']);
                $bag->addSpecification($specification);
            }
        }

        return $bagCollection;
    }

    /**
     * @param array $childBags
     *
     * @return array
     */
    private function buildSpecificationData(array $childBags): array
    {
        if (trim($childBags[0]) === 'no other bags.') {
            return [];
        }

        return array_map(function (string $childBag) {
            $childBag = trim(str_replace('.', '', $childBag));
            $matches = [];
            preg_match('/(?<quantity>\d+)(?<colour>.*)$/', $childBag, $matches);
            $quantity = (int) $matches['quantity'];
            $colour = trim(str_replace(['bags', 'bag'], '', $matches['colour']));

            return [
                'quantity' => $quantity,
                'colour' => $colour
            ];
        }, $childBags);
    }
}
