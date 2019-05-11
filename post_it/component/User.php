<?php
  require_once '../database/database.php';
  require_once 'Note.php';
  /**
   *
   */
  class User
  {

    private $id;
    private $name;
    private $email;
    private $notes = array();
    private $db;

    public function __construct($id, $name, $email)
    {
      $this->id = $id;
      $this->name = $name;
      $this->email = $email;
      $this->db = new DB();
      $this->initNotes();
    }

    public function getId()
    {
      return $this->id;
    }
    public function setId($id)
    {
      $this->id = $id;
    }
    public function getName()
    {
      return $this->name;
    }
    public function setName($name)
    {
      $this->name = $name;
    }
    public function getEmail()
    {
      return $this->email;
    }
    public function setEmail($email)
    {
      $this->email = $email;
    }
    public function getNotes()
    {
      return $this->notes;
    }
    public function setNotes($notes)
    {
      $this->notes = $notes;
    }

    public function newNote()
    {
      try {
        $note = new Note();
        $statement = $db -> connect() -> prepare('INSERT INTO Notes (idNote, title, content, idUser) VALUES (null, :title, :content, :idUser)');
        $statement -> execute(array(
          ':title' => $note->getTitle(),
          ':content' => $note->getContent(),
          ':idUser' => $this->id
        ));
        array_push($this->notes, $note);
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    function initNotes()
    {
      try {
        $statement = $this->db -> connect() -> prepare('SELECT idNote, title, content FROM Notes WHERE idUser =
          (SELECT idUser FROM Users WHERE idUser = :idUser)', array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $statement -> execute(array(':idUser' => $this->id));
        while ($row = $statement->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
          array_push($this->notes, new Note($row[0], $row[1], $row[2]));
        }
        $statement = null;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }

    public function closeSession(){
      require_once '../login/close_session';
    }

  }
?>
