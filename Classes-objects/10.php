<?php

class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    public function run(): void
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addVideo();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory($this->store->getAvailableVideos());
                    break;
                default:
                    echo "Sorry, I don't understand you..";
            }
        }
    }

    private function addVideo(): void
    {
        $movieTitle = readline('Enter movie title: ');
        $this->store->add(new Video($movieTitle));
    }

    private function rentVideo(): void
    {
        /** @var  Video[] $availableVideos */
        $availableVideos = $this->store->getAvailableVideos();

        $this->listInventory($availableVideos);

        $selectedNumber = (int)readline('Enter movie number: ');

        $selectedVideo = $availableVideos[$selectedNumber];

        $this->store->rentVideo($selectedVideo);
    }

    private function returnVideo(): void
    {
        $this->listInventory($this->store->getRentedVideos());
        $inventory = $this->store->getRentedVideos();

        if (empty($inventory)) return;

        $selectedNumber = (int)readline('Enter movie number: ');

        /** @var  Video $selectedVideo */
        $selectedVideo = $inventory[$selectedNumber];

        $this->store->returnVideo($selectedVideo);

        $rating = (float)readline('Enter rating: ');

        $selectedVideo->receiveRating($rating);
    }

    private function listInventory(array $videos): void
    {
        foreach ($videos as $number => $video) {
            /** @var Video $video */
            echo "[$number] - {$video->getTitle()} / {$video->averageRating()}" . PHP_EOL;
        }
    }
}

class VideoStore
{
    private array $availableVideos = [];
    private array $rentedVideos = [];

    public function add(Video $video): void
    {
        $this->availableVideos[] = $video;
    }

    public function rentVideo(Video $video): void
    {
        if (($key = array_search($video, $this->availableVideos)) !== false) {
            unset($this->availableVideos[$key]);
            $this->rentedVideos[] = $video;
        }

    }

    public function returnVideo(Video $video): void
    {
        if (($key = array_search($video, $this->rentedVideos)) !== false) {
            unset($this->rentedVideos[$key]);
            $this->availableVideos[] = $video;
        }

    }


    public function getAvailableVideos(): array
    {
        return $this->availableVideos;
    }

    public function getRentedVideos(): array
    {
        return $this->rentedVideos;
    }
}

class Video
{
    private string $title;
    private array $ratings = [];

    public function __construct(string $title)
    {
        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function receiveRating(float $rating)
    {
        $this->ratings[] = $rating;
    }

    public function averageRating(): float
    {
        if (count($this->ratings) === 0) return 0;
        return array_sum($this->ratings) / count($this->ratings);
    }
}


$app = new Application();
$app->run();
