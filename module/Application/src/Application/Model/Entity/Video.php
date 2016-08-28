<?php
namespace Application\Model\Entity;

use PsApiBase\Model\Entity\AbstractEntity;

/**
 * Entity Video
 */
class Video extends AbstractEntity
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $title;

    /**
     * @var
     */
    protected $content;

    /**
     * @var
     */
    protected $src;

    /**
     * @var
     */
    protected $dt_update;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Video
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     * @return Video
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param mixed $src
     * @return Video
     */
    public function setSrc($src)
    {
        $this->src = $src;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDtUpdate()
    {
        return $this->dt_update;
    }

    /**
     * @param mixed $dt_update
     * @return Video
     */
    public function setDtUpdate($dt_update)
    {
        $this->dt_update = $dt_update;
        return $this;
    }
}