<?php

use App\Models\Character;
use Illuminate\Testing\Fluent\AssertableJson;

it('returns all characters with pagination', function () {
    $response = $this->getJson('/v1/characters');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'status',
                'species',
                'gender',
                'origin_name',
                'origin_url',
                'location_name',
                'location_url',
                'image',
            ]
        ],
        'links',
        'per_page',
    ]);
});

it('returns characters filtered by name', function () {

    $response = $this->getJson('/v1/characters?name=Rick');

    $response->assertStatus(200);
    $response->assertJsonStructure([
        'data' => [
            '*' => [
                'id',
                'name',
                'status',
                'species',
                'gender',
                'origin_name',
                'origin_url',
                'location_name',
                'location_url',
                'image',
            ]
        ],
        'links',
        'per_page',
    ]);
});

it('returns a specific character', function () {
    $character = Character::first();
    $response = $this->getJson("/v1/characters/{$character->id}");
    $response->assertStatus(200);

    $response->assertJson([
        'id' => $character->id,
        'name' => $character->name,
        'status' => $character->status,
        'species' => $character->species,
        'gender' => $character->gender,
        'origin_name' => $character->origin_name,
        'origin_url' => $character->origin_url,
        'location_name' => $character->location_name,
        'location_url' => $character->location_url,
        'image' => $character->image,
    ]);
});

it('returns 404 if character not found', function () {
    $response = $this->getJson("/v1/characters/999999");
    $response->assertStatus(404);
    $response->assertJson(['message' => 'Character not found']);
});
