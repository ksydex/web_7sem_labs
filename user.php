<?php

class User
{
    public int $id;
    public ?string $name;

    /**
     * @param int $id
     * @param string|null $name
     */
    public function __construct(int $id, ?string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}

$v = new User(1, 'sdas');