<?php

namespace App\Application\Presenter;

/**
 * PresenterBag Interface
 *
 * @package App\Application\Presenter
 */
interface PresenterBagInterface extends PresenterInterface
{
    /**
     * @param PresenterInterface $presenter
     * @return void
     */
    public function add(PresenterInterface $presenter): void;

    /**
     * @param PresenterInterface $presenter
     * @return bool
     */
    public function has(PresenterInterface $presenter): bool;

    /**
     * @param PresenterInterface $presenter
     * @return void
     */
    public function remove(PresenterInterface $presenter): void;

    /**
     * @return array<PresenterInterface>
     */
    public function getAll(): array;
}
