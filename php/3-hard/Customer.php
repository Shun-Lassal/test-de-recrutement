<?php

declare(strict_types=1);

namespace App;

class Customer
{
    public function __construct(String $name)
    {
        $this->name = $name;
    }

    public function addRental(Rental $rental)
    {
        return $this->rentals[] = $rental;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // The Statement method had too many checks inside, we can split code by making methods
    // to simplify the price and the renter points of each movie rented
    public function statement(): string {
        $totalAmount = 0.0;
        $frequentRenterPoints = 0;
        $result = "Rental Record for " . $this->getName() . "\n";
 
        foreach ($this->rentals as $rental) {
            //new behaviour in the rental Class to calculate the price of the movie depending on the movie type and the duration
            $thisAmount = $rental->amountFor();
            //also new behaviour in the rental Class to calculate the number of FrequentRenterPoints depending on the movie type and the duration
            $frequentRenterPoints += $rental->getFrequentRenterPoints();

            // We show the price of each movie rented
            $result .= "\t" . $rental->getMovie()->getTitle() . "\t" . number_format($thisAmount, 1) . "\n";
            $totalAmount += $thisAmount;
        }
        // Here is the total amount of all the movies rented with the amount of frequent renter points earned
        $result .= "Amount owed is " . number_format($totalAmount, 1)  . "\n";
        $result .= "You earned " . $frequentRenterPoints . " frequent renter points\n";

        return $result;
    }

    private string $name;
    private array $rentals = [];
}