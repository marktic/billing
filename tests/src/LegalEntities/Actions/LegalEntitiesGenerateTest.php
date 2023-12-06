<?php

namespace Marktic\Billing\Tests\LegalEntities\Actions;

use Marktic\Billing\LegalEntities\Actions\LegalEntitiesGenerate;
use PHPUnit\Framework\TestCase;

class LegalEntitiesGenerateTest extends TestCase
{
    public function test_createFromData()
    {
        $action = LegalEntitiesGenerate::for(['test']);
        self::assertInstanceOf(LegalEntitiesGenerate::class, $action);
    }
}
