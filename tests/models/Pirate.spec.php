<?php

namespace TreasureHunt\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Pirate;
use Mockery;

class PirateModel extends TestCase
{
    use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;

    /**
     * @var MockInterface
     */
    private $pirate_model;

    /**
     * @var Object
     */
    private $test_user;

    public function setUp() : void
    {
        $this->pirate_model = Mockery::mock(Pirate::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->test_user = (object)[
            'phone' => 'mrtesting',
            'password' => 'abc',
        ];
    }

    /**
     * @test
    */
    public function is_granted_login_with_a_valid_phone_number_and_password() : void
    {
        $this->pirate_model->shouldReceive('get_by')
            ->with(['phone' => $this->test_user->phone])
            ->andReturn((object)[
                'phone' => $this->test_user->phone,
                'password' => hash('sha512', $this->test_user->password)
            ]);

        $valid = $this->pirate_model->password_verify(
            $this->test_user->phone,
            $this->test_user->password
        );

        $this->assertTrue($valid);
    }

    /**
     * @test
    */
    public function is_denied_login_if_phone_is_incorrect_or_does_not_exist() : void
    {
        $this->pirate_model->shouldReceive('get_by')
            ->with(['phone' => 'dontexist'])
            ->andReturn(null);

        $valid = $this->pirate_model->password_verify('dontexist', 'abc');

        $this->assertFalse($valid);
    }

    /**
     * @test
    */
    public function is_denied_login_if_password_is_incorrect() : void
    {
        $this->pirate_model->shouldReceive('get_by')
            ->with(['phone' => 'mrtesting'])
            ->andReturn($this->test_user);

        $valid = $this->pirate_model->password_verify('mrtesting', 'def');

        $this->assertFalse($valid);
    }


    /**
     * @test
    */
    public function password_can_be_changed() : void
    {
        $this->pirate_model->shouldReceive('password_hash')
            ->with('hello')
            ->andReturn('secure_hash');

        $this->pirate_model->shouldReceive('update')
            ->with(6, Mockery::subset(['password' => 'secure_hash']))
            ->andReturn(true);

        $this->pirate_model->save(['password' => 'hello'], 6);
    }

    /**
     * @test
     */
    public function password_remains_unchanged_if_not_supplied() : void
    {
        $this->pirate_model->shouldNotreceive('password_hash');

        $this->pirate_model->shouldReceive('update')
                         ->once()
                         ->with(6, Mockery::on(function ($data) {
                            return !array_key_exists('password', $data);
                         }));

        $this->pirate_model->save(['firstname' => 'bob'], 6);
    }

    public function tearDown() : void
    {
        Mockery::close();
    }
}
