<?php

//print_r($task);
?>


<a href="./">Return</a>
<br/><br/>
<?php if (!empty($message)) { ?>
<div class="message"><?php print $message; ?></div>
<?php } ?>
<div class="inputform">
<form action="" method="post">
<input type="hidden" name="action" value="add" />
 
<label for="title">Title:</label>
<input type="text" value="" name="title" id="title" />

<label for="description">Description:</label>
<textarea name="description" id="description" rows="9" /></textarea>
<br/>
<label for="executor">Executor:</label>
<select name="executor">
 <option value="">Please, select Executor</option>
<?php foreach ( $task->all_executors as $executor ) { ?>
 <option value="<?php print $executor; ?>"><?php print $executor; ?></option>
<?php } ?>
</select>

<br/>

<label for="deadline">Deadline:</label>

<input type="text" value="" name="deadline" id="deadline" class="datepicker" />
<br/><br/>
<input type="submit" name="discard" value="Discard"  class="discard" /> <input type="submit" name="S1" value="Add new Task" class="submit" />
</form>
</div>
