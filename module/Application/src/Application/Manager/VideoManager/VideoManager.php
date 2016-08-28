<?php
namespace Application\Manager\VideoManager;

use Application\Model\Mapper\VideoMapper;

/**
 * Class VideoManager
 */
class VideoManager
{
    /**
     * @var
     */
    protected $videoMapper;

    /**
     * @param VideoMapper $videoMapper
     */
    public function __construct(VideoMapper $videoMapper)
    {
        $this->videoMapper = $videoMapper;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        if (!is_array($data)) {
            return false;
        }

        return $this->videoMapper->save($data);
    }

    /**
     * @param $id
     * @return null
     */
    public function fetch($id)
    {
        return $this->videoMapper->find($id);
    }

    /**
     * @return mixed
     */
    public function getVideoMapper()
    {
        return $this->videoMapper;
    }

    /**
     * @param mixed $videoMapper
     * @return VideoManager
     */
    public function setVideoMapper($videoMapper)
    {
        $this->videoMapper = $videoMapper;
        return $this;
    }
}