<?php
namespace Application\Manager\VideoManager;

/**
 * Class VideoManagerFactory
 */
class VideoManagerFactory
{
    /**
     * @param $services
     * @return VideoManager
     */
    function __invoke($services)
    {
        return new VideoManager($services->get('application.model.mapper.video'));
    }

}