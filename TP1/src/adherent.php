<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class Adherent
{
    private $firstName;
    private $lastName;
    private $birthdate;
    private $id;


    private function __construct(string $firstName, string $lastName, string $birthdate)
    {

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthdate = $birthdate;
        
        $this->ensureIsValidEmail($email);
    }

    public static function fromString(string $id): self
    {
        return new self($id);
    }

    public function __toString(): string
    {
        return $this->id;
    }

    public function constructId(string $firstName, strig $lastName, $birthdate){
        $firstName = ucfirst($firstName);
        $lastName = ucfirst($lastName);
        $temp = $firstName . " " . $lastName . " " . $birthdate;
        $temp = preg_replace('/\s\s+/', ' ', $temp);
        $temp = preg_replace( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $temp );
        $temp = preg_replace( '#&([A-za-z]{2})(?:lig);#', '\1', $temp );
        $temp = preg_replace( '#&[^;]+;#', '', $temp );
        
        $this->id = $temp;
    }
}