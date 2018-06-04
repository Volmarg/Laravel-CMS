<?
namespace App\Repositories;
use App\post;

class Articles{

    var $posts='';

    public function __construct()
    {
        $this->posts=new post();
    }

    public function all(){

        return $this->posts::all();
    }

}