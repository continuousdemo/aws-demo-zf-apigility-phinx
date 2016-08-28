<?php
namespace Application\Model\Entity;

use PsApiBase\Model\Entity\AbstractEntity;

/**
 * Entity Article
 */
class Article extends AbstractEntity
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
     * @return Article
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
     * @return Article
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
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;
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
     * @return Article
     */
    public function setDtUpdate($dt_update)
    {
        $this->dt_update = $dt_update;
        return $this;
    }
}