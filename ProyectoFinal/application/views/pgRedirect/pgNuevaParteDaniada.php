<?php
//header("location:NuevaPiezaDaniada");
echo "<form name='form' action='NuevaParteDaniada' method='post'>";
echo "<input type='text' name='txtIdSiniestro' value='$idSiniestro'>"
   . "<input type='text' name='txtIdPoliza' value='$idPoliza'>";
echo "<script language=javascript>document.form.submit();</script>";
echo "</form>";
?>