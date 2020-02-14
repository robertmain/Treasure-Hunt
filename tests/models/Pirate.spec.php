<?php

namespace TreasureHunt\Tests\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Pirate;
use Mockery;
use ProbablyRational\RandomNameGenerator\All;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
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

    /**
     * @var MockInterface
     */
    private $nicknameGenerator;

    public function setUp() : void
    {
        $this->pirate_model = Mockery::mock(Pirate::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->nicknameGenerator = Mockery::mock('overload:' . All::class)
            ->makePartial()
            ->shouldAllowMockingProtectedMethods();

        $this->test_user = (object)[
            'phone' => 'mrtesting',
            'password' => 'abc',
            'nickname' => 'curious-otter',
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

    /**
     * @test
     */
    public function nickname_is_generated_on_create() : void
    {
        $uniqueNickname = $this->test_user->nickname;
        $this->nicknameGenerator->shouldReceive('getName')
            ->once()
            ->andReturn($this->test_user->nickname);

        $this->pirate_model->shouldReceive('get_by')
            ->once()
            ->with(['nickname' => $uniqueNickname])
            ->andReturn(null);

        $this->pirate_model->shouldReceive('insert')
            ->once()
            ->with(Mockery::on(function ($data) use ($uniqueNickname) {
                return array_key_exists('nickname', $data)
                    && $data['nickname'] == $uniqueNickname;
            }));

        $this->pirate_model->save([
            // User data is really not important in this test, so it was omitted
        ]);
    }

    /**
     * @test
     */
    public function nickname_is_not_generated_on_update() : void
    {
        $this->nicknameGenerator->shouldNotReceive('getName');

        $this->pirate_model->shouldReceive('update')
            ->once()
            ->with(4, Mockery::on(function ($data) {
                return !array_key_exists('nickname', $data);
            }));

        $this->pirate_model->save([
            // User data is really not important in this test, so it was omitted
        ], 4);
    }

    /**
     * @test
     */
    public function nickname_is_regenerated_if_not_unique() : void
    {
        $nonUniqueNickname = $this->test_user->nickname;
        $uniqueNickname = 'unique-nickname';

        $this->nicknameGenerator->shouldReceive('getName')
            ->twice()
            ->andReturn($nonUniqueNickname, $uniqueNickname);

        // The first call to Pirate::get_by should return the test user, the
        // second should return NULL
        $this->pirate_model->shouldReceive('get_by')
            ->andReturn($this->test_user, null);

        // Set-up expectations for a non-unique nickname
        $this->pirate_model->shouldReceive('get_by')
            ->with(['nickname' => $nonUniqueNickname]);

        // Set-up expectations for a unique nickname
        $this->pirate_model->shouldReceive('get_by')
            ->with(['nickname' => $uniqueNickname]);

        $this->pirate_model->shouldReceive('insert')
            ->once()
            ->with(Mockery::on(function ($userData) use ($uniqueNickname) {
                return $userData['nickname'] === $uniqueNickname;
            }));

        $this->pirate_model->save([
            'phone' => $this->test_user->phone,
            'password' => $this->test_user->password,
        ]);
    }

    /**
     * @test
     */
    public function nickname_can_be_changed_via_update() : void
    {
        $newNickNameValue = 'fubar1234';

        $this->pirate_model->shouldReceive('update')
            ->with(2, ['nickname' => $newNickNameValue]);

        $this->pirate_model->save([
            'nickname' => $newNickNameValue,
        ], 2);
    }

    public function tearDown() : void
    {
        Mockery::close();
    }
}
