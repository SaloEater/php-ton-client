<?php

declare(strict_types=1);

namespace Extraton\Tests\Unit\TonClient;

use Extraton\TonClient\Boc;
use Extraton\TonClient\Entity\Boc\ResultOfGetBlockchainConfig;
use Extraton\TonClient\Entity\Boc\ResultOfGetBocHash;
use Extraton\TonClient\Entity\Boc\ResultOfGetCodeFromTvc;
use Extraton\TonClient\Entity\Boc\ResultOfParse;
use Extraton\TonClient\Handler\Response;

use function microtime;
use function random_int;
use function uniqid;

/**
 * Unit tests for Boc module
 *
 * @coversDefaultClass \Extraton\TonClient\Boc
 */
class BocTest extends AbstractModuleTest
{
    private Boc $boc;

    public function setUp(): void
    {
        parent::setUp();
        $this->boc = new Boc($this->mockTonClient);
    }

    /**
     * @covers ::parseMessage
     */
    public function testParseMessageWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.parse_message',
                [
                    'boc' => $boc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfParse($response);

        self::assertEquals($expected, $this->boc->parseMessage($boc));
    }

    /**
     * @covers ::parseTransaction
     */
    public function testParseTransactionWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.parse_transaction',
                [
                    'boc' => $boc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfParse($response);

        self::assertEquals($expected, $this->boc->parseTransaction($boc));
    }

    /**
     * @covers ::parseAccount
     */
    public function testParseAccountWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.parse_account',
                [
                    'boc' => $boc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfParse($response);

        self::assertEquals($expected, $this->boc->parseAccount($boc));
    }

    /**
     * @covers ::parseBlock
     */
    public function testParseBlockWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.parse_block',
                [
                    'boc' => $boc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfParse($response);

        self::assertEquals($expected, $this->boc->parseBlock($boc));
    }

    /**
     * @covers ::getBlockchainConfig
     */
    public function testGetBlockchainConfigWithSuccessResult(): void
    {
        $blockBoc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.get_blockchain_config',
                [
                    'block_boc' => $blockBoc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfGetBlockchainConfig($response);

        self::assertEquals($expected, $this->boc->getBlockchainConfig($blockBoc));
    }

    /**
     * @covers ::parseShardstate
     */
    public function testParseShardstateWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $id = uniqid(microtime(), true);
        $workchainId = random_int(0, 1000);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.parse_shardstate',
                [
                    'boc'          => $boc,
                    'id'           => $id,
                    'workchain_id' => $workchainId,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfParse($response);

        self::assertEquals($expected, $this->boc->parseShardstate($boc, $id, $workchainId));
    }

    /**
     * @covers ::getBocHash
     */
    public function testGetBocHashWithSuccessResult(): void
    {
        $boc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.get_boc_hash',
                [
                    'boc' => $boc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfGetBocHash($response);

        self::assertEquals($expected, $this->boc->getBocHash($boc));
    }

    /**
     * @covers ::getCodeFromTvc
     */
    public function testGetCodeFromTvcSuccessResult(): void
    {
        $tvc = uniqid(microtime(), true);
        $response = new Response(
            [
                uniqid(microtime(), true)
            ]
        );

        $this->mockPromise->expects(self::once())
            ->method('wait')
            ->with()
            ->willReturn($response);

        $this->mockTonClient->expects(self::once())
            ->method('request')
            ->with(
                'boc.get_code_from_tvc',
                [
                    'tvc' => $tvc,
                ]
            )
            ->willReturn($this->mockPromise);

        $expected = new ResultOfGetCodeFromTvc($response);

        self::assertEquals($expected, $this->boc->getCodeFromTvc($tvc));
    }
}
