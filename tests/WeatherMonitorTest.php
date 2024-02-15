<?php

use PHPUnit\Framework\TestCase;

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    // public function testCorrectAverage()
    // {
    //     $service = $this->createMock(TemperatureService::class);

    //     $map = [
    //         ['12:00', 20],
    //         ['14:00', 26]
    //     ];

    //     $service->expects($this->exactly(2))
    //             ->method('getTemperature')
    //             ->will($this->returnValue($map));

    //     $weather = new WeatherMonitor($service);

    //     $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    // }

    public function testCorrectAverageMockery()
    {
        $service = Mockery::mock(TemperatureService::class);

        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $weather = new WeatherMonitor($service);

        $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }
}