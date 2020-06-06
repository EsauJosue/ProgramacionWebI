<?
class UpdateCommand implements iCommand
{
    protected $article;
    function __construct(Article $article)
    {
        $this->article = $article;

    }

    public function exec()
    {
        $this->article->update();
    }
    
}


?>