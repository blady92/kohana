<form method="POST" action="<?php echo ($foobar['id'] ? 'update' : 'save'); ?>">
	Imię: <input type="text" name="firstname" value="<?php echo $foobar['name']; ?>"><br>
	Nazwisko: <input type="text" name="lastname" value="<?php echo $foobar['surname']; ?>"><br>
	Zawód: <input type="text" name="job" value="<?php echo $foobar['job']; ?>"><br>
	PESEL: <input type="text" name="pesel" value="<?php echo $foobar['pesel']; ?>"><br>
        <input type="hidden" name="unluckyguy" value="<?php echo $foobar['id']; ?>">
        <input type="submit" value="Zapisz">
</form>
<form method="POST" action="cancel">
    <input type="submit" value="Anuluj">
</form>