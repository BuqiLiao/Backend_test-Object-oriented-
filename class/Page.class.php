<?php

class Page{

    private $page;
    private $total;

    public function __construct($page,$total){
        
        $this->page = $page;
        $this->total = $total;
    }

    public function Pagination(){



        if($this->page <= 4){
            $start = 1;
        }
        if($this->page >= $this->total-3){
            $start = $this->total-6;
        }
        if($this->total < 7){
            $start = 1;
        }

        
        if($this->page+1 <= $this->total){
            $page_next = $this->page+1;
        }else{
            $page_next = $this->total;
        }

        if($this->total >= 7){
            for($i=$start;$i<=($start+7);$i++){
                if($this->page == $i){
                    echo "<span>$i</span>";
                }elseif($i ==($start+6) and ($i-1) != ($this->total-1)){
                    echo "<span>...</span>";
                }elseif($i ==($start+6) and ($i-1) == ($this->total-1)){
                    continue;
                }elseif($i ==($start+7) and $this->page != $this->total){
                    echo "<a href='?page=$this->total'>$this->total</a>";
                }elseif($i ==($start+7) and $this->page == $this->total){
                    continue;
                }else{
                    echo "<a href='?page=$i'>$i</a>";
                }
            }
        }else{
            for($i=$start;$i<=$this->total;$i++){
                if($this->page == $i){
                    echo "<span>$i</span>";
    
                }else{
                    echo "<a href='?page=$i'>$i</a>";
                }
            }
        }
        
        echo "<a href='?page=$page_next'>Next</a>";
    }
    // public function __sleep()
    // {
        
    // }

}

// $obj = new Page(2,10);
// $str = serialize($obj);
// echo $str



?>