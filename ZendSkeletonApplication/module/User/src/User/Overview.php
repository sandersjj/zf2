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
     *
     * @var boolean does the overview have standard checkboxes 
     * for multiple select?
     */
    protected $bHasCheckboxes;

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
        $this->bHasCheckboxes = true;
        $this->aData = $mData;
        
    }
    /**
     * This function outputs the table
     * @return string 
     */
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
        if($this->bHasCheckboxes){
            $this->sTable .= '<th><input type="checkbox" name="" value=""></th>';
        }
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
        $iCounter = 0;
        foreach($this->aData as $aData){
          
          
          
          $this->sTable.= '<tr>';
              $iRowId = call_user_func( array( $aData, 'getId' ));
          
          if($this->bHasCheckboxes){
              $this->sTable.= '<td><input type="checkbox" name="" value=""></td>';
          }
          foreach($this->aColnames as $sColname){
              $this->sTable.= '<td>';
              $methodName = 'get' . ucfirst($sColname);
              
              $this->sTable.= '<a href="edit/id/'.$iRowId .  '">' . call_user_func( array( $aData, $methodName )) . '</a>' ; 
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


