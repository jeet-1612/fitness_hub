<h3>Members</h3>
<table id="members-table">
  <thead><tr><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr></thead>
  <tbody>
    <?php foreach($members as $m): ?>
      <tr>
        <td><?= htmlspecialchars($m->full_name) ?></td>
        <td><?= htmlspecialchars($m->email) ?></td>
        <td><?= htmlspecialchars($m->phone) ?></td>
        <td><a href="<?= base_url('members/edit/'.$m->id) ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<script>
$(document).ready(function(){
  $('#members-table').on('click','a.delete', function(e){
    e.preventDefault();
    if (!confirm('Delete member?')) return;
    var url = $(this).attr('href');
    $.post(url, {_method:'DELETE'}, function(res){ location.reload(); });
  });
});
</script>
