<?php

namespace TreasureHunt\Tests\Controllers;

use Admin_treasure;
use PHPUnit\Framework\TestCase;
use App\Models\Treasure;
use Mockery;
use \Exceptions\Http\Client\BadRequestException;
use TCPDF;

/**
 * Hello world
 */
class AdminTreasureController extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /**
     * @var MockInterface
     */
    private $treasure_model;

    /**
     * @var MockInterface<Admin_treasure>
     */
    private $treasure_controller;

    /**
     * @var MockInterface<TCPDF>
     */
    private $pdf_library;

    /**
     * @var stdObject
     */
    private $sample_treasure;

    public function setUp() : void
    {
        $this->treasure_model = Mockery::mock(Treasure::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->treasure_controller = Mockery::mock(Admin_treasure::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->pdf_library = Mockery::mock(TCPDF::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->treasure_controller->Treasure = $this->treasure_model;

        $this->sample_treasure = (object)[
            'id' => 1,
            'title' => 'Hello world',
            'text' => 'asdfg',
        ];
    }

    /**
     * @test
    */
    public function view_action_displays_treasure_as_html() : void
    {
        $this->treasure_controller->shouldReceive('render');

        $this->treasure_controller->Treasure->shouldReceive('get')
            ->with($this->sample_treasure->id)
            ->andReturn($this->sample_treasure);

        $this->treasure_controller->view($this->sample_treasure->id);
    }

    /**
     * @test
    */
    public function view_action_displays_treasure_as_pdf() : void
    {
        $this->treasure_controller->shouldNotReceive('render');
        $this->pdf_library->shouldNotReceive('Output');

        $this->treasure_controller->Treasure->shouldReceive('get')
            ->with($this->sample_treasure->id)
            ->andReturn($this->sample_treasure);

        $this->setOutputCallback(function () {
        });
        $this->treasure_controller->view($this->sample_treasure->id, 'pdf');
    }

    /**
     * @test
     */
    public function view_action_raises_exception_with_unknown_format() : void
    {
        $this->expectException(BadRequestException::class);

        $this->treasure_controller->Treasure->shouldReceive('get');

        $this->treasure_controller->view($this->sample_treasure->id, 'foobar');
    }

    public function tearDown() : void
    {
        Mockery::close();
    }
}
