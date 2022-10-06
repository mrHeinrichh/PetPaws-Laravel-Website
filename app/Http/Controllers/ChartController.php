<?php

namespace App\Http\Controllers;

use App\Models\Pet;


class ChartController extends Controller
{

    public function pet_illness()
    {

        $pets = Pet::with(['histories'])->get()->toArray();
        $distemper = 0;
        $rabies = 0;
        $parasites = 0;
        $parvo = 0;
        foreach ($pets as $pet) {
            foreach ($pet['histories'] as $histories) {
                if ($histories['illness'] == 'Distemper') $distemper++;
                if ($histories['illness'] == 'Rabies') $rabies++;
                if ($histories['illness'] == 'Parasites') $parasites++;
                if ($histories['illness'] == 'Parvo') $parvo++;
            }
        };
        return [$distemper, $rabies, $parasites, $parvo,];
    }
}
