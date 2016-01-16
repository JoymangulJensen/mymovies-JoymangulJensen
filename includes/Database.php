<?php
// Define configuration
define("DB_HOST", "localhost");
define("DB_USER", "mymovies_user");
define("DB_PASS", "secret");
define("DB_NAME", "mymovies");


class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $dbh;
    private $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );

        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }


    public function getAllMovies()
    {
        $res = $this->dbh->prepare('SELECT * FROM movie');
        $res->execute();
        return $res;
    }

    public function gerMovie($id)
    {
        $res = $this->dbh->prepare('SELECT * FROM movie WHERE mov_id = :id');
        $res->bindValue(':id',$id,PDO::PARAM_INT);
        $res->execute();
        return $res;
    }

    /**
     * @param $title
     * @param $director
     * @param $description_short
     * @param $description_long
     * @param $year
     * @param $image
     */
    public function addMovie($title, $director, $description_short, $description_long, $year, $image)
    {
        $res = $this->dbh->prepare('INSERT INTO `movie`(
                                                `mov_title`,
                                                `mov_description_short`,
                                                `mov_description_long`,
                                                `mov_director`,
                                                `mov_year`,
                                                `mov_image`)
                                    VALUES (:title,:description_short,:description_long,:director,:year,:image)');
        $res->bindValue(':title',$title,PDO::PARAM_STR);
        $res->bindValue(':director',$director,PDO::PARAM_STR);
        $res->bindValue(':description_short',$description_short,PDO::PARAM_STR);
        $res->bindValue(':description_long',$description_long,PDO::PARAM_STR);
        $res->bindValue(':year',$year,PDO::PARAM_INT);
        $res->bindValue(':image',$image,PDO::PARAM_STR);

        $res->execute();

    }

    public function editMovie($id, $title,$director,$description_short,$description_long,$year1,$image)
    {
        $res = $this->dbh->prepare('UPDATE movie SET mov_title = :title,
                                                    mov_director = :director,
                                                    mov_description_short = :description_short,
                                                    mov_description_long= :description_long,
                                                    mov_image = :image,
                                                    mov_year = :year1
                                    WHERE mov_id= :id');


        $res->bindValue(':id',$id,PDO::PARAM_INT);
        $res->bindValue(':title',$title,PDO::PARAM_STR);
        $res->bindValue(':director',$director,PDO::PARAM_STR);
        $res->bindValue(':description_short',$description_short,PDO::PARAM_STR);
        $res->bindValue(':description_long',$description_long,PDO::PARAM_STR);
        $res->bindValue(':year1',$year1,PDO::PARAM_INT);
        $res->bindValue(':image',$image,PDO::PARAM_STR);

        $res->execute();
    }

    public function delMovie($id)
    {
        $res =$this->dbh->prepare('DELETE from movie where mov_id=:id');
        $res->bindValue(':id',$id,PDO::PARAM_INT);

        $res->execute();
    }
}
?>