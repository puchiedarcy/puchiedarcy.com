<?php
class WriterRepository extends BaseRepository
{
    public function CheckPassword($name, $password)
    {
        $writers = array();
        
        $results = $this->Select("SELECT id, name, password FROM writer WHERE name = '$name' LIMIT 1;");
        foreach ($results as $result)
        {
            $writer = new Writer($result["id"], $result["name"], $result["password"]);
            array_push($writers, $writer);
        }
        
        if (count($writers) > 0)
        {
            $password = md5($writers[0]->Name() . md5($writers[0]->Name() . $password));
            return ($writers[0]->Password() == $password);
        }
        else
        {
            return false;
        }
    }
}