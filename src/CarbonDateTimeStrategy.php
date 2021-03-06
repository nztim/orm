<?php declare(strict_types=1);

namespace NZTim\ORM;

use Carbon\Carbon;
use Laminas\Hydrator\Strategy\StrategyInterface;

class CarbonDateTimeStrategy implements StrategyInterface
{
    private string $format = 'Y-m-d H:i:s';

    public function extract($value, ?object $object = null)
    {
        return ($value instanceof Carbon) ? $value->format($this->format) : $value;
    }

    public function hydrate($value, ?array $data)
    {
        return Carbon::createFromFormat($this->format, $value);
    }
}
