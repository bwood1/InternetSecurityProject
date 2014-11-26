<script type="text/javascript">
  $("form#userLookup").submit(function(e) {
    e.preventDefault();

    console.log("submit form");
    // $("#userResult").load("<?php echo site_url('dashboard/userSearch') ?>", $("#userLookup").serialize());

    $.post("<?php echo site_url('dashboard/userSearch') ?>",
    $("#userLookup").serialize(), function(data) {
      $("#userResult").html(data);
    });
  });

</script>
