<table border=1>
    <tr>
        <td>Imię</td>
        <td>Nazwisko</td>
        <td>Zawód</td>
        <td>PESEL</td>
    </tr>
    <?php
    foreach ($result as $line) {
        $temp = $line->as_array(); ?>

    <tr>
        <td><?php echo $temp['name'] ?></td>
        <td><?php echo $temp['surname'] ?></td>
        <td><?php echo $temp['job'] ?></td>
        <td><?php echo $temp['pesel'] ?></td>

        <td>
        <form method="POST" action="">
        <input type="hidden" name="unluckyguy" value="<?php echo $temp['id'] ?>">
        <input type="submit" name="fire" value="Zwolnij">
        </form>
        </td>

        <td>
        <form method="POST" action="edit"> 
        <input type="hidden" name="unluckyguy" value="<?php echo $temp['id'] ?>">
        <input type="submit" name="fire" value="Edytuj">
        </form>
        </td>

    </tr>
    <?php } ?>
</table><br>