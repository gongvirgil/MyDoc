<?php
use Think\Storage;

class Doc {
	protected $dir;

	public function buildDoc($type="db"){
		switch ($type) {
			case 'db':
				$this->dir = "DB/";
				$this->putDB();
				break;
			
			default:
				break;
		}
	}
	/**
	 * [putDB 生成数据库文档]
	 * @return [type] [description]
	 */
	public function putDB(){
		Storage::put($this->dir."index.md","#DB Document\r\n");
		Storage::put($this->dir."navigation.md","#DB Document\r\n");
		$databases = M()->query("show databases");
		foreach ($databases as $k => $db) {
			Storage::append($this->dir."index.md","##".$db['database']."\r\n");
			Storage::append($this->dir."navigation.md","[".$db['database']."](".$db['database'].".md)\r\n");
			Storage::put($this->dir.$db['database'].".md","#Document of ".$db['database']."\r\n");
			$tables = M()->query("show tables from ".$db['database']);
			foreach ($tables as $k1 => $table) {
				Storage::append($this->dir.$db['database'].".md","##".current($table)."\r\n");
				$columns = M()->query("show full columns from ".$db['database'].".".current($table));
				for ($i=0; $i < count(array_keys($columns[0])); $i++) $line[] = "---";
				$line_key = implode("|", array_keys($columns[0]));
				$line_spr = implode("|", $line);
				Storage::append($this->dir.$db['database'].".md",$line_key."\r\n");
				Storage::append($this->dir.$db['database'].".md",$line_spr."\r\n");
				foreach ($columns as $k2 => $column) {
					$line_val = implode("|", array_values($column));
					Storage::append($this->dir.$db['database'].".md",$line_val."\r\n");
				}
			}
		}
	}

}