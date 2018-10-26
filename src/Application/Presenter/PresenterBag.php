<?php

namespace App\Application\Presenter;

/**
 * Presenter Bag
 *
 * @package App\Application\Presenter
 */
class PresenterBag implements PresenterBagInterface
{
    /**
     * @var array
     */
    private $elements;

    /**
     * Presenter Bag constructor
     */
    public function __construct()
    {
        $this->elements = [];
    }

    /**
     * {@inheritdoc}
     */
    public function add(PresenterInterface $presenter): void
    {
        if ($this->has($presenter)) {
            return;
        }

        $this->elements[] = $presenter;
    }

    /**
     * {@inheritdoc}
     */
    public function has(PresenterInterface $presenter): bool
    {
        return in_array($presenter, $this->elements);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(PresenterInterface $presenter): void
    {
        if (!$this->has($presenter)) {
            return;
        }

        $this->elements = array_diff($this->elements, [$presenter]);
    }

    /**
     * {@inheritdoc}
     */
    public function getAll(): array
    {
        return $this->elements;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(): array
    {
        $return = [];

        /** @var PresenterInterface $presenter */
        foreach ($this->elements as $presenter) {
            $return[] = $presenter->toArray();
        }

        return $return;
    }
}
