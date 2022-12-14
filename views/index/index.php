<?php

$executor_dir = 'ASC';
$deadline_dir = 'ASC';
$donedate_dir = 'ASC';
$status_dir = 'ASC';
if (in_array($sortby, array('executor', 'deadline', 'donedate', 'status'))) {

  if (!empty($sortdir) && 'ASC' == $sortdir) {

    if ( 'executor' == $sortby) { $executor_dir = 'DESC'; }
    elseif ( 'deadline' == $sortby) { $deadline_dir = 'DESC'; }
    elseif ( 'donedate' == $sortby) { $donedate_dir = 'DESC'; }
    elseif ( 'status' == $sortby) { $status_dir = 'DESC'; }
  }
}

?>
<style>
.div-table {
  display: table;         
  width: auto;         
  background-color: #eee;         
  border: 1px solid #666666;         
  border-spacing: 5px;
}
.div-table-row {
  display: table-row;
  width: auto;
  clear: both;
}
.div-table-head {

  font-weight: bold;
}
.div-table-col {
  float: left;
  display: table-column;         
  width: 100px;
  min-width: 50px;
}
</style>

<a href="?route=task/add">Add Task</a>
<br/><br/>
<div class="div-table">
  <div class="div-table-row div-table-head">
     <div class="div-table-col" align="center">ID</div>
     <div class="div-table-col">Title</div>
     <div class="div-table-col">Description</div>
     <div class="div-table-col"><a href="?sortby=executor&sortdir=<?php print $executor_dir; ?>">Executor</a></div>
     <div class="div-table-col"><a href="?sortby=deadline&sortdir=<?php print $deadline_dir; ?>">Deadline</a></div>
     <div class="div-table-col"><a href="?sortby=donedate&sortdir=<?php print $donedate_dir; ?>">Done Date</a></div>
     <div class="div-table-col"><a href="?sortby=status&sortdir=<?php print $status_dir; ?>">Status</a></div>
     <div class="div-table-col">&nbsp;</div>
     <div class="div-table-col">&nbsp;</div>
  </div>
<?php foreach($tasks as $task) { 

  $background = '#ccc';
  if ($task->deadline < date('Y-m-d')) {

    $background = '#FF8080';
  }
?>
  <div class="div-table-row" style="background-color: <?php print $background; ?>">
     <div class="div-table-col" align="center"><?php print $task->id; ?></div>
     <div class="div-table-col"><?php print $task->title; ?></div>
     <div class="div-table-col"><?php print $task->description; ?></div>
     <div class="div-table-col"><?php print $task->executor; ?></div>
     <div class="div-table-col"><?php print $task->deadline; ?></div>
     <div class="div-table-col"><?php print $task->donedate ? $task->donedate : '&nbsp;'; ?></div>
     <div class="div-table-col"><?php print $task->status; ?></div>
     <div class="div-table-col"><?php if ($task->canEdit) { ?><a href="./?route=task/edit&id=<?php print $task->id; ?>">Edit</a><?php } else { print '&nbsp;'; } ?></div>
     <div class="div-table-col"><a href="./?route=task/deletetask&id=<?php print $task->id; ?>" onclick="return confirm('Are you sure to delete Task #<?php print $task->id; ?>?');">Delete</a></div>
  </div>
<?php } ?>
</div>
</tbody>
</table>

