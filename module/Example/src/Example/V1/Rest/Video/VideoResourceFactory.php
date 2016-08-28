<?php
namespace Example\V1\Rest\Video;

class VideoResourceFactory
{
    public function __invoke($services)
    {
        $videoManager = $services->get('application.manager.video-manager.video-manager');

        return new VideoResource($videoManager);
    }
}
