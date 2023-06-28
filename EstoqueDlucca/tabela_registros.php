<?php
require("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- colocar css e pagina de pesquisa -->
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rowTabela as $linha) {
                    echo "<tr>";
                    echo "<td>".$linha['']."</td>";
                    echo "<td>".$linha['']."</td>";
                    echo "<td>".$linha['']."</td>";
                    echo "<td>".$linha['']."</td>";
                    echo "<td>".$linha['']."</td>";
                    echo "<td>".$linha['']."</td>";
                    echo "</tr>";
                }
                
                if (count($rowTabela) === 0) {
                    echo "<tr><td colspan='7'>Nenhum produto encontrado.</td></tr>";
                }
                ?>
            </tbody>
            </table>        
            <div class="container-login100-form-btn">
            <a href="menu.php" class="btn btn-primary">VOLTAR</a>
            </div>
            <br>
            <div class="container-login100-form-btn">
            <a href="gerar_pdf.php" class="btn btn-primary">GERAR PDF</a>
            </div>    

            <div class="container-login100-form-btn">
            </div>

        </div>
    </div>
    </div>
</body>
</html>