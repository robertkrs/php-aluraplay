<?php

declare(strict_types=1);
namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;
use PDO;
class VideoRepository
{
    public function __construct(private PDO $pdo)
    {

    }
    public function add(Video $video): bool
    {
        $sql = 'INSERT INTO videos (url, title) VALUES (:url, :title)';
        $sqlState = $this->pdo->prepare($sql);
        $state = $sqlState->execute([
           ':url' => $video->url,
            ':title' => $video->title
        ]);
            $id = $this->pdo->lastInsertId();
            $video->setId(intval($id));

        return $state;

    }

    public function remove(int $id): bool
    {
        $sql = 'DELETE FROM videos WHERE id = :id';
        $sqlState = $this->pdo->prepare($sql);
        $state = $sqlState->execute([
            ':id' => $id
        ]);

        return $state;
    }
    public function update(Video $video): bool
    {
        $sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id';
        $sqlState = $this->pdo->prepare($sql);
        $state = $sqlState->execute([
           ':url' => $video->url,
           ':title' => $video->title,
            ':id' => $video->id,
        ]);

        return $state;

    }
    public function find(int $id)
    {
        $sqlState = $this->pdo->prepare('SELECT * FROM videos WHERE id = ?;');
        $sqlState->bindValue(1, $id, \PDO::PARAM_INT);
        $sqlState->execute();

        return $this->hydrateVideo($sqlState->fetch(\PDO::FETCH_ASSOC));
    }

    private function hydrateVideo(array $videoData): Video
    {
        $video = new Video($videoData['url'], $videoData['title']);
        $video->setId($videoData['id']);

        return $video;
    }
    public function all():array
    {
        $videoList = $this->pdo
            ->query('SELECT * FROM videos;')
            ->fetchAll(PDO::FETCH_ASSOC);
        return array_map(
            $this->hydrateVideo(...),
        $videoList);
    }

}