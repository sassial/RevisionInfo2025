<p><?php echo $entete; ?></p>

<table>
	<thead>
		<tr>
            <?php
            $columns = recupereTousColonnes($db, $table);
            foreach ($columns as $column) {
                echo "<th>" . htmlspecialchars($column) . "</th>";
            }
            ?>
		</tr>
	</thead>
	<tbody>	
        <?php foreach ($liste as $element) { ?>
            <tr>
                <?php
                foreach ($columns as $column) {
                    echo "<td>" . htmlspecialchars($element[$column]) . "</td>";
                }
                ?>
            </tr>
        <?php } ?>
	</tbody>
</table>

<?php if(isset($alerte)) { echo AfficheAlerte($alerte);} ?>
<p><a href="index.php">Retour</a></p>
