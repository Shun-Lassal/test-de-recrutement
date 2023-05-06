<?php

// Fonction donnée

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                if ($this->direction === "N") {
                    if ($command === "r") {
                        $this->direction = "E";
                    } else {
                        $this->direction = "W";
                    }
                } else if ($this->direction === "S") {
                    if ($command === "r") {
                        $this->direction = "W";
                    } else {
                        $this->direction = "E";
                    }
                } else if ($this->direction === "W") {
                    if ($command === "r") {
                        $this->direction = "N";
                    } else {
                        $this->direction = "S";
                    }
                } else {
                    if ($command === "r") {
                        $this->direction = "S";
                    } else {
                        $this->direction = "N";
                    }
                }
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    }
}

// Fonction Refactorisée
declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                // Rotate Rover
                // This is a behaviour, and it shouldn't be inside a method, it is its own method
                $this->rotateRover($command);
            } else {
                // Displace Rover
                // Same here, since its a behaviour, we shouldn't have a behaviour inside another
                $this->displaceRover($command);
            }
        }
    }

    public function rotateRover(string $command): void
    {
        // Instead of keeping the if statements, we can use the switch case here
        switch ($this->direction) {
            case 'N':
                if($command === 'r'){
                    $this->direction = "E";
                }
                else {
                    $this->direction = "W";
                }
                break;
            
            case 'S':
                if($command === 'r'){
                    $this->direction = "W";
                }
                else {
                    $this->direction = "E";
                }
                break;

            case 'E':
                if($command === 'r'){
                    $this->direction = "S";
                }
                else {
                    $this->direction = "N";
                }
                break;

            case 'W':
                if($command === 'r'){
                    $this->direction = "N";
                }
                else {
                    $this->direction = "S";
                }
                break;
        }
    }

    public function displaceRover(string $command): void
    {
        // Ternary operator, we only need 2 output values
        $displacement = ($command === 'f')? 1 : -1;

        // Switch case here as well, since its a multiple check in one
        switch ($this->direction) {
            case 'N':
                $this->y += $displacement;
                break;
            case 'S':
                $this->y -= $displacement;
                break;
            case 'E':
                $this->x += $displacement;
                break;
            case 'W':
                $this->x -= $displacement;
                break;
        }
    }
}