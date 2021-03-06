<?php


namespace App\Validators;


class IndividualEntrepreneurInnValidator
{
    public function isValid(string $inn) : bool
    {
        if (strlen($inn) !== 12) {
            return false;
        }
        $num11 = (string)(((
                    7 * $inn[0] + 2 * $inn[1] + 4 * $inn[2] +
                    10 * $inn[3] + 3 * $inn[4] + 5 * $inn[5] +
                    9 * $inn[6] + 4 * $inn[7] + 6 * $inn[8] +
                    8 * $inn[9]
                ) % 11) % 10);

        $num12 = (string)(((
                    3 * $inn[0] + 7 * $inn[1] + 2 * $inn[2] +
                    4 * $inn[3] + 10 * $inn[4] + 3 * $inn[5] +
                    5 * $inn[6] + 9 * $inn[7] + 4 * $inn[8] +
                    6 * $inn[9] + 8 * $inn[10]
                ) % 11) % 10);

        return $inn[11] === $num12 && $inn[10] === $num11;
    }
}
