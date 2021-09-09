<?php 

namespace App\Traits;

trait HasSeo
{
    public function getH1()
    {
        return $this->h1??$this->title??'';
    }
    public function getMetaTitle()
    {
        return $this->meta_title??$this->getH1()??setting('seo.title')??'';
    }
    public function getMetaDescription()
    {
       return  $this->meta_description??$this->excerpt??setting('seo.description')??'';
    }
}