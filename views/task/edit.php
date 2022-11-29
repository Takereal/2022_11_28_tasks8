<?php

//print "\n" . '<br/><pre>';
//print_r($task);
//print '<pre><br/>' . "\n";
?>


<a href="./">Return</a>
<br/><br/>
<?php if ('Done' == $task->status) { ?>
Task Status: Done. Therefore you can't edit this Task.
<?php } else { ?>

<?php if (!empty($message)) { ?>
<div class="message"><?php print $message; ?></div>
<?php } ?>
<div class="inputform">
<form action="" method="post">
<input type="hidden" name="action" value="edit" />
 
<label for="title">Title:</label>
<input type="text" value="<?php print $task->title; ?>" name="title" id="title" />

<label for="description">Description:</label>
<textarea name="description" id="description" rows="9" /><?php print $task->description; ?></textarea>
<br/>
<label for="executor">Executor:</label>
<select name="executor">
 <option value="">Please, select Executor</option>
<?php foreach ( $task->all_executors as $executor ) { ?>
 <option value="<?php print $executor; ?>"
 <?php if ($task->executor == $executor) { print ' selected="selected"'; } ?>
 ><?php print $executor; ?></option>
<?php } ?>
</select>

<br/>

<label for="deadline">Deadline:</label>
<input type="text" value="<?php print $task->deadline; ?>" name="deadline" id="deadline" class="datepicker" />

<label for="status">Status:</label>
<?php if ('Done' == $task->status) { ?>
Done.
<?php } else { ?>
<select name="status">
<?php foreach ( $task->all_statuses as $status ) { ?>
 <option value="<?php print $status; ?>"
 <?php if ($task->status == $status) { print ' selected="selected"'; } ?>
 ><?php print $status; ?></option>
<?php } ?>
</select>
<?php } ?>

<br/><br/>
<input type="submit" name="discard" value="Discard"  class="discard" /> <input type="submit" name="S1" value="Edit Task" class="submit" />
</form>
</div>
<?php } ?>