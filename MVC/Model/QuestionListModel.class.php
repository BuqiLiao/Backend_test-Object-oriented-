<?php

class QuestionListModel extends BaseModel{

    private $pagesize;
    private $records;

    public function Count() {

        $sql = "Select * from question";
        $this->records = $this->conn_Db->CountRow($sql);
        return $this->records;
    }
    public function TotalPage($pagesize){
        $this->pagesize = $pagesize;
        $total= ceil($this->records / $this->pagesize);
        return $total;
    }  
    public function FetchAll($page){
        $offset = ($page-1) * $this->pagesize;
        $sql = "select * from question order by qid desc limit $offset,$this->pagesize";
        $arrs = $this->conn_Db->FetchAll($sql,3);
        return $arrs;
    }

    public function Delete($qid){
        if (is_string($qid)) {
        
            $sql = "delete from question where qid in($qid)";
            $result = $this->conn_Db->AffectedRow($sql);
            return $result;

        }elseif(is_array($qid)){
        
            $qid_m = join(',', $qid);
        
            $sql = "delete from question where qid in($qid_m)";
            $result = $this->conn_Db->AffectedRow($sql);
            return $result;
        }
    }
    
    public function Insert($data){

        $fields = "";
        $values = "";
        foreach($data as $key=>$value){

            $fields .= "$key,";
            $values .= "'$value',";
        }
        $fields= rtrim($fields,",");
        $values= rtrim($values,",");

        $sql = "INSERT INTO question($fields) VALUES($values)";

        return $this->conn_Db->Execute($sql);
    }
}

?>
