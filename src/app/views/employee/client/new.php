<?php

?>

<script src="../src/app/public/js/employee/client/new.js"></script>

<div class="container center">
    <div class="header">Nuevo Cliente</div>
            <form action="../Client/addClient" id="form" name="form" method="post" class="form-group">

                    <label ><span>Nombre: </span></label><input type="text" id="name" name="name"/>

                    <label ><span>Apellido(s): </span></label><input type="text" id="lastName" name="lastName"/>

                    <label ><span>Correo: </span></label><input type="text" id="email" name="email"/>

                    <label ><span>IFE: </span></label><input type="text" id="ife" name="ife"/>
				<br>
                <input type="submit" name="newBtn" id="newBtn" value="Agregar" class="right verde">
                <a id="btn_cancelar" value="Cancelar" href="../Client/listClient"class="button left azul"><span class="icon fa-times"></span>Cancelar</a>
            </form>
     <br><br><br>
</div>
</body>
</html>