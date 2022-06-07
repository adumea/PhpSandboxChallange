<?php

namespace Interview\Challenge3\App;
use Interview\Challenge3\Vendor\StateRequestInterface;
use Interview\Misc\IoC;
use Interview\Challenge3\Vendor\StateRequestFactoryInterface;

class StateRequest implements StateRequestInterface, StateRequestFactoryInterface
{
    public const ADDRESS_ID_KEY = 'address_id';
    public const STATE_KEY      = 'state';

    private string $addressId;

    private string $state;

    public function createFromGET(): StateRequestInterface
    {
        $stateRepository = IoC::get(AvailableStateRepositoryInterface::class);
        $request = new static();

        if (empty($stateRepository->all())) {
            throw new \DomainException();
        }

        $request->addressId = (string)($_GET[self::ADDRESS_ID_KEY] ?? '');
        $request->state     = (string)($_GET[self::STATE_KEY] ?? '');

        return $request;
    }

    public function getAddressId(): string
    {
        return $this->addressId;
    }

    public function getState(): string
    {
        return $this->state;
    }
}