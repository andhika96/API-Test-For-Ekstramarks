<?php

	load_extend_view('default', ['header', 'footer']);

	section_content('
	<div class="container my-5">
		<div class="bg-light p-4 rounded shadow">
			<div class="mb-3">Gumara Peto Alam</div>');
	
	$i = 1;
	foreach ($db as $key) 
	{
		// section_content($i.'# - '.$key['id'].' - '.$key['fullname'].' - '.$key['username'].'<br/>');
		section_content($i.'# - '.$key->id.' - '.$key->fullname.' - '.$key->username.'<br/>');
		$i++;
	}

	section_content('
		</div>
	</div>');

?>