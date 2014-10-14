<?php

/*
 * Project Name: notary
 * File Name: parentChild
 * Created on: 31 Jan 14 - 10:25:22
 * Author: PT. QIWARI USAHA NUSANTARA
 * Copyright 2014 PT. QIWARI USAHA NUSANTARA. All rights reserved.
 *
 *
 * Class ParentChild ver 1.0
 * Parent Child berfungsi untuk menterjemahkan data dari field parent child 
 * ke bentuk level drill down
 *
 * Function Created by Arif Dzikrullah
 * Logic Created by Hamonangan Situmorang
 */

class ParentChild  extends CI_Model
{
	/*
    public function __construct() 
	{
        parent::__construct();
    }
	*/
		
	public function seeker($parentBegin,$field,$table,$parentField,$idField) 
	{
		
		/*=======================================================================================
		 * Fungsi generator standar ver 2.0
		 * Created by Arif Dzikrullah 201401231041
		 *
		 * Penjelasan parameter:
		 *	$parentBegin	-> merupakan
		 *	$field		-> berupa array field di database yang ingin di ambil
		 *	$table		-> nama table database
		 *	$parentField	-> Nama field untuk kode parent
		 * 	$idField	-> nama field untuk id data
		 *=======================================================================================*/
		
		$rawResult = array();
		$result = array();
		$arrayField = $this->imploder($field);
		$no=0;
		$i=0;
		$j=0;
		$k=0;
		$m=0;
		
		$parent=array($i.$j=>$parentBegin);
		
		$this->db->select($arrayField. "," .$parentField. "," .$idField);
		$this->db->from($table);
		$this->db->where($parentField,$parent[$i.$j]);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
		
		//$arrayTEMP=array($k=>0);
		while(isset($parent[$i.$j]))
		{
			while(isset($parent[$i.$j]))
			{		
				$this->db->select($arrayField. "," .$parentField. "," .$idField);
				$this->db->from($table);
				$this->db->where($parentField,$parent[$i.$j]);
				$query = $this->db->get();
				foreach ($query->result_array() as $row)
				{	
					
					$parent[($i+1).$k]=$row[$idField];
					$children[$i.$j.$m]=$parent[($i+1).$k];
					$silsilah[$parent[$i.$j].$i.$m]=$parent[($i+1).$k];
					$parent_of_children[$i.$j.$m]=$parent[$i.$j];
					
					$dataBind = array();
					for($n=0;$n<count($field);$n++)
					{
						$dataBind[$n]=$row[$field[$n]];
					}
					
					$rawResult[$silsilah[$parent[$i.$j].$i.$m]]=$dataBind;
					
					$k++;
					$m++;
					$no++;
				}
				$j++;
				$m=0;
			}
			$j=0;
			$k=0;	 
			$i++;			
		}
		
		
		$i=0;
		$j=0;
		$m=0;
		$no=1;
		$ketemu=isset ($silsilah[$parent[$i.$j].$i.$m]);
		$habis=false;
		$mundur=false;
		
		
		while(isset ($parent[$i.$j]))
		{
			while(isset ($parent[$i.$j]))
			{
				
				$m_level[$i.$j]=0;							
				$j++;		
			}		
			if($i==0)
			{
				$j_level[$i]=0;
			}
			else
			{
				$j_level[$i]=-1;
			}
			$j=0;
			$i++;
		}
				
		$i=0;
		$j=0;
		
		$n=0;
		while($ketemu || !$habis)
		{
			if($ketemu)
			{
//				echo 'level->'.$i.' deskripsi->'.$rawResult[$silsilah[$parent[$i.$j].$i.$m]][1].'<br>';	
				$result[$n]=array($i,$rawResult[$silsilah[$parent[$i.$j].$i.$m]]);
				$n++;
			}
					
			if(!$mundur)
			{			
				$i++;
				$j_level[$i]++;
				$j=$j_level[$i];
				$m=$m_level[$i.$j];							
				$ketemu=isset ($silsilah[$parent[$i.$j].$i.$m]);
			}
			if(!$ketemu)
			{			
				if($i>0)
				{
					$i--;
					$j=$j_level[$i];
					$m=$m_level[$i.$j];
					$m++;
					$m_level[$i.$j]=$m;
					$ketemu=isset ($silsilah[$parent[$i.$j].$i.$m]);
					if(!$ketemu)
					{
						$mundur=true;
					}
					else
					{
						
						$mundur=false;
					}
				}
				else
				{
					$habis=true;
				}
			}
		}
		
		return $result;
		
		}
		else
			return 0;
	}
	
	function imploder($par)
	{
		
        $fields = "";

        for ($i = 0; $i < count($par); $i++) {

            if ($i == 0)
                $fields = $fields . $par[$i];
            else
                $fields = $fields . "," . $par[$i];
        }	
		
		return $fields;
	}
}
