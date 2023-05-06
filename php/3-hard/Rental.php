<?php

declare(strict_types=1);

namespace App;

class Rental
{
    public function __construct(Movie $movie, int $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    public function getDaysRented(): int
    {
        return $this->daysRented;
    }

    public function getMovie(): Movie
    {
        return $this->movie;
    }
    public function amountFor(): float
    {
        // amountFor is the method for calculating the price of each movie by its type and days rented
        $result = 0.0;

        switch ($this->getMovie()->getPriceCode()) {
            case Movie::REGULAR:
                $result += 2.0;
                if ($this->getDaysRented() > 2) {
                    $result += ($this->getDaysRented() - 2) * 1.5;
                }
                break;
            case Movie::NEW_RELEASE:
                $result += $this->getDaysRented() * 3;
                break;
            case Movie::CHILDREN:
                $result += 1.5;
                if ($this->getDaysRented() > 3) {
                    $result += ($this->getDaysRented() - 3) * 1.5;
                }
                break;
        }

        return $result;
    }

    public function getFrequentRenterPoints(): int
    {
        //check here if the movie is a new release and if the number of days rented greater than 1
        if ($this->getMovie()->getPriceCode() == Movie::NEW_RELEASE && $this->getDaysRented() > 1) {
            return 2;
        }
        // else we return 2
        return 1;
    }

    private Movie $movie;
    private int $daysRented;
}