<?php

function exibirTabela($row)
{ ?>
    <tr>
        <th scope="row">
            <?php echo $row['id'] ?>
        </th>
        <td id="n-<?php echo $row['id'] ?>">
            <?php echo $row['nome'] ?>
        </td>
        <td id="e-<?php echo $row['id'] ?>">
            <?php echo $row['email'] ?>
        </td>
        <td>
            <button class="btn btn-sm btn-danger" onclick="deletar('<?php echo $row['id'] ?>')"><i class="fas fa-trash"></i></button>
            <button class="btn btn-sm btn-info" onclick="fazerEditar('<?php echo $row['id'] ?>')"><i class="fas fa-pen"></i></button>
        </td>
    </tr>';

<?php }  ?>