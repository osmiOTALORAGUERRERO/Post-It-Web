<?php
  require_once '../database/database.php';
  /**
   *
   */
  class Note
  {
    private $id;
    private $title;
    private $content;
    private $db;
    function __construct($id=null, $title=null, $content=null)
    {
      $this->id = $id;
      $this->title = $title;
      $this->content = $content;
      $this->db = new DB();
    }
    public function getId()
    {
      return $this->id;
    }
    public function setId($id)
    {
      $this->id = $id;
    }
    public function getTitle()
    {
      return $this->title;
    }
    public function setTitle($title)
    {
      $this->title = $title;
    }
    public function getContent()
    {
      return $this->content;
    }
    public function setContent($content)
    {
      $this->content = $content;
    }
    public function save(){
      try {
        $statement = $this->db -> connect() -> prepare('UPDATE Notes SET title = :title, content = :content
          WHERE idNote = :idNote');
        $statement -> execute(array(
          ':title' => $this->title,
          ':content' => $this->content,
          ':idNote' => $this->id
        ));
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }
    public function delete(){
      try {
        $statement = $this->db -> connect() -> prepare('DELETE FROM Notes WHERE idNote = :idNote');
        $statement -> execute(array(':idNote'=>$this->id));
      } catch (PDOException $e) {
        echo $e->getMessage();
      }

    }
  }

?>
