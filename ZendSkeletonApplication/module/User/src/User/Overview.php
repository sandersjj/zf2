<?php

namespace User;

class Overview{

    /**
    * @var Integer the amount of columns
    */
    protected $iCols;
    /**
     * @var array of the column names
     */
    protected $aColnames;
    
    /**
     *
     * @var string with the final table to output
     */
    protected $sTable;
    
    /**
     *
     * @var array the data to put in the table
     */
    protected $aData;
    
    

    /**
     * @param array|object the data to put in the table
     * @param array $aCols 
     */
    public function __construct($mData,$aCols)
    {
        if(is_array($aCols)){
            $this->setICols(count($aCols));
            $this->setAColnames($aCols);
        }
        
        $this->aData = $mData;
        
    }
    
    public function output()
    {
        $this->startTable();
        $this->generateTableHead();
        $this->generateTable();
        return $this->sTable;
    }
    
    /**
     * 
     */
    private function startTable()
    {
        $this->sTable = '<table>' . PHP_EOL;
    }
    /**
     * 
     */
    private function generateTableHead()
    {
        $this->sTable.= '<tr>' . PHP_EOL;
        
        foreach($this->aColnames as $sColname){
            $this->sTable.= '<th>' . $sColname . '</th>';
        }

        $this->sTable.= '</tr>' . PHP_EOL;
    }
    
    /**
     * 
     */
    private function generateTable()
    {
        
        foreach($this->aData as $aData){
          $this->sTable.= '<tr>';
          foreach($this->aColnames as $sColname){
              $this->sTable.= '<td>';
              $methodName = 'get' . ucfirst($sColname);
              $this->sTable.= call_user_func( array( $aData, $methodName ) ); 
              $this->sTable.= '</td>';
          }
          $this->sTable.= '</tr>';
        }
    }
    
    
    /**
     * Getters & Setters
     */
    
    public function getICols() {
        return $this->iCols;
    }

    public function setICols($iCols) {
        $this->iCols = $iCols;
    }

    public function getAColnames() {
        return $this->aColnames;
    }

    public function setAColnames($aColnames) {
        $this->aColnames = $aColnames;
    }

    public function getARows() {
        return $this->aRows;
    }

    public function setARows($aRows) {
        $this->aRows = $aRows;
    }


    
    
    
    
} 


