<?php

namespace App\Console\Commands;

use App\Models\Character;
use Illuminate\Console\Command;

class FetchRickAndMortyCharacters extends Command
{
    protected $signature = 'rickandmorty:fetch';
    protected $description = 'Fetch characters from the Rick and Morty API and store them in the database';


    public function handle()
    {
        $characterApi = new \NickBeen\RickAndMortyPhpApi\Character();
        $page = 1;

        do {
            $charactersData = $characterApi->page($page)->get();

            foreach ($charactersData->results as $characterData) {
                Character::updateOrCreate(
                    ['id' => $characterData->id],
                    [
                        'name' => $characterData->name,
                        'status' => $characterData->status,
                        'species' => $characterData->species,
                        'type' => $characterData->type,
                        'gender' => $characterData->gender,
                        'origin_name' => $characterData->origin->name ?? null,
                        'origin_url' => $characterData->origin->url ?? null,
                        'location_name' => $characterData->location->name ?? null,
                        'location_url' => $characterData->location->url ?? null,
                        'image' => $characterData->image,
                    ]
                );
            }

            $this->info("Page $page processed.");

            $page++;
        } while ($page <= $charactersData->info->pages);

        $this->info('All characters have been successfully fetched and stored.');
    }
}
