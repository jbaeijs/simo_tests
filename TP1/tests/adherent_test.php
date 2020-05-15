<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class AdherentTest extends TestCase{
    
    public function testCanBeCreated(): void{
        $this->assertInstanceOf(
            Adherent::class
        );
    }
}