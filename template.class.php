<?php


class Template
{

    private $content;

    public function __construct($path)
    {
        $variable = 'Pagina';

        ob_start();

        include($path);

        $this->content = ob_get_clean();
    }

    public function getContent()
    {
        return $this->content;
    }
};
