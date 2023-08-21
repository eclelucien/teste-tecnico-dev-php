<?php

namespace Eclesiaste\TesteTecnicoDevPhp\test\helpers;

use Eclesiaste\TesteTecnicoDevPhp\helpers\Helper;
use PHPUnit\Framework\TestCase;


class HelperTest extends TestCase{

    public static function callApiMock() {
        return [
            "results" => [
                [
                    "gender" => "male",
                    "name" => [
                        "title" => "Mr",
                        "first" => "Onni",
                        "last" => "Maijala"
                    ],
                    "location" => [
                        "street" => [
                            "number" => 3094,
                            "name" => "Visiokatu"
                        ],
                        "city" => "Hartola",
                        "state" => "Lapland",
                        "country" => "Finland",
                        "postcode" => 78776,
                        "coordinates" => [
                            "latitude" => "-21.7406",
                            "longitude" => "-19.8777"
                        ],
                        "timezone" => [
                            "offset" => "+7:00",
                            "description" => "Bangkok, Hanoi, Jakarta"
                        ],
                        "email" => "onni.maijala@example.com",
                        "login" => [
                            "uuid" => "b8c4f14c-c176-4a9f-982c-e19c8692dc31",
                            "username" => "blackrabbit899",
                            "password" => "lips",
                            "salt" => "XhDxOJ81",
                            "md5" => "75b3b7bdf4436f93ebf1a3d18f47b6a0",
                            "sha1" => "81cd7c249b85e377c9f417b2bbcb136c366c3bbb",
                            "sha256" => "c8ec8a691b4a46efd0873f9c8ff1c06be77208afec796f0cdeac3ab0a4b91b2e"
                        ],
                        "dob" => [
                            "date" => "1948-09-17T09:46:20.788Z",
                            "age" => 74
                        ],
                        "registered" => [
                            "date" => "2014-08-27T17:29:09.601Z",
                            "age" => 8
                        ],
                        "phone" => "06-451-872",
                        "cell" => "041-746-33-47",
                        "id" => [
                            "name" => "HETU",
                            "value" => "NaNNA083undefined"
                        ],
                        "picture" => [
                            "large" => "https://randomuser.me/api/portraits/men/75.jpg",
                            "medium" => "https://randomuser.me/api/portraits/med/men/75.jpg",
                            "thumbnail" => "https://randomuser.me/api/portraits/thumb/men/75.jpg"
                        ],
                        "nat" => "FI"
                    ]
                ]
            ]
        ];
    }

    public function testCallApi(){
        $helperMock = $this->getMockBuilder(Helper::class)
        ->getMock();

        $expected = self::callApiMock();

        $helperMock->expects($this->once())
            ->method('callApi')
            ->with(20, 3)
            ->willReturn($expected);

        $response = $helperMock->callApi(20,3);
        
        $this->assertEquals($expected, $response);
    }

}