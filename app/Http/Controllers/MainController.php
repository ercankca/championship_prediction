<?php

namespace App\Http\Controllers;

use App\Repositories\MatchRepository;
use App\Repositories\StandingRepository;

use App\Services\HomeAndAwayDraw;
use App\Services\SimplePrediction;

class MainController extends Controller
{
    private $standingRepository;
    private $matchRepository;

    public function __construct(StandingRepository $standingRepository, MatchRepository $matchRepository)
    {
        $this->standingRepository = $standingRepository;
        $this->matchRepository    = $matchRepository;
        $this->handleRequirements();
    }

    public function handleRequirements()
    {

        if (!$this->standingRepository->checkStanding()) {
            $this->standingRepository->createStanding();
        }

        if (!$this->matchRepository->checkIfFixturesDrawn()) {
            $this->makeFixtures();
        }
    }

    public function getStarting()
    {

        $matches     = $this->matchRepository->getFixture()->groupBy('week_id');
       $predictions = (new SimplePrediction($this->standingRepository, $this->matchRepository))->getPrediction();

        return view(
            'show',
            [
                'standing' => $this->standingRepository->getAll(),
                'weeks' => $this->matchRepository->getWeeks(),
                'matches' => $matches,
                'predictions' => $predictions

            ]);

    }

    public function makeFixtures()
    {
        $drawService = new HomeAndAwayDraw($this->matchRepository->getTeamsId());
        $this->matchRepository->createFixture($drawService->getFixturesPlan());
    }

    public function resetAll()
    {
        $this->matchRepository->truncateMatches();
        $this->standingRepository->truncateStanding();
        $this->makeFixtures();
        return response()->json(['status' => 'ok'], 200);
    }

    public function getStandings()
    {
        return response()->json($this->standingRepository->getAll());
    }

    public function getFixtures()
    {
        $weeks   = $this->matchRepository->getWeeks();
        $fixture = $this->matchRepository->getFixture()->groupBy('week_id');
        return response()->json(['weeks' => $weeks, 'items' => $fixture]);
    }


}
