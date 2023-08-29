<?php

namespace probafeladat_ecom;
include 'CalculateDueDate.php';

use PHPUnit\Framework\TestCase;
use CalculateDueDate;

final class CalculateDueDateAutoTest extends TestCase
{
    // Autotesztek
    public function testClassConstructor()
    {   
       //az algoritmus vizsgálata
       $test = CalculateDueDate("2023-08-25 12:23:12", 84);
       $this->assertSame('2023-09-08 16:23:12', $test);

       $test = CalculateDueDate("2023-08-25 12:23:12", 85);
       $this->assertSame('2023-09-11 09:23:12', $test);

       $test = CalculateDueDate("2023-08-22 12:23:12", 17);
       $this->assertSame('2023-08-24 13:23:12', $test);

        //hibás bemenetekre vizsgálat: false -nak kell lennie
       $test = CalculateDueDate("2023-08-22 12:23:12", 4.5);
       $this->assertFalse;

       $test = CalculateDueDate("Ez biztos nem dátum", 5);
       $this->assertFalse;

       $test = CalculateDueDate("2023-08-25 8:23:12", 7);
       $this->assertFalse;

       $test = CalculateDueDate("2023-08-25 17:23:12", 8);
       $this->assertFalse;

}

}
