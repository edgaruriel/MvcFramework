
<div class="container center" >
    <div class="header">Clientes</div>
            <div class="actions">
	            <a href="../Client/newClient" class="button right verde"><span class="icon fa-plus"></span>Agregar cliente</a>
	            <a href="../Index/indexEmployee" class="button left azul"><span class="icon fa-home"></span>Regresar</a>
            </div>
            <table style="width:100%" border="1">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>IFE</th>
                        <th>OPERACIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clients as $client):?>
                        <tr>
                            <td><?php echo $client->id;?></td>
                            <td><?php echo utf8_encode($client->name);?></td>
                            <td><?php echo $client->lastName;?></td>
                            <td><?php echo $client->email;?></td>
                            <td><?php echo $client->ife;?></td>
                            <td>
                                <a href="../Client/editClient?id=<?php echo $client->id;?>"class="s-button verde"><span class="s-icon fa-edit"></span></a>
                                <a href="../Client/deleteClient?id=<?php echo $client->id;?>"class="s-button rojo"><span class="s-icon fa-trash"></span></a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
    
</div>
