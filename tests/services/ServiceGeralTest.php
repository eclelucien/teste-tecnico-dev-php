<?php

namespace Eclesiaste\TesteTecnicoDevPhp\Tests\services;

use Eclesiaste\TesteTecnicoDevPhp\helpers\Helper;
use Eclesiaste\TesteTecnicoDevPhp\services\ServiceGeral;
use Eclesiaste\TesteTecnicoDevPhp\Tests\helpers\HelperTest;
use PDO;
use PHPUnit\Framework\TestCase;


class ServiceGeralTest extends TestCase{

    
    // public function testGetClients(){
    //     $serviceGeralMock = $this->getMockBuilder(ServiceGeral::class)
    //     ->getMock();
    //     $helperMock = $this->getMockBuilder(Helper::class)
    //     ->getMock();


    //     $helperMock->expects($this->once())
    //         ->method('callApi')
    //         ->with(20, 3)
    //         ->willReturn(HelperTest::callApiMock());

    //     $serviceGeralMock->expects($this->once())
    //         ->method('clientExistsByEmail')
    //         ->with("eclesiastelucien@gmail.com")
    //         ->willReturn(true);

    //     $serviceGeralMock->expects($this->once())
    //         ->method('getClients')
    //         ->with()
    //         ->willReturn(true);

    //     $response = $serviceGeralMock->getClients();

    //     $this->assertEquals($expected, $response);

    // }


    public function testClientExistsByEmail(){

        $email = 'test@example.com';
        $rowCount = 1;

        $mockPDO = $this->createMock(PDO::class);


        $serviceGeralMock = $this->getMockBuilder(ServiceGeral::class)
        ->getMock();

        $mockStmt = $this->createMock(PDOStatement::class);
        
        $mockPDO->expects($this->once())
            ->method('prepare')
            ->with("SELECT COUNT(*) FROM clientes WHERE email = :email")
            ->willReturn($mockStmt);

        $mockStmt->expects($this->once())
            ->method('bindParam')
            ->with(':email', $email, PDO::PARAM_STR);

        $mockStmt->expects($this->once())
            ->method('execute');

        $mockStmt->expects($this->once())
            ->method('fetchColumn')
            ->willReturn($rowCount);

        $result = $serviceGeralMock->clientExistsByEmail($email);

        $this->assertTrue($result);
    }
}