<?php

namespace App\Modules\Inventory\Infrastructure\Doctrine;

use App\Modules\Inventory\Domain\Enums\Status;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class InventoryStatusType extends Type
{
    const MYTYPE = 'inventory_type'; // modify to match your type name

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'SMALLINT';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        Status::from($value);
    }

    /**
     * @param Status $value
     * @return mixed
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value;
    }

    public function getName()
    {
        return self::MYTYPE; // modify to match your constant name
    }
}