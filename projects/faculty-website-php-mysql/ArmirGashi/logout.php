<?php
session_start();
echo "<script>
    alert('Jeni duke dalë nga llogaria. Ju lutem prisni...');
    window.location.href = 'login.php'; // Ridrejto në faqen e login pas mesazhit
</script>";
session_unset();  
session_destroy(); 
exit();
?>
