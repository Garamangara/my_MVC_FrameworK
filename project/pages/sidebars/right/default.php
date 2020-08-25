<ul>
	<?php
	//id - название категории на английском
	foreach ($menu as $id => $list) : ?>
		
		<a href="/films/<?php echo $list['english_name'] ?>">
			<li><?php
			// mb_internal_encoding("UTF-8");
			// function mb_ucfirst($text) {
			//     echo mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
			// }

			echo mb_convert_case($list["russian_name"], MB_CASE_TITLE , "UTF-8");
			?></li>
		</a>

	<?php endforeach; 
	// var_dump(apache_request_headers ());
	?>
</ul>