<?php

declare(strict_types=1);

namespace Extraton\TonClient;

use Extraton\TonClient\Entity\Net\ParamsOfQueryCollection;
use Extraton\TonClient\Entity\Net\QueryInterface;
use Extraton\TonClient\Entity\Net\ResultOfQueryCollection;
use Extraton\TonClient\Entity\Net\ResultOfSubscribeCollection;
use Extraton\TonClient\Entity\Net\ResultOfUnsubscribe;
use Extraton\TonClient\Entity\Net\ResultOfWaitForCollection;

/**
 * Net module
 */
class Net
{
    private TonClient $tonClient;

    public function __construct(TonClient $tonClient)
    {
        $this->tonClient = $tonClient;
    }

    /**
     * @param QueryInterface|ParamsOfQueryCollection $query
     * @return ResultOfQueryCollection
     */
    public function queryCollection(QueryInterface $query): ResultOfQueryCollection
    {
        return new ResultOfQueryCollection(
            $this->tonClient->request(
                'net.query_collection',
                [
                    'collection' => $query->getCollection(),
                    'result'     => $query->getResult(),
                    'filter'     => $query->getFilters(),
                    'orderBy'    => $query->getOrderBy(),
                    'limit'      => $query->getLimit(),
                ]
            )->wait()
        );
    }

    public function waitForCollection(QueryInterface $query): ResultOfWaitForCollection
    {
        return new ResultOfWaitForCollection(
            $this->tonClient->request(
                'net.wait_for_collection',
                [
                    'collection' => $query->getCollection(),
                    'result'     => $query->getResult(),
                    'filter'     => $query->getFilters(),
                    'timeout'    => $query->getTimeout(),
                ]
            )->wait()
        );
    }

    public function subscribeCollection(QueryInterface $query): ResultOfSubscribeCollection
    {
        return new ResultOfSubscribeCollection(
            $this->tonClient->request(
                'net.subscribe_collection',
                [
                    'collection' => $query->getCollection(),
                    'result'     => $query->getResult(),
                    'filter'     => $query->getFilters(),
                ]
            )->wait(),
            $this
        );
    }

    public function unsubscribe(int $handle): ResultOfUnsubscribe
    {
        return new ResultOfUnsubscribe(
            $this->tonClient->request(
                'net.unsubscribe',
                [
                    'handle' => $handle,
                ]
            )->wait()
        );
    }
}
