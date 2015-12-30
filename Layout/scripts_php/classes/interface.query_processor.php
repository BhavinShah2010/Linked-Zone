<?php

interface query_processor
 {
	public function process_select_query ($con , $sql);
 }
?>