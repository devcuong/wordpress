<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="clearboth"></div>
		<?php
		$pages_total = $wp_query->max_num_pages;
		 echo "<ul class='pagination'>";
                for ($i = 1; $i <= $pages_total; $i ++) {
                    if ($i == (int) $paged ) {
                        echo "<li><a class='active'>" . $i . "</a></li>";
                    } else {
                        echo "<li><a>" . $i . "</a></li>";
                    }
                }
                echo "</ul>";
				
		?>
<?php endif ?>