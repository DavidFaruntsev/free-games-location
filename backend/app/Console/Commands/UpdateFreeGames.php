<?php

namespace App\Console\Commands;

use App\Actions\FreeGame\CreateFreeGameAction;
use App\DataTransferObjects\FreeGameDTO;
use App\services\FreeToGameService;
use Illuminate\Console\Command;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateFreeGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'freegame:update-free-free-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve all free-games from FreeToGame API';

    public function __construct(
        protected FreeToGameService $freeToGameService,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     * @throws UnknownProperties
     */
    public function handle()
    {
        $allFreeGames = $this->freeToGameService->allFreeGames();
        $allFreeGames->each(function (array $freeGame) {
            $freeGameDto = new FreeGameDTO(
                game_id: $freeGame['id'],
                title: $freeGame['title'],
                thumbnail: $freeGame['thumbnail'],
                short_description: $freeGame['short_description'],
                game_url: $freeGame['game_url'],
                genre: $freeGame['genre'],
                platform: $freeGame['platform'],
                publisher: $freeGame['publisher'],
                developer: $freeGame['developer'],
                release_date: $freeGame['release_date'],
                freetogame_profile_url: $freeGame['freetogame_profile_url'],
            );

            (new CreateFreeGameAction())->execute($freeGameDto);
        });
    }
}
